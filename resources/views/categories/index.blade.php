<a href="{{ route('categories.create') }}">Create categories</a>

<div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>
                        {{ $category->id }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">Modificar</a>

                        {{ html()->modelForm($category)->route('categories.destroy', $category->id)->open() }}
                        <button type="submit">Eliminar</button>
                        {{ html()->closeModelForm() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>
                        No hay categorías
                    </th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- {{ $posts->links() }} --}}
</div>
