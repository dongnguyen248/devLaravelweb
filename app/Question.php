<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Parsedown;

class Question extends Model
{
    //
    use VotableTrait;

    protected $fillable = ['title', 'body'];
    //relationship question and user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relationship question and answers
    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
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
        if ($this->answers_count > 0) {
            if ($this->best_answered_id) {
                return "answered-accepted"; //this is scss in resource sass
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

    // add adn undo favorite question
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }
    public function getisFavoritedAttribute()
    {
        // dd($this->isFavorited());
        return $this->isFavorited();
    }
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    // show body question
    public function getBodyHtmlAttribute()
    {
        return clean(dd($this->bodyHtml())); // clean is a function in Purifier : https://github.com/mewebstudio/Purifier
    }

    public function getExcerptAttribute()
    {
        return clean($this->excerpt(300)); //default is 300 letter
    }
    public function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHtml()), $length);
    }
    private function bodyHtml()
    {
        return clean(Parsedown::instance()->text($this->body)); // using https://github.com/erusev/parsedown
    }

}