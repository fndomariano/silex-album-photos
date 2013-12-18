<?php

namespace AlbumPhotos\Controller;

use Silex\Application;
use AlbumPhotos\Controller\AppController;
use AlbumPhotos\Model\User;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AppController
{
	public function index()
	{	
		return $this->app['twig']->render('user/index.html');
	}

	public function add(Request $request)
	{

		$user = new User();
		
		$user->setName($request->request->get('name'));
		$user->setLogin($request->request->get('login'));
		$user->setPassword(md5($request->request->get('password')));
		$this->app['orm.em']->persist($user);
		$this->app['orm.em']->flush();

		$this->app['session']->getFlashBag()->add('success', 'Congratulations, you are now a member!');

		return $this->app->redirect('/'); 
	}
}