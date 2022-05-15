<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nauka;
use File;

class IndexController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function menu()
    {

        $rubrics1 = Nauka::all('rubrics')->groupBy('rubrics');

        $rubrics2 = [];
        $i = 0;

        foreach ($rubrics1 as $rubric) {
            $rubrics2 = array_merge($rubrics2, ["$i" => $rubric[0]['rubrics']]);
            $i++;
        }

        return $rubrics2;
    }

    public function index()
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        $name = "menu";
        $rubrics2 = $this->$name();

        $articles = Nauka::all('id', 'title', 'content', 'image');

        foreach ($articles as $article) {
            $article->content = stristr($article->content, '.', true) . '.';
        }

        $user = Auth::user();

        return view('index')->with(['articles' => $articles, 'rubrics' => $rubrics2, 'user' => $user]);
    }

    public function rubrika($id)
    {

        $rubrics1 = Nauka::all('rubrics')->groupBy('rubrics');

        $rubrics2 = [];
        $i = 0;

        $rubric_now = "";

        foreach ($rubrics1 as $rubric) {
            $rubrics2 = array_merge($rubrics2, ["$i" => $rubric[0]['rubrics']]);
            $i++;
            if ($id == $i - 1) {
                $rubric_now = $rubric[0]['rubrics'];
            }
        }

        $articles = Nauka::all('id', 'title', 'content', 'image', 'rubrics')->where('rubrics', $rubric_now);

        foreach ($articles as $article) {
            $article->content = stristr($article->content, '.', true) . '.';
        }

        $user = Auth::user();

        return view('rubrika')->with(['articles' => $articles, 'rubrics' => $rubrics2, 'rubric_now' => $rubric_now,'user'=>$user]);
    }

    public function statya($id)
    {
        $name = "menu";
        $rubrics2 = $this->$name();

        $article = Nauka::all()->find($id);

        $user = Auth::user();

        return view('statya')->with(['article' => $article, 'rubrics' => $rubrics2,'user'=>$user]);
    }

    public function delete_article(Nauka $article)
    {

        $article->delete();

        return redirect('/main');
    }

    public function add_article()
    {
        if(!Auth::user()->is_admin){
            return redirect('/main');
        }

        $name = "menu";
        $rubrics2 = $this->$name();

        $scan = File::files(public_path() . '/images');
        foreach ($scan as $key => $file) {
            if ($file->getExtension() == 'jpg' || $file->getExtension() == 'png') {
                continue;
            } else {
                unset($scan[$key]);
            }
        }

        return view('add')->with(['rubrics' => $rubrics2, 'avatars' => $scan]);
    }

    public function add_article_post(Request $request)
    {
        if(!Auth::user()->is_admin){
            return redirect('/main');
        }

        $this->validate($request,
            ['title' => 'required',
                'lid' => 'required',
                'content' => 'required',
                'rubrics' => 'required',
                'image' => 'required']);

        $data = $request->all();
        Nauka::create($data);

        return redirect()->route('ArticleAdd');
    }
}
