<div>
    {{ html()->label('name') }}
    {{ html()->text('name')->placeholder('Escriba el nombre') }}
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>