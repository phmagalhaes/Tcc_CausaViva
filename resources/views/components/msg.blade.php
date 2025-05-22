@if (session('errorMsg'))
    <div class="msg">
        <p class="errorMsg">{{ session('errorMsg') }}</p>
    </div>
@elseif (session('sucMsg'))
    <div class="msg">
        <p class="sucMsg">{{ session('sucMsg') }}</p>
    </div>
@endif