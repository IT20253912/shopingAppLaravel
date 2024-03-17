<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Catagory extends Model
// {
//     use HasFactory;
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model {
    protected $guarded = [];

    public function children() {
        return $this->hasMany(Catagory::class, 'parent_id', 'id');
    }
}
