<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Http\Requests\StoreArticleValidation;

class ArticleController extends Controller
{
    protected $articleRepo;

    public function __construct(ArticleRepositoryInterface $articleRepo) {
        $this->articleRepo = $articleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->articleRepo->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:10|max:100',
            'body' => 'required|max:1000',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        return $this->articleRepo->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'title' => 'required|min:10|max:100',
            'body' => 'required|max:1000',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        return $this->articleRepo->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->articleRepo->delete($id);
    }
}
