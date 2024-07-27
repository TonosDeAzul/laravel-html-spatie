{{ html()->form()->route('categories.store')->open() }}
    @include('categories.partials.form')
    <button type="submit">Subir</button>
{{ html()->form()->close() }}
