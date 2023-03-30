<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unggah extends Model
{
    use HasFactory;
    protected $table = "Unggah";
    protected $fillable = ['file','keterangan', 'tanggal_upload'];
}
