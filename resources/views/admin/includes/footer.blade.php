@if(isset($useVue))
<script src="{{asset('js/app.js')}}"></script>      
@endif
<script src="{{url('/')}}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{url('/')}}/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="{{url('/')}}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="{{url('/')}}/vendor/slick/slick.min.js">
</script>
<script src="{{url('/')}}/vendor/wow/wow.min.js"></script>
<script src="{{url('/')}}/vendor/animsition/animsition.min.js"></script>
<script src="{{url('/')}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="{{url('/')}}/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="{{url('/')}}/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="{{url('/')}}/vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{url('/')}}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{url('/')}}/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="{{url('/')}}/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{url('/')}}/js/main.js"></script>



