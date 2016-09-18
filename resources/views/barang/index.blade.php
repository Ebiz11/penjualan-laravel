@extends('layouts.index')
@section('content')

<script type="text/javascript">
  var table;
  $(document).ready(function(){
    $('.addForm').hide();
    $('.editForm').hide();

    table = $("#data-barang").DataTable({
      //  processing: true,
          serverSide: true,
          ajax: '{{ url("/getBarang") }}',
          columns: [
              { data: 'id_barang', name: 'id_barang' },
              { data: 'nama_barang', name: 'nama_barang' },
              { data: 'harga_jual', name: 'harga_jual' },
              { data: 'stok', name: 'stok' },
              { data: 'action', name: 'action', orderable: false, searchable: false}
          ]
    });

  });

  function reload_table(){
  table.ajax.reload(null,false);
  }

  function destroy(id){
    $.ajax({
        type    : 'GET',
        url     : "{{ url('destroy') }}",
        data    : 'id='+id,
        success : function(){
          reload_table();
        }
    });
  }

  function create(){
    $.ajax({
        type    : 'GET',
        url     : "{{ url('store') }}",
        data    : $('#createForm').serialize(),
        success : function(){
          $('#createForm')[0].reset();
          reload_table();
          $('.addForm').slideUp();
        }
    });
  }

  function editBarang(id){
    $('.addForm').slideUp();
    $.ajax({
      type      : 'GET',
      dataType  :'JSON',
      url       : "{{url('show')}}",
      data      : 'id='+id,
      success:function(data){
        $('#id_barangEdit').val(data.id_barang);
        $('#nama_barangEdit').val(data.nama_barang);
        $('#harga_jualEdit').val(data.harga_jual);
        $('#stokEdit').val(data.stok);
        $('.editForm').slideDown();
        reload_table();
      }
    });
  }

  function update(){
    $.ajax({
      type    : 'GET',
      url     : "{{ url('update') }}",
      data    : $('#updateForm').serialize(),
      success :function(){
            $('#updateForm')[0].reset();
            reload_table();
            $('.editForm').slideUp();
      }
    });
  }

</script>

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

            <!-- ###############################   FROM ADD #################################### -->
            <div class="addForm">
              <form id="createForm" class="form-horizontal">
                <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}">

                  <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="stok" name="stok" required="">
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <a href="javascript:void(0);" class="btn btn-white" onclick="$('.addForm').slideUp()">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="create()">Simpan</a>
                      </div>
                  </div>
              </form>
              <div class="hr-line-dashed"></div>
            </div>

            <!-- #################################################################################### -->

            <!-- ################################   FROM EDIT #################################### -->

            <div class="editForm">
              <form id="updateForm" class="form-horizontal">
                <!-- {!! csrf_field() !!} -->
                  <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}">
                  <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barangEdit" name="nama_barangEdit" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_jualEdit" name="harga_jualEdit" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="stokEdit" name="stokEdit" required="">
                      </div>
                  </div>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <input type="hidden" class="form-control" id="id_barangEdit" name="id_barangEdit" required="">
                        <a href="javascript:void(0);" class="btn btn-white" onclick="$('.editForm').slideUp()">Cancel</a>
                        <!-- <input type="submit" class="btn btn-primary" name="submit" value="Update"> -->
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="update()">Update</a>
                      </div>
                  </div>
              </form>
            </div>
            <!-- ###########################################################################################s -->

            <button onclick="$('.addForm').slideToggle(); $('.editForm').slideUp();" class="btn btn-info">Tambah</button><br><br>
            <table id="data-barang" class="table table-striped table-hover" >
            <thead>
            <tr>
              <th>Id Barang</th>
              <th>Nama Barang</th>
              <th>Harga Jual</th>
              <th>Stok</th>
              <th>action</th>
            </tr>
            </thead>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
