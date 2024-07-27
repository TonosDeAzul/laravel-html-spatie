{{ html()->modelForm($post)->route('posts.update', $post->id)->open() }}
    @include('posts.partials.form')
    <button type="submit">Actualizar</button>
    {{-- <div>
        {{ $user }}
    </div> --}}
{{ html()->closeModelForm() }}