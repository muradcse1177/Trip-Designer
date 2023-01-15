<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        @if(@$company_info->logo)
            <div style="background-color: #FFFFFF; border-radius: 10px;" >
                <img src="{{url(@$company_info->logo)}}" width="150" height="40" style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;">
            </div>
        @else
            <div>
                <h4 style="color: #FFFFFF;">{{@$company_info->company_name}}</h4>
            </div>
        @endif
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item @yield('ticketMenu')">
                    <a href="#" class="nav-link @yield('airTicket')">
                        <i class="nav-icon fas fa-plane"></i>
                        <p>
                            Air Ticket
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('newAirTicket')}}" class="nav-link @yield('newAirTicket')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>New Air Ticket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url("reissueAirTicket")}}" class="nav-link @yield('reissueAirTicket')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Reissue Ticket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url("refundAirTicket")}}" class="nav-link @yield('refundAirTicket')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Refund Ticket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url("cancelAirTicket")}}" class="nav-link @yield('cancelAirTicket')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Temporary Cancel Ticket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://tripdesigner.xyz/" class="nav-link" target="_blank">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Order Air Ticket</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Hotel Booking
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('visaMenu')">
                    <a href="#" class="nav-link @yield('visa')">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Visa Processing
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url("newVisaProcess")}}" class="nav-link @yield('newVisaProcess')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Visa Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('tourMenu')">
                    <a href="#" class="nav-link @yield('tourPackage')">
                        <i class="nav-icon fas fa-umbrella-beach"></i>
                        <p>
                            Tour packages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url("newTourPackage")}}" class="nav-link @yield('newTourPackage')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p> Tour Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-kaaba"></i>
                        <p>
                            Hajj & Ummrah
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manpower
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-train"></i>
                        <p>
                            Train Ticket
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bus"></i>
                        <p>
                            Bus Ticket
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('accountMenu')">
                    <a href="#" class="nav-link @yield('accounts')">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Finance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('transactions')}}" class="nav-link @yield('transactions')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('officeExpenses')}}" class="nav-link @yield('officeExpenses')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Office Expense/Income</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('bankAccounts')}}" class="nav-link @yield('bankAccounts')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Bank Accounts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @yield('userMenu')">
                    <a href="#" class="nav-link @yield('users')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Passengers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('users')}}" class="nav-link  @yield('users')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Passengers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @yield('settingsMenu')">
                    <a href="#" class="nav-link @yield('settings')">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('companyInfo')}}" class="nav-link  @yield('companyInfo')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Company Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('vendors')}}" class="nav-link  @yield('vendors')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Vendor Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('employees')}}" class="nav-link  @yield('employees')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Employee Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('airlines')}}" class="nav-link  @yield('airlines')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Airlines Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('airports')}}" class="nav-link  @yield('airports')">
                                <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                <p>Airport Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @yield('websiteMenu')">
                    <a href="#" class="nav-link @yield('settings')">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Website Settings
                            <i class="fas fa-angle-left right"></i><br>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('vendors')}}" class="nav-link  @yield('vendors')">
                                <i class="fas fa-user-alt nav-icon"></i>
                                <p>Website Settings</p><br><br>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
