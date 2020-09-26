<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Posts extends Model
{
    use HasFactory;
    use Searchable;

    public function searchableAs()
    {
        return 'posts_index';
    }
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();
        
    //     return array('id' => $array['id'],'title' => $array['title']);
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
