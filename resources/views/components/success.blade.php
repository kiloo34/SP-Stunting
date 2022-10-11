@if(session('success'))
<div class="alert alert-success alert-dismissible show fade">
    <button class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
    {{ session('success') }}
</div>
@endif
