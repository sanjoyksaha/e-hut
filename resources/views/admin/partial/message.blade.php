@if(session('success'))
    <div class="alert alert-success" style="background: #00b894;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            <i class="mdi mdi-close"></i>
        </a>
        <span class="text-light"><strong>{{ session('success') }}</strong></span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" style="background: #d63031;">
        <a href="#" class="close text-light" data-dismiss="alert" aria-label="close">
            <i class="mdi mdi-close"></i>
        </a>
        <span class="text-light"><strong>{{ session('error') }}</strong></span>
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" style="background: #d63031;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-time"></i>
            </button>
            <span class="text-light"><strong>{{ $error }}</strong></span>
        </div>
    @endforeach
@endif
