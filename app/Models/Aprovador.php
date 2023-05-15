<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprovador extends Model
{
    use HasFactory;
   protected $table = 'aprovadores';
   public $incrementing = true;
}
