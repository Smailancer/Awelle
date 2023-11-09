<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Word;
class Wilaya extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "ar_name",
        "country_id",
    ];

    public function words()
{
    return $this->belongsToMany(Word::class);
}

    // public function communes()
    // {
    //     return $this->hasMany(Commune::class);
    // }


}
