<script src="/plugins/jquery/jquery.min.js"></script>

<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="/plugins/chart.js/Chart.min.js"></script>

<script src="/plugins/sparklines/sparkline.js"></script>

<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>

<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="/dist/js/adminlte.js?v=3.2.0"></script>


<script src="/dist/js/pages/dashboard.js"></script>

    <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>

  @if(session('tambah'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil ditambah',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

  @if(session('edit'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil diedit',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

  @if(session('delete'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil didelete',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

    @if(session('errorboking'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Maaf Kamar sudah penuh',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

      @if(session('bookingberhasil'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Boking berhasil',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif
    