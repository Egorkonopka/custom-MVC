<?php

class News
{
    /**
     * returns single news item
     * @param integer $id
     */
    public static function getNewsItemById($id)
    {
        $id = (int) $id;

        if($id) {
            $db = Db::getConnection();
            $result = $db->query('select * from news where id ='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();
            return $newsItem;
        }
    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList()
    {
        $db = Db::getConnection();
        $result = $db->query('select * from news');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()){
            $newsItem[$i]['id'] = $row['id'];
            $newsItem[$i]['title'] = $row['title'];
            $newsItem[$i]['text'] = $row['text'];
            $newsItem[$i]['image'] = $row['image'];
            $i++;
        }
        return $newsItem;
    }


}