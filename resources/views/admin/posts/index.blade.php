<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>View Posts</title>

</head>
<body>
    
    <hr>

    @if(session('message'))
        <div>{{session('message')}}</div>

    @endif

    <form action="{{route('posts.search')}}" method="post">
        @csrf
        <input class="search-input" type="text" name="search" placeholder="Example: Post123...">
        <button type="submit" class="btn btn-success">Filter</button>
    </form>

    <h1>Post Index</h1>

    <div class="posts-view">
        @foreach ($posts as $post)
            <div class="single-post">
                <div class="top-info">
                    <div>
                        <img src="{{url("storage/{$post->image}")}}" alt="{{$post->image}}" style="max-width: 100px">
                    </div>
                    <div class="w-75 p-3 index-title">
                        <h3>Title:</h3>                    
                        <h2> {{$post->title}}</h2>
                    </div>
                </div>
                
                Description: <strong>{{$post->content}}</strong>
                <br/>
                <div class="details-div">
                   
                    
                    <div class='btn btn-primary'>
                        <a class="pages-link" href="{{route('posts.show', $post->id )}}">Details</a>
                    </div>
                    <div class='btn btn-warning'>
                        <a class="pages-link" href="{{route('posts.edit', $post->id )}}">Edit</a>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
    <div class="create-post">
        <button class="btn btn-primary" id="create-btn">
            <a class="pages-link" href="{{route('posts.create')}}">Create new Post</a>
        </button>
    </div>   

    <hr>

    @if(isset($filters))
        {{$posts->appends($filters)->links()}}
    @else
        {{$posts->links()}}
    @endif
</body>
</html>