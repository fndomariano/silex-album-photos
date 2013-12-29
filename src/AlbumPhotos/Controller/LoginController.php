<?php

namespace AlbumPhotos\Controller;

use Silex\Application;
use AlbumPhotos\Controller\AppController;
use AlbumPhotos\Model\User;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends AppController
{
	public function auth(Request $request)
	{
		$auth = array(
			'login' =>  $request->request->get('login'),
			'password' => md5($request->request->get('password'))
		);

		$user = $this->app['orm.em']->getRepository('AlbumPhotos\Model\User')->findBy($auth);
		
		if(!empty($user))
		{
			$data = array(
				'id' => $user[0]->getId(),
				'name' => $user[0]->getName()
			);

			$this->app['session']->set('user', $data);
			$this->app['session']->set('logged', true);

			return $this->app->redirect('/album');
		}
		else
		{
			$this->app['session']->getFlashBag()->add('error', 'User or password incorrect');

			return $this->app->redirect('/');
		}

	}
}