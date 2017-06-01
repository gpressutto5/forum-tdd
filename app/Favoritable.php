<?php
namespace App;

trait Favoritable
{

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
        return !!$this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
