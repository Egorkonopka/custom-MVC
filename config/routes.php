<?php
/**
 * массив, который содержит строки запросов
 * а значение массива - это
 * контроллер и мотод обработки этого запроса
 */
return [
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news' => 'news/index',
    'products' => 'product/list',
];