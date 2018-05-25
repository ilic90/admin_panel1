<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'

    ];

    public function user(){

       return $this->belongsTo(User::class);

    }

    public function photo(){

        return $this->belongsTo(Photo::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function comments(){

        return $this->hasMany(Comment::class);

    }

}
