<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'fields'];

    public function category() {//получение марки запчасти
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    protected $casts = [
        'fields' => 'json',
    ];

}
