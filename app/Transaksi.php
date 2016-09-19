<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  protected $table ='transaksi_lara';
  protected $primaryKey = 'id_transaksi';
  protected $fillable = ['total','jenis'];
  public $timestamps = false;
}
