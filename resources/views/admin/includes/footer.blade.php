@if(isset($useVue))
<script src="{{asset('js/app.js')}}"></script>
@endif
<script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

<script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>

<!-- Vendor JS       -->

<script src="{{asset('vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>

<script src="{{asset('/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{asset('/vendor/select2/form-select2.js')}}"></script>

<!-- Main JS-->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{asset('/')}}/js/main.js"></script>



