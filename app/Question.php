<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    //
    protected $fillable = ['title', 'body'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    //using title for slug create link. we need to set name attribute same name in blade
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getUrlAttribute()
    {
        // dd($this->body);
        return route('showquestion', $this->slug);
    }

    // create a Mutator : https://laravel.com/docs/6.x/eloquent-mutators
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans(); // using carbon lib
    }
    public function getStatusAttribute()
    {
        if ($this->answers_cout > 0) {
            if ($this->best_answered_id) {
                return "answered-accepted";
            }
            return "answered";

        }

        return "unansewered";
    }
    public function getVoteAttribute()
    {
        // dd($this->votes);
        if ($this->votes > 0) {
            return 'voted';
        }
        return 'unvote';
    }
    public function AcceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

}