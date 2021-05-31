<h1>Detalhes do post {{ $post->title}}</h1>

<ul>
    <li><b>Title: </b> {{$post->title}}</li>
    <li><b>Content: </b> {{$post->content}}</li>
</ul>

<form action="{{route('posts.destroy', $post->id)}}" method="post">
    
    @csrf//token do laravel
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar {{$post->title}}</button>
</form>