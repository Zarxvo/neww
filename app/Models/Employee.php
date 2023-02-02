<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'jeniskelamin', 'notelp', 'foto', 'id_agama', 'tanggal_lahir', 'id_jabatan', 'id_golongan'];
}
