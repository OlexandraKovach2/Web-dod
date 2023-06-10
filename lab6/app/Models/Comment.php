<?php

namespace App\Models;

use App\Http\Controllers\CommentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'text'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
