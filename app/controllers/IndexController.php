<?php

class IndexController extends Phalcon\Mvc\Controller
{	
	public function initialize(){
		if (!empty($this->session->get('user'))) {
        	// jika session user sudah ada
        	$this->flashSession->warning('anda sudah login');
        	$hak_akses = $this->session->get('user')->hak_akses;

        	if ($hak_akses == 'administrator') {
        		$this->response->redirect('administrator/index');
        	}elseif($hak_akses == 'blogger'){
        		$this->response->redirect('blogger/index');
        	}
            
        }
	}

    public function indexAction()
    {
        
        $i  = 0;
        $posts = Posts::find();


        // membuat array baru
        $timelines = [];
        foreach ($posts as $post) {
            $timeline['id'] = $post->id_posts;
            $timeline['title'] = $post->title;
            $timeline['description'] = $post->description;
            $timeline['kategori'] = $post->kategori;
            $timeline['file'] = $post->file;
            $timeline['author'] = Users::findFirstByIdUsers($post->id_users)->nama;
            
            array_push($timelines,$timeline);
            $i+= 1;
        }

        // mengirim array ke views
        $this->view->timelines = $timelines;
    }
    public function registerAction(){
    	if ($this->request->isPost()) {
    		// jika GET
    		$nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    		$password_konfirmasi = $this->request->getPost('password_konfirmasi');
    		$hak_akses = $this->request->getPost('hak_akses');

    		$users = new Users();
    		$users->nama = $nama ;
    		$users->username = $username ;
    		$users->password = md5($password) ;
    		$users->hak_akses = 'blogger';

    		if ($users->save() && $password == $password_konfirmasi ) {
    			$this->flashSession->success('Registrasi berhasil');
    			$this->response->redirect('index/index');
    		}else{
				$this->flashSession->danger('Registrasi gagal');
				$this->response->redirect('index/register');
    		}
    	}


    	// jika POST
    }
}

