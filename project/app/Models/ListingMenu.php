<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingMenu extends Model
{
    use HasFactory;

    public function listing(){
        return $this->belongsTo(Listing::class);
    }
}
