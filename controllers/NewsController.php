<?php
include_once ROOT.'/models/News.php';


class NewsController {

    public function actionIndex(){

        $newsList = News::getNewsList();
        print_r($newsList);
        return true;
    }

    public function actionView($category,$id){
        $news = News::getNewsItemById($id);
        print_r($news);
        return true;
    }

}