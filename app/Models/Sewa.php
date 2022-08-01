<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $table = 'sewa';

    protected $fillable = [
    'id_pelanggan',
    'id_mobil', 
    'tgl_pinjam', 
    'tgl_kembali',
    'total_bayar'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
