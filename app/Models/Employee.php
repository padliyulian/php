<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nik', 'name', 'sex', 'position_id', 'email'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
