<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['nama', 'jenis', 'jumlahParfum', 'harga'];

    public $timestamps = false; // Add this line to disable the timestamps

    public static function calculateHarga($jenis, $jumlahParfum) {

        $harga = [
            'regular' => 30000,
            'express' => 50000
        ];

        return $harga[$jenis] * $jumlahParfum;
    }
}
