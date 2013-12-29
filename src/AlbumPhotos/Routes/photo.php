<?php

use AlbumPhotos\Controller\PhotoController;
use Symfony\Component\HttpFoundation\Request;

$photo = new PhotoController($app);

$app->get('/album/{id}', function($id) use ($photo) {
	return $photo->index();
});
