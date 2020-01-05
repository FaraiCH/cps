<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\QueriesRelationships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [

        'title' , 'description', 'content' , 'image' , 'published_at', 'category_id', 'user_id'
    ];

    //Delete image from storage folder
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Check if a post has tags
    public function hasTag($tagID){
        return in_array($tagID, $this->tags->pluck('id')->toArray());
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //QUERY SCOPE FOR SEARCH IN  CATEGORY AND POST
    //USE scope as the identifier then the method name
    public function scopeSearched($query){
        $search = request()->query('search');

        if(!$search){
            return $query;
        }
        else
        {
            return $query->where('title', 'LIke', "%{$search}%");
        }
    }


}
