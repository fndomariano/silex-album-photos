<?php

use AlbumPhotos\Controller\LoginController;
use Symfony\Component\HttpFoundation\Request;

$login = new LoginController($app);

$app->post('/auth', function(Request $request) use ($login){
	return $login->auth($request);
});