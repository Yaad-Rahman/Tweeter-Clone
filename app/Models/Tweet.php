<?php

namespace App\Models;

use App\Models\User;
use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{


    protected $fillable = [
        'user_id',
        'body',
        'pic'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPicAttribute($value)
    {
        if($value){
            return asset('storage/' .$value);
        }
        else {
            return null;
        }

    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like ($user =null, $liked= true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()],
            [
            'liked' => $liked
            ],
        );
    }

    public function unlike ($user =null, $liked=true)
    {
        $this->likes()->destroy(
            $user? $user->id : auth()->id()
        );
    }

    public function dislike($user =null)
    {
        return $this->like($user ,false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}
