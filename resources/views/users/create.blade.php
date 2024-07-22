<form action="{{ route('users.store') }}" method="POST">
    @include('users.partials.form')
    <button>Subir</button>
</form>