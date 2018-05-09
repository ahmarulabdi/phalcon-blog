<?php

class SessionController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function loginprosesAction()
    {

        // sama dengan $_POST['username']
    	$username = $this->request->getPost('username');
        // sama dengan $_POST['password']
    	$password = $this->request->getPost('password');

    	// memanggil semua isi dalam tabel users
    	// Users::find();

    	// memanggiil row pertama tabel
        // Users::findFirst();
        
        /** 
            memanggil row  berdasarkan username yang diinputkan , 
            jika tidak ada username cocok maka akan pergi ke row pertama tabel
            Users::findFirst($username);
        */

    	//memanggil row pertama berdasarkan 'username' ByUsername 
    	$user = Users::findFirstByUsername($username);

    	// pengecekan row di database dan password apakah sama/tidak dengan inputan
    	if ($user && md5($password) == $user->password ) {
    		// jika berhasil

            /** 
                daftarkan session user dengan nama 'user'
                'php biasa' $_SESSION['user'] = $user;
            */
                // daftarkan session user dengan nama 'user' menggunakan cara Phalcon
                $this->session->set('user',$user);

            // mengirim pesan
    		$this->flashSession->success('login berhasil');
            // redirect halaman sama seperti header('Location:../.../'); pada php biasa
            if ($user->hak_akses == 'administrator') {
                // redirect untuk level administrator
                $this->response->redirect('administrator/index');
            }elseif ($user->hak_akses == 'blogger') {
                // redirect untuk level blogger
                $this->response->redirect('blogger/index');
            }
    		

    	}else{
    		// jika gagal
    		$this->flashSession->error('login gagal');
    		$this->response->redirect('index/index');
    	}



    }
    public function logoutAction(){
        // menghapus session dengan nama 'user'
        $this->session->remove('user');
        $this->flashSession->success('logout berhasil');
        $this->response->redirect('index/index');
    }

}

