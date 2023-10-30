<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'photo',
        'status',
        'parent_id',
        'is_top',
        'bg_color',
    ];

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function child(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function listings(){
        return $this->hasMany(Listing::class);
    }
}
