<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
      $imagePath = ($this->image) ? $this->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png';
       if ($this->image)
       {
           return "/storage/".$imagePath;
       }
       else{
           return $imagePath;
       }

    }

    public function user()
    {
             return $this->belongsTo(User::class);
    }

}
