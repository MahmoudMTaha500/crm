<!DOCTYPE html>
<html lang="en">

@include('admin.includes.header')


@include('admin.includes.menu')
@include('admin.includes.sidebar')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

@yield('admin.content')   

        </div>
    </div>
    </div>
    </div>
</div>

</div>

@include('sweetalert::alert')

@include('admin.includes.footer')
@yield('admin.scripts')   
</body>


</html>