<?php

use AlbumPhotos\Controller\UserController;

$user = new UserController( $app );

$app->get('/', function() use ($user) {
	return $user->index();
});