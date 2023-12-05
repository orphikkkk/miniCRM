<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getDateAttribute(){
        return $this->created_at->format('F j, Y');
    }
    public function getNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }
}
