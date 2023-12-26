<?php

namespace App\Models;

use App\Models\Partof;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'partof_id'];

    public function partof()
    {
        return $this->belongsTo(Partof::class);
    }
}
