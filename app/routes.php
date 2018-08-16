<?php

$route[] = ['/' , 'HomeController@index'];
$route[] = ['/news' , 'NewsController@index'];
$route[] = ['/news/{id}' , 'NewsController@getNew'];

return $route;