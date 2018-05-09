<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPost extends Model
{
    public function getFeaturedImageAttribute($value)
    {

        return empty($value) ? asset('/image/no_image.png') : $value;
    }
    public function setFeaturedImageAttribute($value)
    {
    	if($value == asset('/image/no_image.png'))
    		$value = null;

        $this->attributes['featured_image'] = $value;
    }

}
