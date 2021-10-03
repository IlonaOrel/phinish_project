<?php

namespace App\Model;

use App\Model\Doctor;
use Illuminate\Database\Eloquent\Model;


class Specialization extends Model
{
    protected $fillable = ['name', ];

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }
}
