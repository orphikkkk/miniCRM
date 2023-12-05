<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
    ];

    public function getDateAttribute(){
        return $this->created_at->format('F j, Y');
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
