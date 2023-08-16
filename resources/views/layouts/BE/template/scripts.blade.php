  <!-- General JS Scripts -->
  {{-- <script src="/assets/modules/jquery.min.js"></script> --}}
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

  <script src="{{ asset('BE/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('BE/assets/js/page/modules-toastr.js') }}"></script>
  <script src="{{ asset('BE/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('BE/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('BE/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('BE/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('BE/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('BE/assets/js/stisla.js') }}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js">
  </script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('BE/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('BE/assets/js/custom.js') }}"></script>

  <script src="{{ asset('BE/assets/js/page/bootstrap-modal.js') }}"></script>
  {{-- <script src=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js "></script> --}}

  @yield('js')
