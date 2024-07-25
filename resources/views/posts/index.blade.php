<a href="{{ route('posts.create') }}">Create post</a>

<div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Cuerpo</th>
            <th>Autor</th>
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


</div>