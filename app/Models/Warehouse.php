<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'address'
    ];

//    public function setCreatedAtAttribute( $date ) {
//       return Carbon::createFromFormat('Y-m-d H:i:s', $date);
//    }
}
