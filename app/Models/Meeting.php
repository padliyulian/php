<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['name', 'description', 'time', 'location'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }
}
