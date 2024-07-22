@csrf
<div>
    <input type="text" placeholder="Nombre" name="name" value="{{ old('name') ? old('name') : (isset($user) ? $user->name : '') }}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input type="text" placeholder="Correo" name="email" value="{{ old('email') ? old('email') : (isset($user) ? $user->email : '') }}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
{{-- <div>
    <input type="text" placeholder="Confirme su correo" name="email_confirmation">
</div> --}}
@if(!isset($user))
<div>
    <input type="password" placeholder="Contraseña" name="password" value="{{ old('password') }}">
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
{{-- <div>
    <input type="password" placeholder="Confirme su contraseña" name="password_confirmation">
</div> --}}
@endif