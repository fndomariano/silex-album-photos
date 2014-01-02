<?php

use AlbumPhotos\Controller\PhotoController;
use Symfony\Component\HttpFoundation\Request;

$photo = new PhotoController($app);

$app->get('/album/{idAlbum}', function($idAlbum) use ($photo) {
	return $photo->index($idAlbum);
});

$app->get('/photo/add', function() use ($photo) {
	return $photo->add();
});

$app->post('/photo/add', function(Request $request) use ($photo) {
	return $photo->addAction($request);
});