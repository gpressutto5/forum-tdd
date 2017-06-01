<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite($user_id = null)
    {
        $userAttributes = ['user_id' => $user_id ?: auth()->id()];
        if ($this->favorites()->where($userAttributes)->exists()) {
            return;
        }
        $this->favorites()->create($userAttributes);
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }
}
