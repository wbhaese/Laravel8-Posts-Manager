<h1>Detalhes do post {{ $post->title}}</h1>

<ul>
    <li><b>Title: </b> {{$post->title}}</li>
    <li><b>Content: </b> {{$post->content}}</li>
    <img src="{{url("storage/{$post->image}")}}" alt="{{$post->image}}" style="max-width: 100px">
</ul>

<form action="{{route('posts.destroy', $post->id)}}" method="post">
    
    {{-- //token do laravel --}}
    @csrf 
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar {{$post->title}}</button>
</form>