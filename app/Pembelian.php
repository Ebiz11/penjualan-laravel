<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
  protected $table ='pembelian_lara';
  protected $primaryKey = 'id_pembelian';
  protected $fillable = ['id_barang','id_transaksi', 'id_supplier','jumlah','sub_total'];
  public $timestamps = false;
}
