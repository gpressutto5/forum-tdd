<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    const CONTRAST_THRESHOLD = 186;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function getColorAttribute()
    {
        return '#'.substr(md5($this->name), 0, 6);
    }

    public function getTextColorAttribute()
    {
        $color = $this->color;
        $subColor = [
            'r' => hexdec(substr($color, 1, 2)),
            'g' => hexdec(substr($color, 3, 2)),
            'b' => hexdec(substr($color, 5, 2))
        ];


        $average = $subColor['r']*0.299 + $subColor['g']*0.587 + $subColor['b']*0.114;

        if ($average >= self::CONTRAST_THRESHOLD) {
            return '#000000';
        }

        return '#ffffff';
    }
}
