<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';

    protected $fillable = [
    'nama',
    'jenis', 
    'merk', 
    'warna',
    'status'];
}
