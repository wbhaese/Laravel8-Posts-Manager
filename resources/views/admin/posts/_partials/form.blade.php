@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif

@csrf
<div class="create-post">
    <input type="text" name="title" placeholder="Title" value="{{$post->title ?? old('title')}}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Content">{{$post->content ?? old('content')}}</textarea>
    <input type="file" name="image" id="image">
    
    <button type="submit">Send</button>
</div>
