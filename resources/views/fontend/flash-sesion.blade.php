@if ($message = Session::get('error'))
    <div class="form-group">
        <span style="color: red"> {{ $message }}</span>
    </div>
@endif

