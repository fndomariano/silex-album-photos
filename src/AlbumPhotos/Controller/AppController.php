<?php

namespace AlbumPhotos\Controller;

use Silex\Application;

class AppController
{
	protected $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}
}