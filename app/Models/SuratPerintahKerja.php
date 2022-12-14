<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintahKerja extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $table = 'surat_perintah_kerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_dokumen_spk',
        'tanggal_spk',
        'order_id',
        'tanggal_selesai',
        'status'
      ];

    public function getAutoNumberOptions()
    {
        return [
            'no_dokumen_spk' => [
                'format' => function () {
                    return date('Y.m.d') . '/SPK/?';
                },
                'length' => 5
            ]
        ];
    }
}
