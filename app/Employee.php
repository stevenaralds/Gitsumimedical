<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'company_id','email','phone'
     ];
 
     public function Company() {
         return $this->belongsTo(Company::class);
 
       }
}
