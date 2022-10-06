<div class="col-12">
    @if (session('success'))
        <span class="alert alert-success d-block" role="alert">
            <strong>{{ session('success') }}</strong>
        </span>
    @endif
    @if (session('warning'))
        <span class="alert alert-danger d-block" role="alert">
            <strong>{{ session('warning') }}</strong>
        </span>
    @endif
</div>