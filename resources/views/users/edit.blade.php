{{ html()->modelForm($user)->route('users.update', $user->id)->open() }}
    @include('users.partials.form')
    <button type="submit">Actualizar</button>
    {{-- <div>
        {{ $user }}
    </div> --}}
{{ html()->closeModelForm() }}