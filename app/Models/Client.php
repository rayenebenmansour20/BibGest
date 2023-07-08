<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public function books() {
        return $this->belongsToMany(Book::class, 'loans');
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
