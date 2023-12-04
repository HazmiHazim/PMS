<!-- Main Sidebar Container -->
<form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
    {{ csrf_field() }}
</form>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{--                <img src="{{ asset('../img/01-Logo UMP_Full Color.png') }}" class="img-size-32 elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="{{ url('/') }}" class="d-block">PMS</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('view') }}">
                        <i class="nav-icon far fa-circle nav-icon"></i>
                        My Profile
                    </a>
                </li>

                @if(Auth::user()->role == 'Coordinator')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register_member') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Register Member
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Elections
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-election.list-elected') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    Approve Elected Candidate
                                </a>
                            </li>
                        </ul>

                    </li>

                @elseif(Auth::user()->role == 'Student')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('PtkActivity.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Activities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Elections
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-election.candidates') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    View candidates
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-election.elections') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    Vote Election
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Yearly Calender
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-report.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Report Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-proposal.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Activity Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Election
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-bulletin.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Bulletin
                        </a>
                    </li>

                @elseif(Auth::user()->role == 'Lecturer')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('/PtkActivity/index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-election.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Elections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Yearly Calender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-report.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Report Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-proposal.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Activity Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Election</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-bulletin.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Bulletin</a>
                    </li>

                @elseif(Auth::user()->role == 'Dean')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('PtkActivity.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Yearly Calender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-report.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Report Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-proposal.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Activity Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Election</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-bulletin.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Bulletin</a>
                    </li>

                @elseif(Auth::user()->role == 'PETAKOM Committee')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('PtkActivity.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Elections
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-election.list-candidates') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    Approve Registered Candidates
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manage-election.list-votes') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    View Current Election
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Yearly Calender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-report.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Report Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-proposal.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Activity Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Election</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-bulletin.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Bulletin</a>
                    </li>

                @elseif(Auth::user()->role == 'Head of Student Development')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('PtkActivity.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Elections
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-election.list-elected') }}" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    Approve Elected Candidate
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Yearly Calender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-report.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Report Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-proposal.index') }}">
                            <i class="nav-icon far fa-circle nav-icon"></i>
                            Activity Proposal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="nav-icon far fa-circle nav-icon"></i>Election</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-bulletin.index') }}"><i class="nav-icon far fa-circle nav-icon"></i>Bulletin</a>
                    </li>

                @endif

                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
