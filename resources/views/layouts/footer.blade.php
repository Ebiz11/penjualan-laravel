
</div>
  <div class="footer">
    <div class="pull-right">
        Lustria Ebiz
    </div>
    <div>
        <strong>Copyright</strong> &copy; <?php echo date("Y");  ?>
    </div>
</div>

</div>
</div>

<!-- Mainly scripts -->

<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('template/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('template/js/inspinia.js')}}"></script>
<script src="{{asset('template/js/plugins/pace/pace.min.js')}}"></script>

<!-- Data Tables -->
  <script src="{{asset('template/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('template/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
  <script src="{{asset('template/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
  <script src="{{asset('template/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>

  <style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>

  <!-- Page-Level Scripts -->
  <script>
      $(document).ready(function() {
          $('.dataTables-example').dataTable({
              responsive: true,
              "dom": 'T<"clear">lfrtip',
              "tableTools": {
                  "sSwfPath": "{{asset('template/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf')}}"
              }
          });

          /* Init DataTables */
          var oTable = $('#editable').dataTable();

          /* Apply the jEditable handlers to the table */

          oTable.$('td').editable( '{{asset('template/example_ajax.php')}}', {
              "callback": function( sValue, y ) {
                  var aPos = oTable.fnGetPosition( this );
                  oTable.fnUpdate( sValue, aPos[0], aPos[1] );
              },
              "submitdata": function ( value, settings ) {
                  return {
                      "row_id": this.parentNode.getAttribute('id'),
                      "column": oTable.fnGetPosition( this )[2]
                  };
              },

              "width": "90%",
              "height": "100%"
          } );


      });

      function fnClickAddRow() {
          $('#editable').dataTable().fnAddData( [
              "Custom row",
              "New row",
              "New row",
              "New row",
              "New row" ] );

      }
  </script>

<!-- iCheck -->
<script src="{{asset('template/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
