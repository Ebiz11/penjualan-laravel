<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table ='supplier_lara';
  protected $primaryKey = 'id_supplier';
  protected $fillable = ['nama_supplier','no_telp', 'alamat'];
  public $timestamps = false;
}
