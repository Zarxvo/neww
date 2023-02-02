<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'golongans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_golongan'];
}
