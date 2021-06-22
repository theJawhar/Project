<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Commande extends Model
{
    use HasFactory;

      //soft delete part
      use SoftDeletes;

      protected $dates=['deleted_at'];
  
}
