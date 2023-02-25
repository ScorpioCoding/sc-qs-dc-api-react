<?php

return (object) array(



  // API COMMON - REMEMBER TABLE IS CASE-SENSITIVE
  '/api/read/{table}/{id:\d+}'   => ['lang' => 'en', 'module' => 'Api', 'namespace' => 'App\Controllers\Api', 'controller' => 'Common', 'action' => 'readById'],

  '/api/readall/{table}'   => ['lang' => 'en', 'module' => 'Api', 'namespace' => 'App\Controllers\Api', 'controller' => 'Common', 'action' => 'readAll'],

  '/api/delete/{table}/{id:\d+}'   => ['lang' => 'en', 'module' => 'Api', 'namespace' => 'App\Controllers\Api', 'controller' => 'Common', 'action' => 'deleteById'],


  // API USER
  '/api/user/create/'   => ['lang' => 'en', 'module' => 'User', 'namespace' => 'App\Controllers\User', 'controller' => 'User', 'action' => 'create'],

  '/api/user/update/{id:\d+}'   => ['lang' => 'en', 'module' => 'User', 'namespace' => 'App\Controllers\User', 'controller' => 'User', 'action' => 'update'],


);
