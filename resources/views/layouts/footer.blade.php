  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="{{asset('adminCork/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
  <script src="{{asset('adminCork/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('adminCork/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('adminCork/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('adminCork/assets/js/app.js')}}"></script>
  <script>
      $(document).ready(function() {
          App.init();
      });
  </script>
  <script src="{{asset('adminCork/assets/js/custom.js')}}"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="{{asset('adminCork/plugins/apex/apexcharts.min.js')}}"></script>
  <script src="{{asset('adminCork/assets/js/dashboard/dash_1.js')}}"></script>
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

  @stack('js')

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Jun 2022 15:19:13 GMT -->
</html>