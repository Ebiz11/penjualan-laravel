<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table ='barang_lara';
  protected $primaryKey = 'id_barang';
  protected $fillable = ['nama_barang','harga_jual', 'stok'];
  public $timestamps = false;
}
