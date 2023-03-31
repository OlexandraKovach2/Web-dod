<?php

namespace App\Models;

use App\Http\Controllers\NewsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'date',
        'count_view',
        'comments_id',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(NewsController::class);
    }
}
