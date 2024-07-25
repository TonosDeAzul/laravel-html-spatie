{{-- @csrf
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
<div>
    <input type="text" placeholder="Confirme su correo" name="email_confirmation">
</div>
@if (!isset($user))
<div>
    <input type="password" placeholder="Contraseña" name="password" value="{{ old('password') }}">
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input type="password" placeholder="Confirme su contraseña" name="password_confirmation">
</div>
@endif --}}

{{ html()->hidden('id') }}

<div>
    {{ html()->label('name') }}
    {{ html()->text('name') }}
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('email') }}
    {{ html()->text('email')->placeholder('Ingrese su correo') }}
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('password') }}
    {{ html()->password('password')->placeholder('Ingrese su contraseña') }}
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
