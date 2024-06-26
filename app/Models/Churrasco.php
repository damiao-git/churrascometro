<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Churrasco extends Model
{
    use HasFactory;
    protected $table = 'churrascos';
    protected $fillable = ['data', 'local', 'qnt_pessoas'];
}
