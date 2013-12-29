<?php

use AlbumPhotos\Controller\AlbumController;
use Symfony\Component\HttpFoundation\Request;

$album = new AlbumController($app);

$app->get('/album', function() use ($album) {
	return $album->index();
});

$app->get('/album/add', function() use ($album) {
	return $album->add();
});

$app->post('/album/add', function(Request $request) use ($album) {
	return $album->addAction($request);
});
