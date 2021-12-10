<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route ('dashboard')}}"><i class
                            ="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data</li><!-- /.menu-title -->
                    <li class="">
                        <a href="{{ route('falsealarms.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Data False Alarm</a>
                    </li>
                    <li class="">
                        <a href="{{ route('falsealarms.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Data False Alarm</a>
                    </li>

                    <li class="menu-title">Schedule</li>
                    <li class="">
                        <a href="{{ route('schedules.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Data Schedule</a>
                    </li>
                    <li class="">
                        <a href="{{ route('schedules.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Data Schedule</a>
                    </li>

                    <li class="menu-title">Panduan Pengisian</li><!-- /.menu-title -->
                    <li class="">
                        <a href="#"> <i class="menu-icon fa fa-list"></i>Lihat Panduan</a>
                    </li>
                    <li class="">

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
