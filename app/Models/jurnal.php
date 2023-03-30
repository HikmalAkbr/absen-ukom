<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurnal extends Model
{
    use HasFactory;
    //protected $fillable = ['nama', 'jurusan', 'tanggal_absen', 'jam_masuk', 'status'];
    protected $table ='jurnal';
    protected $primaryKey = 'id_jurnal';
    public $incrementing = true;

    protected $guarded = [];
}
