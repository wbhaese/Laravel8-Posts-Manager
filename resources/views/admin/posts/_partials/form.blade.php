@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif

@csrf
<input type="file" name="image" id="image">
<input type="text" name="title" placeholder="Título" value="{{$post->title ?? old('title')}}">
<textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{$post->content ?? old('content')}}</textarea>
<button type="submit">Enviar</button>