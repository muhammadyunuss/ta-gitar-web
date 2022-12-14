<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Order extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_dokumen_order',
        'customer_id',
        'tanggal_order',
        'no_po_customer',
        'karyawan_id',
        'total_harga',
        'status'
      ];

    public function getAutoNumberOptions()
    {
        return [
            'no_dokumen_order' => [
                'format' => function () {
                    return date('Y.m.d') . '/ODR/?';
                },
                'length' => 5
            ]
        ];
    }
}
