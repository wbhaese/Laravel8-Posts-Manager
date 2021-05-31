<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button>
        <a href="{{route('posts.create')}}">Criar novo post</a>
    </button>
    <hr>

    @if(session('message'))
        <div>{{session('message')}}</div>

    @endif

    <form action="{{route('posts.search')}}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtar:">
        <button type="submit">Filtrar</button>
    </form>

    <h1>Index de post</h1>

    @foreach ($posts as $post)
        <img src="{{url("storage/{$post->image}")}}" alt="{{$post->image}}" style="max-width: 100px">
        Title: 
        <h2>{{$post->title}} 
            <a href="{{route('posts.show', $post->id )}}">Ver detalhes</a>
            <a href="{{route('posts.edit', $post->id )}}">Editar</a>
        </h2>
        <br/>
            Description: <strong>{{$post->content}}</strong>
        <br/>
    @endforeach

    <hr>

    @if(isset($filters))
        {{$posts->appends($filters)->links()}}
    @else
        {{$posts->links()}}
    @endif
</body>
</html>