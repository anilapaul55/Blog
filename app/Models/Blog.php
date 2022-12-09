<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['blog_title', 'blog_subtitle','blog_image','blog_description'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
