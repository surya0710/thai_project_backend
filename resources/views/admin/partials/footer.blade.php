        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 p-0 footer-copyright">
                <p class="mb-0">Copyright © 2017 - 2025</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('assets/admin/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/admin/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('assets/admin/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/admin/js/owlcarousel/owl-custom.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('assets/admin/js/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/admin/js/editor/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2/select2-custom.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <script>
      $(document).ready(function () {
        $('#myTable').DataTable({
            dom: 'Bflrtip', // B = Buttons, f = Search, l = Length, t = Table, i = Info, p = Pagination
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            paging: true,        // Enable Pagination
            searching: true,     // Enable Search 
            lengthMenu: [
                [5, 10, 25, 50, 100, 500, -1],
                [5, 10, 25, 50, 100, 500, "All"]
            ], // Entries dropdown, -1 for "All"
        });
      });
    </script>
  </body>
</html>
@include('admin.partials.popup')

