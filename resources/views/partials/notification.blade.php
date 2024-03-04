@if (session('success'))
    <div id="notification" class="notification success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="notification" class="notification error">
        {{ session('error') }}
    </div>
@endif
