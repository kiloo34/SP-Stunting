<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            @if (auth()->user()->role->name == 'Penyuluh')
            <a href="{{ route('penyuluh.dashboard.index') }}" class="nav-link">
            @elseif (auth()->user()->role->name == 'Bidan')
            <a href="{{ route('bidan.dashboard.index') }}" class="nav-link">
            @elseif (auth()->user()->role->name == 'PKK')
            <a href="{{ route('pkk.dashboard.index') }}" class="nav-link">
            @elseif (auth()->user()->role->name == 'Kader')
            <a href="{{ route('kader.dashboard.index') }}" class="nav-link">
            @else
            <a href="#" class="nav-link">
            @endif
                Home
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>git 
        </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->