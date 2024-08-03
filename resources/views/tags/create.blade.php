{{ html()->form()->route('tags.store')->open() }}
    @include('tags.partials.form')
    <button type="submit">Subir</button>
{{ html()->form()->close() }}
