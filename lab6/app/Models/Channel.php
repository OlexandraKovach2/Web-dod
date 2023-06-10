<?php

namespace App\Models;

use App\Http\Controllers\ChannelController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'topic',
        'news_id'
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(ChannelController::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
