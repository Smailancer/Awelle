<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
     protected $with = ['slang', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('term', 'like', '%' . $search . '%')
                    ->orWhere('meaning', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['slang'] ?? false, fn($query, $slang) =>
            $query->whereHas('slang', fn ($query) =>
                $query->where('slug', $slang)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function slang()
    {
        return $this->belongsTo(Slang::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
