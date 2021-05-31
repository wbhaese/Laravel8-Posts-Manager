<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
    <title>View Posts</title>

</head>
<body>
    <button>
        <a href="{{route('posts.create')}}">Create new Post</a>
    </button>
    <hr>

    @if(session('message'))
        <div>{{session('message')}}</div>

    @endif

    <form action="{{route('posts.search')}}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Example: Post123...">
        <button type="submit">Filter</button>
    </form>

    <h1>Post Index</h1>

    <div class="posts-view">
        @foreach ($posts as $post)
            <div class="single-post">
                <img src="{{url("storage/{$post->image}")}}" alt="{{$post->image}}" style="max-width: 100px">
                Title: 
                <h2>{{$post->title}}</h2>
                    Description: <strong>{{$post->content}}</strong>
                <br/>
                <div class="details-div">
                    <a href="{{route('posts.show', $post->id )}}">Details</a>
                    <a href="{{route('posts.edit', $post->id )}}">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    @if(isset($filters))
        {{$posts->appends($filters)->links()}}
    @else
        {{$posts->links()}}
    @endif
</body>
</html>