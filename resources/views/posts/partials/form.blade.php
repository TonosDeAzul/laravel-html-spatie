<div>
    {{ html()->label('title') }}
    {{ html()->text('title')->placeholder('Escriba el titulo') }}
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('body') }}
    {{ html()->textarea('body')->placeholder('Escriba el contenido') }}
    @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('user_id') }}
    {{ html()->select('user_id', $users)->placeholder('Seleccione') }}
    @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
