<?php

namespace AlbumPhotos\Controller;

use Silex\Application;
use AlbumPhotos\Controller\AppController;
use AlbumPhotos\Model\Album;
use Symfony\Component\HttpFoundation\Request;

class AlbumController extends AppController
{
	public function index()
	{
		$albuns = $this->app['orm.em']->getRepository('AlbumPhotos\Model\Album')->findAll();


		return $this->app['twig']->render('album/index.html', array(
			'albuns' => $albuns
		));
	}

	public function add()
	{
		return $this->app['twig']->render('album/add.html');		 
	}

	public function addAction(Request $request)
	{
		$album = new Album();

		$upload = $request->files->get('cover_page');
		$path   = 'upload'; 

		//Criptografa o nome e adiciona a extensão na mesma
		$file_name = explode('.', $upload->getClientOriginalName());
		$file_name = md5($file_name[0]);
		$extension = $upload->getClientOriginalExtension();
		$file_name = $file_name . '.' . $extension;
		
		$upload->move($path, $file_name);

		$album->setName( $request->get('name') );
		$album->setUserId( $this->app['session']->get('user')['id'] );

		if($request->get('description')){
			$album->setDescription( $request->get('description') );
		}

		$album->setCoverPage( $file_name );

		$this->app['orm.em']->persist($album);
		$this->app['orm.em']->flush();

		$this->app['session']->getFlashBag()->add('success', 'Album created successfully');

		return $this->app->redirect('/album'); 
	}
}