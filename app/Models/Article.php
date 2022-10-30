<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    
    protected $table = 'article';
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

}
