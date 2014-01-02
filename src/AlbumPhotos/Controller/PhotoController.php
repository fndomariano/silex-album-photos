<?php

namespace AlbumPhotos\Controller;

use Silex\Application;
use AlbumPhotos\Controller\AppController;
use AlbumPhotos\Model\Photo;
use Symfony\Component\HttpFoundation\Request;


class PhotoController extends AppController
{
	public function index($idAlbum)
	{	
		$album = $this->app['session']->set('idAlbum', $idAlbum);

		$qb = $this->app['orm.em']->createQueryBuilder();
		$qb->select('p')
		   ->from('AlbumPhotos\Model\Photo', 'p')
		   ->where('p.albumid = :album')
		   ->setParameters(array('album' => $idAlbum));
		
		$query = $qb->getQuery();
		$photos = $query->getResult();

		return $this->app['twig']->render('photo/index.html', array(
			'photos' => $photos,
		));
	}

	public function add()
	{
		return $this->app['twig']->render('photo/add.html', array(
			'idAlbum' => $this->app['session']->get('idAlbum')
		));
	}

	public function addAction(Request $request)
	{
		$photo = new Photo();

		$photo->setTitle($request->get('title'));

		if ($request->get('legend')) 
		{
			$photo->setLegend($request->get('legend'));
		}

		$filename = $this->upload($request->files->get('photo'));

		$photo->setPhoto( $filename );
		$photo->setAlbumId( $request->get('idAlbum') );

		$this->app['orm.em']->persist($photo);
		$this->app['orm.em']->flush();

		return $this->app->redirect('/album/' . $request->get('idAlbum'));
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