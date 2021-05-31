<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //fillable permite definir quais campos serão preenchidos
    protected $fillable = ['title', 'content', 'image'];
}
