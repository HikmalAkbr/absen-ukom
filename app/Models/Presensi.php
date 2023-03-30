<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    //protected $fillable = ['nama', 'jurusan', 'tanggal_absen', 'jam_masuk', 'status'];
    protected $table ='presensi';
    protected $primaryKey = 'id_absen';
    public $incrementing = true;

    protected $guarded = [];
}
