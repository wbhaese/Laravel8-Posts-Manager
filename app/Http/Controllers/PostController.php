<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        //paginate() retorna apenas uma quantidade the registros
        //A página pode ser indicada pelo parâmetro ?page=2 etc
        //na view basta inserir este código:
        //{{$posts->links()}}

        //é possível passar parâmetros na pesquisa:
        // $posts = Post::orderBy('id', 'DESC')->paginate();
        
        // ou exibir dos mais antigos para mais novos

        // $posts = Post::latest()->paginate(1);
        //

        $posts = Post::latest()->paginate(3);
        return view('admin.posts.index',[
            'posts' => $posts,
        ]);
        // return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(StoreUpdateRequest $request){

        $data = $request->all();

        if($request->image->isValid()){
            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();  

            $image = $request->image->storeAs('posts', $nameFile);
            
            $data['image'] = $image;
        }

        Post::create($data);

        // ou
        // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);
        // dd($posts);
        // var_dump($posts);die;

        return redirect()
            ->route('posts.index')
            ->with('message', "Post atualizado com sucesso");
    }

    public function show($id){
        // Post::where('id', $id)->get(); // get() retornaria todas as colunas, precisamos apenas do post
        //$postFirst = Post::where('id', $id)->first(); // traz apenas o primeiro resultado
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        
        return view('admin.posts.show', compact('post'));
        // return view('admin.posts.create');
    }

    public function destroy($id){
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }

        $post->delete();
        
        return redirect()
            ->route('posts.index')
            ->with('message', "Post deletado com sucesso");
    }

    public function edit($id){
        // Post::where('id', $id)->get(); // get() retornaria todas as colunas, precisamos apenas do post
        //$postFirst = Post::where('id', $id)->first(); // traz apenas o primeiro resultado
        if(!$post = Post::find($id)){
            //possibilidade abaixo ou
            // return redirect()->route('posts.index');
            
            return redirect()->back();
        }
        
        return view('admin.posts.edit', compact('post'));
        // return view('admin.posts.create');
    }

    public function update(StoreUpdateRequest $request, $id){
        // Post::where('id', $id)->get(); // get() retornaria todas as colunas, precisamos apenas do post
        //$postFirst = Post::where('id', $id)->first(); // traz apenas o primeiro resultado
        if(!$post = Post::find($id)){
            //possibilidade abaixo ou
            // return redirect()->route('posts.index');
            
            return redirect()->back();
        }
        
        $post->update($request->all());   
        
        return redirect()
            ->route('posts.index')
            ->with('message', "Post atualizado com sucesso");
        // return view('admin.posts.edit', compact('post'));
        // return view('admin.posts.create');
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        //ao invés do 'LIKE', também poderia ser o '=', 
        //mas a ausência do mesmo já indica que o filtro deve ser igual

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate(1);//Se não fosse o paginate, precisaria do get

                        //para ver o resultado da query, podemos usar no lugar de paginate
                        //a função ->toSql() e a query será passada, neste caso para a variável.

        return view("admin.posts.index", compact('posts', 'filters'));
    }
    
}
