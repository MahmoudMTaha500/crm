<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class=" @if(Route::is('home') )  active @endif has-sub">
                    <a class="" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                  
                </li>  
@if(auth()->user()->hasRole('admission') || auth()->user()->hasRole('admin'))
                <li class=" @if(Route::is('country.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-flag"></i>Countries</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('country.index') )  active @endif " >
                            <a href="{{route('country.index')}}"> All Countries</a>
                        </li>
                        <li class=" @if(Route::is('country.create') )  active @endif ">
                            <a href="{{route('country.create')}}">Add Country</a>
                        </li>
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                        
                    </ul>
                </li>
                <li class=" @if(Route::is('city.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-home"></i>Cities</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('city.index') )  active @endif ">
                            <a href="{{route('city.index')}}"> All Cities</a>
                        </li>
                        <li class=" @if(Route::is('city.create') )  active @endif ">
                            <a href="{{route('city.create')}}">Add City</a>
                        </li>
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>   
                <li class=" @if(Route::is('place.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-university"></i>Places Of Study</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('place.index') )  active @endif ">
                            <a href="{{route('place.index')}}"> All Places</a>
                        </li>
                        <li class=" @if(Route::is('place.create') )  active @endif ">
                            <a href="{{route('place.create')}}">Add Place</a>
                        </li>
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
                <li class=" @if(Route::is('student.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-users"></i>Students</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('student.index') )  active @endif ">
                            <a href="{{route('student.index')}}"> All Students</a>
                        </li>
                        <li class=" @if(Route::is('student.create') )  active @endif ">
                            <a href="{{route('student.create')}}">Add Student</a>
                        </li>
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
                <li class=" @if(Route::is('student-request.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas  fa-paper-plane "></i>Student Requests</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('student-request.index') )  active @endif ">
                            <a href="{{route('student-request.index')}}"> All Student Requests</a>
                        </li>
                        <li class=" @if(Route::is('student-request.create') )  active @endif ">
                            <a href="{{route('student-request.create')}}">Add Student Request</a>
                        </li>
                        
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasRole('admin'))
                <li class=" @if(Route::is('salesman.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-male"></i>Salesmans</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('salesman.index') )  active @endif ">
                            <a href="{{route('salesman.index')}}"> All Salesmans</a>
                        </li>
                        <li class=" @if(Route::is('salesman.create') )  active @endif ">
                            <a href="{{route('salesman.create')}}">Add Salesman</a>
                        </li>
                        
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
                <li class=" @if(Route::is('employee.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-male"></i>Employees</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('employee.index') )  active @endif ">
                            <a href="{{route('employee.index')}}"> All Employees</a>
                        </li>
                        <li class=" @if(Route::is('employee.create') )  active @endif ">
                            <a href="{{route('employee.create')}}">Add Employee</a>
                        </li>
                        
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
            
               @endif
               @if(auth()->user()->hasRole('visa')||auth()->user()->hasRole('admin'))
                <li class=" @if(Route::is('visa.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fa fa-cc-visa"></i>Visa</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('visa.index') )  active @endif ">
                            <a href="{{route('visa.index')}}"> All Visa</a>
                        </li>
                        <li class=" @if(Route::is('visa.create') )  active @endif ">
                            <a href="{{route('visa.create')}}">Add Visa</a>
                        </li>
                        
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
                @endif

                @if(auth()->user()->hasRole('visa'))

                <li class=" @if(Route::is('student.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-users"></i>Students</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('student.index') )  active @endif ">
                            <a href="{{route('student.index')}}"> All Students</a>
                        </li>
                        <li class=" @if(Route::is('student.create') )  active @endif ">
                            <a href="{{route('student.create')}}">Add Student</a>
                        </li>
                        <li>
                            <a href="index3.html">archive</a>
                        </li>
                      
                    </ul>
                </li>
@endif

                {{-- <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>