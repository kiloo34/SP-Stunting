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
                        <a href="{{ route('penyuluh.dashboard.index') }}">    
                        @elseif (auth()->user()->role->name == 'Bidan')
                        <a href="{{ route('bidan.dashboard.index') }}">
                        @elseif (auth()->user()->role->name == 'PKK')
                        <a href="{{ route('pkk.dashboard.index') }}">
                        @elseif (auth()->user()->role->name == 'Kader')
                        <a href="{{ route('kader.dashboard.index') }}">
                        @else
                        <a href="#">
                        @endif
                            Home
                        </a>
                    </li>
                    @if ($subtitle != '')
                    <li class="breadcrumb-item">
                        @if (auth()->user()->role->name == 'Penyuluh')
                        <a href="{{ route('penyuluh.'.$title.'.index') }}">    
                        @elseif (auth()->user()->role->name == 'Bidan')
                        <a href="{{ route('bidan.'.$title.'.index') }}">
                        @elseif (auth()->user()->role->name == 'PKK')
                        <a href="{{ route('pkk.'.$title.'.index') }}">
                        @elseif (auth()->user()->role->name == 'Kader')
                        <a href="{{ route('kader.'.$title.'.index') }}">
                        @else
                        <a href="#">
                        @endif
                            {{ucfirst($title)}}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        @if (auth()->user()->role->name == 'Penyuluh')
                        <a href="{{ route('penyuluh.'.$title.'.'.$subtitle) }}">    
                        @elseif (auth()->user()->role->name == 'Bidan')
                        <a href="{{ route('bidan.'.$title.'.'.$subtitle) }}">
                        @elseif (auth()->user()->role->name == 'PKK')
                        <a href="{{ route('pkk.'.$title.'.'.$subtitle) }}">
                        @elseif (auth()->user()->role->name == 'Kader')
                        <a href="{{ route('kader.'.$title.'.'.$subtitle) }}">
                        @else
                        <a href="#">
                        @endif
                            {{ucfirst($subtitle)}}
                        </a>
                    </li>
                    @else
                    <li class="breadcrumb-item active">
                        @if (auth()->user()->role->name == 'Penyuluh')
                        <a href="{{ route('penyuluh.'.$title.'.index') }}">    
                        @elseif (auth()->user()->role->name == 'Bidan')
                        <a href="{{ route('bidan.'.$title.'.index') }}">
                        @elseif (auth()->user()->role->name == 'PKK')
                        <a href="{{ route('pkk.'.$title.'.index') }}">
                        @elseif (auth()->user()->role->name == 'Kader')
                        <a href="{{ route('kader.'.$title.'.index') }}">
                        @else
                        <a href="#">
                        @endif
                            {{ucfirst($title)}}
                        </a>
                    </li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>