<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function book() {
        return $this->belongsTo(Book::class)->withTrashed();
    }

    public function client() {
        return $this->belongsTo(Client::class)->withTrashed();
    }
}
