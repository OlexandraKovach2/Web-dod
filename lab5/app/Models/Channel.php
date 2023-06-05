<?php

namespace App\Models;

use App\Http\Controllers\ChannelController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'topic',
        'news_id'
    ];

    public function channel(): HasMany
    {
        return $this->hasMany(ChannelController::class);
    }
}
