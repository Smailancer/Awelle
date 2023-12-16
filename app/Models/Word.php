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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $collation = 'utf8mb4_general_ci';

            // Apply the removeDiacriticsAndAlef function to the search term
            $filteredSearch = $this->removeDiacriticsAndAlef($search);

            $query->where(function ($query) use ($filteredSearch, $collation) {
                $query->whereRaw("standard COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%'])
                      ->orWhereRaw("ar_meaning COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%'])
                      ->orWhereRaw("fr_meaning COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%'])
                      ->orWhereRaw("en_meaning COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%'])
                      ->orWhereRaw("tifinagh COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%'])
                      ->orWhereRaw("uses COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%'])
                      ->orWhereRaw("spell COLLATE $collation LIKE ?", ['%' . $filteredSearch . '%']);
            });
        });

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

        $query->when($filters['type'] ?? false, fn($query, $type) =>
            $query->where('type', $type)
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

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

    public function removeDiacriticsAndAlef($string)
    {
        // Remove diacritics
        $string = preg_replace("~[\x{064B}-\x{065B}]~u", "", $string);

        // Replace أ and آ with ا
        $string = preg_replace(["/أ/u", "/آ/u"], "ا", $string);

        return $string;
    }

}
