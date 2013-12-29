<?php

namespace AlbumPhotos\Controller;

use Silex\Application;
use AlbumPhotos\Controller\AppController;
use AlbumPhotos\Model\Photo;
use Symfony\Component\HttpFoundation\Request;


class PhotoController extends AppController
{
	public function index()
	{
		$photos = $this->app['orm.em']->getRepository('AlbumPhotos\Model\Photo')->findAll();

		return $this->app['twig']->render('photo/index.html', array(
			'photos' => $photos
		));
	}

	public function add()
	{
		
	}
}