<?php


class NewsController {

    public function actionIndex(){
        return true;
    }

    public function actionView($category,$id){
        echo $category;
        echo '<br>';
        echo $id;
        return true;
    }

}