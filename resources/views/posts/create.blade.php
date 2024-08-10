{{ html()->form()->route('posts.store')->acceptsFiles()->open() }}
    @include('posts.partials.form')
    <button type="submit">Subir</button>
{{ html()->form()->close() }}
