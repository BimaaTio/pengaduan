 <!-- jQuery -->
 <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- ChartJS -->
 <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
 <!-- JQVMap -->
 <script src="{{ asset('template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <!-- Summernote -->
 <script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
 <script src="{{ asset('template/dist/js/pages/dashboard.js') }}"></script>
 <!-- JS Libraies -->
 {{-- <script src="{{ asset('template/plugins/sweetalert/sweetalert2.min.js') }}"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- DataTables  & Plugins -->
 <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
 <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

 <script>
     $(function() {
         $("#report").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#report_wrapper .col-md-6:eq(0)');
         $("#example2").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
         $("#example3").DataTable({
             "responsive": true,
             "lengthChange": false,
             "autoWidth": false,
             "buttons": ["excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
         $('#summernote').summernote()
         $("#hapus").click(function() {
             Swal.fire({
                 title: 'Are you sure?',
                 text: "You won't be able to revert this!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                     )
                 }
             })
         });
     });
 </script>
