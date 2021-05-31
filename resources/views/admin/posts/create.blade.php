{{-- @extends('admin.layouts.app') --}}

{{-- @section('title', 'Criar novo Post') --}}

<h1>Cadastrar Novo Post</h1>

{{-- @section('content') --}}

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @include('admin.posts._partials.form')
</form>

{{-- @endsection --}}