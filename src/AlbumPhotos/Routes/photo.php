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

$app->get('/photo/edit/{id}', function($id) use ($photo) {
	return $photo->edit($id);
});

$app->post('/photo/edit', function(Request $request) use ($photo) {
	return $photo->editAction($request);
});

$app->get('/photo/delete/{id}', function($id) use ($photo) {
	return $photo->deleteAction($id);
});