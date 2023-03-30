<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    //protected $fillable = ['nama', 'jurusan', 'tanggal_absen', 'jam_masuk', 'status'];
    protected $table ='absens';
    protected $primaryKey = 'id_absen';
    public $incrementing = true;

    protected $guarded = [];
}
