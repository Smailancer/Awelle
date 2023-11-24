<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slang extends Model
{
    use HasFactory;

    // Slang.php

    public function words()
    {
        return $this->belongsToMany(Word::class);
    }

}
