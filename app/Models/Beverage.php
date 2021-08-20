<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;

class Beverage extends Model
{
    use HasFactory;

    protected $table = 'beverages';

    protected $fillable = [
        'name', 'type'
    ];

    public function buy() {
        if (auth()->user()->isMinor()) {
            throw new MinorCannotBuyAlcoholicBeverageException;
        }

        return true;
    }
}
