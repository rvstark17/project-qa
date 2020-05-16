<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\User;
class Question extends Model
{
    //
    protected $fillable = ['title','body'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    public function getUrlAttribute()
    {
        return route('question.show',$this->slug); 
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute()
    {
        if($this->answers_count > 0)
        {
            if($this->best_answer_id)
            {
                return 'answer-accepted';
            }
            else
            {
                return 'answered';
    
            }
        }
        else
        {
            return 'unanswered';
        }
    }
    public function getBodyHtmlAttribute()
    {
        return clean(\Parsedown::instance()->text($this->body));
    }
    public function answers()
    {
        return $this->hasMany(answer::class)->orderBy('votes_count','DESC');
    }
    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }
    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites')->withTimestamps();
    }
    public function isFavorited(){
        return $this->favorites()->where('user_id',Auth()->id())->count() > 0;
    }
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
    public function getFavoriteCount()
    {
        $this->favorites->count();
    }
    public function votes()
    {
        return $this->morphToMany(User::class,'votable');
    }
}
