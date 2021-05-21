<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    protected $articleRepo;

    public function __construct(ArticleRepositoryInterface $articleRepo) {
        $this->articleRepo = $articleRepo;
    }

    public function index() {
        $article = $this->articleRepo->getAll();

        return view('home.articles', ['articles'] => $articles);
    }

    public function show($id) {
        return Article::find($id);
    }

    public function store(Request $request) {
        $data = $request->all();

        $article = $this->articleRepo->create($data);
        return view('home.articles');
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $article =$this->articleRepo->update($id, $data);

        return view('home.articles');
    }

    public function delete($id) {
        $this->articleRepo->delete($id);

        return view('home.articles');
    }
}
