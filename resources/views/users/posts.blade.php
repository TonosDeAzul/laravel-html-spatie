<a href="{{ route('users.index') }}">Volver</a>

<div>

    {{-- {{ $user->posts }} --}}
    {{-- {{ $userPosts }} --}}

    <div>
        {{ $user->name }}
    </div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Cuerpo</th>
        </thead>
        <tbody>
            @forelse ($user->posts as $post)
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
                    {{-- <td>
                        {{ $userData->user->name }}
                    </td> --}}
                    {{-- <td>
                        <a href="{{ route('posts.edit', $post->id) }}">Modificar</a>

                        {{ html()->modelForm($post)->route('posts.destroy', $post->id)->open() }}
                        <button type="submit">Eliminar</button>
                        {{ html()->closeModelForm() }}
                    </td> --}}
                </tr>
            @empty
                <tr>
                    <th>
                        El usuario no tiene post asociados
                    </th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- {{ $posts->links() }} --}}
</div>