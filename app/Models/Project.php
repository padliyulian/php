<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project', 'description'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
