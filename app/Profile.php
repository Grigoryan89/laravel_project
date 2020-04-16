<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
      $imagePath = ($this->image) ? $this->image : 'profile/Z0MWmXMCjFOKoakp8jRmCmqR2bMcxyN0KYZM8Sq9.png';
      return "/storage/".$imagePath;
    }

    public function user()
    {
             return $this->belongsTo(User::class);
    }
}
