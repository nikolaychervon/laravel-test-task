<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $author_id
 */
class Book extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Автор книги
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * @param Author $author
     * @return bool
     */
    public function hasAuthor(Author $author): bool
    {
        return $this->author_id === $author->id;
    }
}
