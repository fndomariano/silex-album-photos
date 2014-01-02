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

		$album->setName( $request->get('name') );
		$album->setUserId( $this->app['session']->get('user')['id'] );

		if($request->get('description')){
			$album->setDescription( $request->get('description') );
		}
 		
 		$filename = $this->upload($request->files->get('cover_page'));
		$album->setCoverPage( $filename );

		$this->app['orm.em']->persist($album);
		$this->app['orm.em']->flush();

		$this->app['session']->getFlashBag()->add('success', 'Album created successfully');

		return $this->app->redirect('/album'); 
	}

	public function edit($id)
	{
		$album = $this->app['orm.em']->getRepository('AlbumPhotos\Model\Album')->find($id);

		return $this->app['twig']->render('album/edit.html', array(
			'album' => $album
		));
	}

	public function editAction(Request $request)
	{
		$id = $request->get('id');
		$album = $this->app['orm.em']->getRepository('AlbumPhotos\Model\Album')->find($id);

		$album->setName( $request->get('name') );

		if($request->get('description'))
		{
			$album->setDescription( $request->get('description') );
		}

		if ($request->files->get('coverpage'))
		{
			$filename = $this->upload($request->files->get('coverpage'));
			$album->setCoverPage( $filename );
		}

		$this->app['orm.em']->persist($album);
		$this->app['orm.em']->flush();

		$this->app['session']->getFlashBag()->add('success', 'Album updated successfully');

		return $this->app->redirect('/album');
	}

	public function deleteAction($id)
	{
		$album = $this->app['orm.em']->getRepository('AlbumPhotos\Model\Album')->find($id);

		$this->app['orm.em']->remove($album);
		$this->app['orm.em']->flush();

		$this->app['session']->getFlashBag()->add('success', 'Album deleted successfully');

		return $this->app->redirect('/album');

	}

	private function upload($upload)
	{
		$path   = 'upload'; 

		//Criptografa o nome e adiciona a extensão na mesma
		$file_name = explode('.', $upload->getClientOriginalName());
		$file_name = md5($file_name[0]);
		$extension = $upload->getClientOriginalExtension();
		$file_name = $file_name . '.' . $extension;
		
		$upload->move($path, $file_name);

		return $file_name;
	}
}