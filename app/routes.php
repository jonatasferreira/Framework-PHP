<?php

$route[] = ['/' , 'HomeController@index'];
$route[] = ['/posts' , 'PostsController@index'];
$route[] = ['/posts/{id}/show' , 'PostsController@show'];
$route[] = ['/posts/{id}/show/{key}' , 'PostsController@showdois'];

return $route;