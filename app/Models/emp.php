<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\dept;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class emp extends Model
{
    use HasFactory;

    public function convertdatafrominputlocaltolaravelformat($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }


    protected $fillable = [
        'name',
        'dept_id',
        'image',
        'registration',
        'sup_id',
        'date_emb',
        'status',
        'post',
      ];

      public function dept(){
       return $this->belongsTo(dept::class,'dept_id');
      }
}
