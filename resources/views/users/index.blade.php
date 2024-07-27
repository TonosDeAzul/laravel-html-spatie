<a href="{{ route('users.create') }}">Create user</a>

<div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Modificar</a>

                        {{ html()->modelForm($user)->route('users.destroy', $user->id)->open() }}
                            <button type="submit">Eliminar</button>
                        {{ html()->closeModelForm() }}

                        <a href="{{ route('users.post', $user->id) }}">Ver Posts</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
