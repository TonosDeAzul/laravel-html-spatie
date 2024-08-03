<div>
    {{ html()->label('title') }}
    {{ html()->text('title')->placeholder('Escriba el titulo') }}
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('body') }}
    {{ html()->textarea('body')->placeholder('Escriba el contenido') }}
    @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('user_id') }}
    {{ html()->select('user_id', $users)->placeholder('Seleccione') }}
    @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    {{ html()->label('category_id') }}
    {{ html()->select('category_id', $categories)->placeholder('Seleccione') }}
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    @foreach ($tags as $tag)
        {{ html()->checkbox('tag_id[]', null, $tag->id)->id('tag_' . $tag->id) }}
        {{ html()->label($tag->name, 'tag_' . $tag->id) }}
        @error('tag_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endforeach
</div>
