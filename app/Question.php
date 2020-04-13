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
        if ($this->answers_count > 0) {
            if ($this->best_answered_id) {
                return "answered-accepted";
            }
            
            return "answered";

        }

        return "unansewered";
    }
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHTML());// clean is a function in Purifier : https://github.com/mewebstudio/Purifier
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
    public function favorites(){
        return $this->belongsToMany(User::class,'favorites')->withTimestamps();
    }
    public function isFavorited()
    {
        return $this->favorites()->where('user_id',auth()->id())->count()>0;
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
    
    public function getExcerptAttribute()
    {
        return $this->excerpt(300);
    }
    private function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHTML()),$length);
    }
    private function bodyHTML()
    {
        return clean(Parsedown::instance()->text($this->body));
    }
   

}