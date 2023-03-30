<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    // protected $fillable = ['id_mahasiswa','nama', 'jurusan', 'periode', 'email', 'password'];
    protected $table ='mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    public $incrementing = true;
    protected $guarded = [];
}
?>