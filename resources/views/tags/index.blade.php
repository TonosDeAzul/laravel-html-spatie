<a href="{{ route('tags.create') }}">Create tag</a>

<div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @forelse ($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->id }}
                    </td>
                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}">Modificar</a>

                        {{ html()->modelForm($tag)->route('tags.destroy', $tag->id)->open() }}
                        <button type="submit">Eliminar</button>
                        {{ html()->closeModelForm() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>
                        No hay tag
                    </th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $tags->links() }}
</div>
 