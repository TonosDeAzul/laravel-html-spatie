<a href="{{ route('posts.create') }}">Create post</a>

<div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Cuerpo</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Tag</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>
                        {{ $post->id }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->body }}
                    </td>
                    <td>
                        {{ $post->user->name }}
                    
                    </td>
                    <td>
                        {{ $post->category->name ?? 'No tiene categoría' }}
                    </td>
                    <td>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}                    
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}">Modificar</a>

                        {{ html()->modelForm($post)->route('posts.destroy', $post->id)->open() }}
                        <button type="submit">Eliminar</button>
                        {{ html()->closeModelForm() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>
                        No hay nada
                    </th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $posts->links() }}
</div>

