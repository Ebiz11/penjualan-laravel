@extends('layouts.index')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Daftar Buku</h5>
              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#">Config option 1</a>
                      </li>
                      <li><a href="#">Config option 2</a>
                      </li>
                  </ul>
                  <a class="close-link">
                      <i class="fa fa-times"></i>
                  </a>
              </div>
          </div>
          <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga Jual</th>
              <th>Stok</th>
            </tr>
            </thead>
            <tbody>
              
              <?php $no = 1; ?>
              @foreach ($datas as $data)
                <tr class="gradeX">
                  <td>{{$no++}}</td>
                  <td>{{$data->nama_barang}}</td>
                  <td>{{$data->harga_jual}}</td>
                  <td>{{$data->stok}}</td>
                </tr>

              @endforeach

            </table>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
