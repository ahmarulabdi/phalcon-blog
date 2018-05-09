<?php

class AdministratorController extends Phalcon\Mvc\Controller
{
	/**
        function initialize bawaan phalcon apabila ada maka dia adalah function pertama 
        yang akan dijalankan dalam controller ketika kita mengakses Action 
        di dalam controller tersebut
    */
    public function initialize(){
        if (empty($this->session->get('user'))) {
        	// jika session user belum ada
        	$this->flashSession->warning('anda belum login');
            $this->response->redirect('');
        }
        elseif ($this->session->get('user')->hak_akses != 'administrator') {
        	// jika session user memiliki hak_akses bukan administrator
        	$this->flashSession->warning('anda hanya memiliki akses sebagai blogger');
            $this->response->redirect('blogger/index');
        }
    }
    public function indexAction()
    {
    	
    }
    public function usersreadAction(){
        // hanya menampilkan data users, 
        // karena users hak_akses administrator tidak bisa dihapus
    	$this->view->users = Users::find(
            [
                'conditions' => 'hak_akses like "blogger"'
            ]
        );
    }
    public function userscreateAction(){
    	if ($this->request->isPost()) {
    		$nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    		$password_konfirmasi = $this->request->getPost('password_konfirmasi');
    		$hak_akses = $this->request->getPost('hak_akses');

    		$users = new Users();
    		$users->nama = $nama ;
    		$users->username = $username ;
    		$users->password = md5($password) ;
    		$users->hak_akses = $hak_akses;

    		if ($users->save() && $password == $password_konfirmasi ) {
    			$this->flashSession->success('Users baru berhasil dibuat');
    			$this->response->redirect('administrator/usersread');
    		}else{
				$this->flashSession->success('Users baru gagal dibuat');
				$this->response->redirect('administrator/userscreate');
    		}
    	}
    }
    public function userseditAction($id_users){
        
        if ($this->request->isPost()) {
            // jika POST
            $id_users = $this->request->getPost('id_users');
            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $password_lama = $this->request->getPost('password_lama');
            $password = $this->request->getPost('password');
            $password_konfirmasi = $this->request->getPost('password_konfirmasi');
            $hak_akses = $this->request->getPost('hak_akses');


            $users = Users::findFirstByIdUsers($id_users);
            

            if ($users->password == md5($password_lama)) {
                // apabila password lama betul
                $users->nama = $nama ;
                $users->username = $username ;
                $users->password = md5($password) ;
                $users->hak_akses = $hak_akses;

                if ($users->save()  && $password == $password_konfirmasi ) {
                    /**
                        apabila users berhasil disimpan dan input password sama dengan input password konfirmasi
                    */ 
                    $this->flashSession->success('Users berhasil diperbarui');
                    $this->response->redirect('administrator/usersread');
                }else{
                    $this->flashSession->success('Users gagal diperbarui');
                    $this->response->redirect('administrator/usersedit/'.$id_users);
                }
            }else{
                 // apabila password lama salah
                $this->flashSession->success('password lama salah');
                $this->response->redirect('administrator/usersedit/'.$id_users);
            }

            
        }

        // jika GET
        $this->view->user = Users::findFirstByIdUsers($id_users);


    }

    /**
        berbeda dengan penghapusan pada data posts yang menggunakan GET,  
        disini kita menggunakan method request POST ,sehingga lebih aman
    */
    public function usersdeleteAction(){
        if ($this->request->isPost()) {
            
            $id_users = $this->request->getPost('id_users');
            $users = Users::findFirstByIdUsers($id_users);

            if ($users->delete()) {
                $this->flashSession->success('Users baru berhasil dihapus');
                $this->response->redirect('administrator/usersread');
            }else{
                $this->flashSession->success('Users baru gagal dihapus');
                $this->response->redirect('administrator/usersread');
            }
        }
    }

}

