@if (session('info'))
    <div class="alert alert-info mb-4" role="alert">
        {{ session('info') }}
    </div>
@endif

@if (session('primary'))
    <div class="alert alert-primary mb-4" role="alert">
        {{ session('primary') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success mb-4" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning mb-4" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mb-4" role="alert">
        {{ session('error') }}
    </div>
@endif