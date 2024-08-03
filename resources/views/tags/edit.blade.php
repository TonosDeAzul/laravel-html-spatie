{{ html()->modelForm($tag)->route('tags.update', $tag->id)->open() }}
    @include('tags.partials.form')
    <button type="submit">Actualizar</button>
    {{-- <div>
        {{ $user }}
    </div> --}}
{{ html()->closeModelForm() }}