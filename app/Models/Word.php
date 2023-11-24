<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slang;
use App\Models\Wilaya;
use App\Models\User;
use App\Models\Comment;

class Word extends Model
{
    use HasFactory;
    //  protected $with = ['slang', 'author'];

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
                $query->where('name', $slang)
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

   // Word.php

    public function slang()
    {
        return $this->belongsToMany(Slang::class);
    }

    public function wilayas()
    {
        return $this->belongsToMany(Wilaya::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
