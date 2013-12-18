<?php

use AlbumPhotos\Controller\UserController;
use Symfony\Component\HttpFoundation\Request;

$user = new UserController($app);

$app->get('/', function() use ($user) {
	return $user->index();
});

$app->post('user/add', function(Request $request) use ($user){
	return $user->add($request);
});