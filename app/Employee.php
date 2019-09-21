<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nik', 'name', 'sex', 'position_id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
