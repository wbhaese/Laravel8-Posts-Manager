<h1>Editar Post <strong>{{ $post->title}}</strong></h1>

<form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.posts._partials.form')
</form>