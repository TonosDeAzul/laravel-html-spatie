<form action=" {{ route('users.update', $user->id) }} " method="POST">
    @include('users.partials.form')
    <button type="submit">Actualizar</button>
    <div>
        {{ $user }}
    </div>
</form>