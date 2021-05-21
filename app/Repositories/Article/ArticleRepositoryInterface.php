<?php
namespace App\Repositories\Article;

use App\Repositories\RepositoryInterface;

interface ArticleRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getArticle();
}