<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ucfirst($title)}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        @if (auth()->user()->role->name == 'Penyuluh')
                        <a href="{{ route('penyuluh.dashboard') }}">    
                        @elseif (auth()->user()->role->name == 'Bidan')
                        <a href="{{ route('bidan.dashboard') }}">
                        @elseif (auth()->user()->role->name == 'PKK')
                        <a href="{{ route('pkk.dashboard') }}">
                        @elseif (auth()->user()->role->name == 'Kader')
                        <a href="{{ route('kader.dashboard') }}">
                        @else
                        <a href="#">
                        @endif
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        @if (auth()->user()->role->name == 'Penyuluh')
                        <a href="{{ route('penyuluh.dashboard') }}">    
                        @elseif (auth()->user()->role->name == 'Bidan')
                        <a href="{{ route('bidan.dashboard') }}">
                        @elseif (auth()->user()->role->name == 'PKK')
                        <a href="{{ route('pkk.dashboard') }}">
                        @elseif (auth()->user()->role->name == 'Kader')
                        <a href="{{ route('kader.dashboard') }}">
                        @else
                        <a href="#">
                        @endif
                            {{ucfirst($title)}}
                        </a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>