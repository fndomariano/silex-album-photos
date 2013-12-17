<?php

namespace AlbumPhotos\Controller;

use Silex\Application;
use AlbumPhotos\Controller\AppController;


class UserController extends AppController
{
	public function index()
	{
		return $this->app['twig']->render('user/index.html');
	}
}