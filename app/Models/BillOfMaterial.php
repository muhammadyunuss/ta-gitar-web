<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterial extends Model
{
    use HasFactory;

    protected $table = 'billofmaterial';
    protected $primaryKey = 'id';
    protected $fillable = [
        'produk_id',
        'deskripsi'
      ];
}
