<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectionSuggestion extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function word()
    {
        return $this->belongsTo(Word::class);

    }

    public function slang()
    {
        return $this->belongsToMany(Slang::class);
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
