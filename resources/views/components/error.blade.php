@if(session('error'))
<div class="alert alert-danger alert-dismissible show fade">
    <button class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
    {{ session('error') }}
</div>
@endif
