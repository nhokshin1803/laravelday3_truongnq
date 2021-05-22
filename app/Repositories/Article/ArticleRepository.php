<?php
namespace App\Repositories\Article;

use App\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Article::class;
    }

    public function getArticle()
    {
        return $this->model->select('article_name')->take(1)->get();
    }
}