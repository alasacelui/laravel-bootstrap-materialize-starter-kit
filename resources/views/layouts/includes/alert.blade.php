@if(session('success'))
<div class="alert alert-success alert-dismissible fade show p-3 text-white" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show p-3 text-white" role="alert">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show p-3 text-white" role="alert">
    <span class="text-white">
        {{ session('error') }}
    </span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show p-3 text-white" role="alert">
    <span class="text-white">
        {{ session('warning') }}
    </span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show p-3 text-white" role="alert"">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
@endif