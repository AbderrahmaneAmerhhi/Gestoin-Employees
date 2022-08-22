<?php

namespace App\Models;

use App\Models\emp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dept extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'place'
    ];

    public function emps(){
      return   $this->hasMany(emp::class,'id');
    }
}
