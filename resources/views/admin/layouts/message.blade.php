<div class="error">
    @if ($errors->any)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger p-1 my-1">{{ $error }}</div>
        @endforeach

    @endif
</div>
<div class="success">
    @if (session('success') != null)
        <div class="alert alert-success p-1 my-1">{{ session('success') }}</div>
    @endif
</div>
