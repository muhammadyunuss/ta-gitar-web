<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfMaterialDetail extends Model
{
    use HasFactory;

    protected $table = 'billofmaterial_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'billofmaterial_id',
        'bahanbaku_id',
        'qty',
      ];
}
