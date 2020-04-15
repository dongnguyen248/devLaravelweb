<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Answer extends Model
{
    //
    use VotableTrait;
    protected $fillable = ['body', 'user_id'];
    protected $appends = ['created_date'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function boot()
    {
        parent::boot();
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });
        static::deleted(function ($answer) {
            $question = $answer->question;
            $question->decrement('answers_count');
            if ($answer->id == $question->best_answer_id) {
                $question->best_answer_id = null;
                $question->save();
            }

        });

    }
    //creat https://laravel.com/docs/7.x/eloquent-mutators in laravel
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHTML());
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans(); // using carbon lib
    }
    public function getStatusAttribute()
    {
        return $this->id === $this->question->best_answer_id ? 'vote-accepted' : '';
    }
    private function bodyHTML()
    {

        return Parsedown::instance()->text($this->body); // using https://github.com/erusev/parsedown
    }

}