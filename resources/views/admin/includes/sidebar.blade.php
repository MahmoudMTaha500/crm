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
                @if( auth()->user()->hasRole('admin'))
                    <li class=" @if(Route::is('report.*') )  active @endif has-sub">
                        <a class="js-arrow  " href="#">
                            <i class="fas fa-flag"></i>Reports</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li class=" @if(Route::is('report-university') )  active @endif " >
                                <a href="{{route('report-university')}}"> Report University</a>
                            </li>
                            <li class=" @if(Route::is('report-english-school') )  active @endif ">
                                <a href="{{route('report-english-school')}}">Report English School</a>
                            </li>
                            <li class=" @if(Route::is('report-student') )  active @endif ">
                                <a href="{{route('report-student')}}">Report Student</a>
                            </li>

                        </ul>
                    </li>
                @endif
@if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-country')  )
                <li class=" @if(Route::is('country.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-flag"></i>Countries</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('country.index') )  active @endif " >
                            <a href="{{route('country.index')}}"> All Countries</a>
                        </li>
                        @if(  auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-country') )
                        <li class=" @if(Route::is('country.create') )  active @endif ">
                            <a href="{{route('country.create')}}">Add Country</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-city')  )
                <li class=" @if(Route::is('city.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-home"></i>Cities</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('city.index') )  active @endif ">
                            <a href="{{route('city.index')}}"> All Cities</a>
                        </li>
                        @if(  auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-city') )

                        <li class=" @if(Route::is('city.create') )  active @endif ">
                            <a href="{{route('city.create')}}">Add City</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-requestuniversity')  )

                <li class=" @if(Route::is('university.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-university"></i>Universities </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('university.index') )  active @endif ">
                            <a href="{{route('university.index')}}"> All Universities</a>
                        </li>
                        @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-requestuniversity') )

                        <li class=" @if(Route::is('university.create') )  active @endif ">
                            <a href="{{route('university.create')}}">Add University</a>
                        </li>
                        @endif

                    </ul>
                </li>
                @endif
                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-requestenglishschool')  )

                <li class=" @if(Route::is('english-school.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fa fa-school"></i>English Schools </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('english-school.index') )  active @endif ">
                            <a href="{{route('english-school.index')}}"> All English Schools</a>
                        </li>
                        @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-requestenglishschool') )

                        <li class=" @if(Route::is('english-school.create') )  active @endif ">
                            <a href="{{route('english-school.create')}}">Add New English School</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-student')  )

                <li class=" @if(Route::is('student.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-users"></i>Students</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('student.index') )  active @endif ">
                            <a href="{{route('student.index')}}"> All Students</a>
                        </li>
                        @if (  auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-student') )

                        <li class=" @if(Route::is('student.create') )  active @endif ">
                            <a href="{{route('student.create')}}">Add Student</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif

                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-request-university')  )

                <li class=" @if(Route::is('university-request.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas  fa-paper-plane "></i>University Requests</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('university-request.index') )  active @endif ">
                            <a href="{{route('university-request.index')}}"> All University Requests</a>
                        </li>
                        @if(  auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-request-university') )

                        <li class=" @if(Route::is('university-request.create') )  active @endif ">
                            <a href="{{route('university-request.create')}}">Add University Request</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif
                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-request-english-school')  )

                <li class=" @if(Route::is('english-school-request.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas  fa-paper-plane "></i>English School Requests</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('english-school-request.index') )  active @endif ">
                            <a href="{{route('english-school-request.index')}}"> All English Schools Requests</a>
                        </li>
                        @if(  auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-request-english-school') )

                        <li class=" @if(Route::is('english-school-request.create') )  active @endif ">
                            <a href="{{route('english-school-request.create')}}">Add English School Request</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif
                @if( auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-agency')  )

                <li class=" @if(Route::is('agency.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas  fa-paper-plane "></i>Agency </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('student-request.index') )  active @endif ">
                            <a href="{{route('agency.index')}}"> All Agencies </a>
                        </li>
                        @if(  auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-agency') )

                        <li class=" @if(Route::is('agency.create') )  active @endif ">
                            <a href="{{route('agency.create')}}">Add Agency </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-salesman'))
                <li class=" @if(Route::is('salesman.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-male"></i>Salesmans</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('salesman.index') )  active @endif ">
                            <a href="{{route('salesman.index')}}"> All Salesmans</a>
                        </li>
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-salesman'))

                        <li class=" @if(Route::is('salesman.create') )  active @endif ">
                            <a href="{{route('salesman.create')}}">Add Salesman</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-marketer'))

                <li class=" @if(Route::is('markter.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-male"></i>Markters</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('markter.index') )  active @endif ">
                            <a href="{{route('markter.index')}}"> All Markters</a>
                        </li>
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-salesman'))

                        <li class=" @if(Route::is('markter.create') )  active @endif ">
                            <a href="{{route('markter.create')}}">Add Markter</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-employee'))

                <li class=" @if(Route::is('employee.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fas fa-male"></i>Employees</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('employee.index') )  active @endif ">
                            <a href="{{route('employee.index')}}"> All Employees</a>
                        </li>
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-employee'))

                        <li class=" @if(Route::is('employee.create') )  active @endif ">
                            <a href="{{route('employee.create')}}">Add Employee</a>
                        </li>
                        @endif


                    </ul>
                </li>

               @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-visa'))

                <li class=" @if(Route::is('visa.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fa fa-cc-visa"></i>Visa</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('visa.index') )  active @endif ">
                            <a href="{{route('visa.index')}}"> All Visa</a>
                        </li>
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-employee'))

                        <li class=" @if(Route::is('visa.create') )  active @endif ">
                            <a href="{{route('visa.create')}}">Add Visa</a>
                        </li>
                        @endif


                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-visa'))

                <li class=" @if(Route::is('visa-type.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fa fa-cc-visa"></i>Visa Type</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('visa-type.index') )  active @endif ">
                            <a href="{{route('visa-type.index')}}"> All Visa Type</a>
                        </li>
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-visa'))

                        <li class=" @if(Route::is('visa-type.create') )  active @endif ">
                            <a href="{{route('visa-type.create')}}">Add  Visa Type</a>
                        </li>
                        @endif

                        <li>
                            <a href="index3.html">archive</a>
                        </li>

                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-bank'))

                <li class=" @if(Route::is('bank.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fa fa-bank"></i> Bank</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('bank.index') )  active @endif ">
                            <a href="{{route('bank.index')}}"> All Bank</a>
                        </li>
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('create-bank'))

                        <li class=" @if(Route::is('bank.create') )  active @endif ">
                            <a href="{{route('bank.create')}}">Add  New Bank</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif


                @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('show-finance'))

                <li class=" @if(Route::is('finance-university.*') )  active @endif has-sub">
                    <a class="js-arrow  " href="#">
                        <i class="fa fa-donate"></i>Finance</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class=" @if(Route::is('finance-university.index') )  active @endif ">
                            <a href="{{route('finance-university.index')}}">  Finance Universitys</a>
                        </li>

                        <li class=" @if(Route::is('finance-english-school.*') )  active @endif ">
                            <a href="{{route('finance-english-school.index')}}"> finance English Schools</a>
                        </li>


                    </ul>
                </li>
                @endif


            </ul>
        </nav>
    </div>
</aside>
