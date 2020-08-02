@if(session('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times
            <i class="fas fa-time"></i>
        </a>
        <span><strong>{{ session('success') }}</strong></span>
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-time"></i>
            </button>
            <span><strong>{{ $error }}</strong></span>
        </div>
    @endforeach
@endif
