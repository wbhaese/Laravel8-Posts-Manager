{{-- @extends('admin.layouts.app') --}}

{{-- @section('title', 'Criar novo Post') --}}
<head>
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
</head>

<h1>Create new Post</h1>

{{-- @section('content') --}}

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @include('admin.posts._partials.form')
</form>

{{-- @endsection --}}