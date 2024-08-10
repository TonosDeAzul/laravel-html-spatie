<a href="{{ route('posts.index') }}">Volver al listado de posts</a>

<div>
  <h3>
    Etiquetas del post {{$post->title}}
  </h3>
</div>

<div>
  <table border="1">
    <thead>
        <th>ID</th>
        <th>Nombre tag</th>
    </thead>
    <tbody>
        @forelse ($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
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