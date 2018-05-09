<?php

class BloggerController extends Phalcon\Mvc\Controller
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
        elseif ($this->session->get('user')->hak_akses != 'blogger') {
            // jika session user memiliki hak_akses bukan blogger
            $this->flashSession->warning('anda hanya memiliki akses sebagai administrator');
            $this->response->redirect('administrator/index');
        }
        
    }
    public function indexAction(){
        
    }
    public function postsreadAction(){


    	$this->view->posts = Posts::find(
            [
                 'conditions' =>  'id_users like '.$this->session->get('user')->id_users
            ]
        );
        /**
            conditions diatas menggunakan array asosiatif digunakan untuk
            mem-filter agar user yang terdaftar di session user 
            hanya bisa mengakses data posts yang memiliki 'id_users' 
            yang sama dengan 'id_users' dari user yang terdaftar di session

            example PHP biasa : 
            'SELECT *FROM TABLE users WHERE id_users LIKE '.$_SESSION['user']->id_users;
        */
    }
    public function postscreateAction(){
      	if ($this->request->isPost()) {
        		// jika method request post
      			$title = $this->request->getPost('title');
      			$description = $this->request->getPost('description');
      			$kategori = $this->request->getPost('kategori');
            

            $file = $this->request->getUploadedFiles()[0];
            // nama file format : waktu sekarang + nama file asli
            $namafilebaru = date('h-i-s_d-m-Y_').$file->getName();
            // alamat penyimpanan file
            $alamat = '../public/img/'.$namafilebaru; //berada di phalcon-blog/public/img/
            // proses simpan ke alamat
            $proses_simpan = $file->moveTo($alamat);
            
            if ($proses_simpan == true ) {
                // jika proses simpan file berhasil
                
                // buat model posts baru
                $posts = new Posts();
                // kirim data ke model posts
                // mengambil data id_users dari session users : $this->session->get('user')->id_users
                $posts->id_users = $this->session->get('user')->id_users ;
                $posts->title = $title;
                $posts->description = $description;
                $posts->file  = $namafilebaru;
                $posts->kategori =  $kategori;

                // proses menyimpan ke tabel posts dengan model posts : $posts->save()
                if ($posts->save()) {
                    // jika model posts berhasil menyimpan data ke tabel posts
                    $this->flashSession->success('penambahan postingan berhasil');
                    $this->response->redirect('blogger/postsread');    
                }else {
                    // jika model posts gagal menyimpan data ke tabel posts
                    $this->flashSession->success('penambahan postingan gagal');
                    $this->response->redirect('blogger/postscreate');
                }
                
                
                
            }else{
                // jika proses simpan file gagal
                $this->flashSession->success('penyimpanan file gagal');
                $this->response->redirect('blogger/create');
            }
    			

      	}


    	// jika method request get


    } 
    /** 
        function postseditAction memiliki 'parameter' $id_posts 
        yang dikirim dari url dengan format url:controller/action/parameter
        example : blogger/postsedit/$post->id_posts
    */
    public function postseditAction($id_posts){



        if ($this->request->isPost()) {

            // jika method request $_POST
            $id_posts = $this->request->getPost('id_posts');
            $title = $this->request->getPost('title');
            $description = $this->request->getPost('description');
            $kategori = $this->request->getPost('kategori');
            

            $file = $this->request->getUploadedFiles()[0];
            // nama file format : waktu sekarang + nama file asli
            $namafilebaru = date('h-i-s_d-m-Y_').$file->getName();
            // alamat penyimpanan file
            $alamat = '../public/img/'.$namafilebaru;
            // proses simpan ke alamat
            $proses_simpan = $file->moveTo($alamat);
            
            if ($proses_simpan == true ) {
                // jika proses simpan file berhasil
                
                // panggil data di tabel posts yang sesuai dengan id_posts inputan
                $posts = Posts::findFirstByIdPosts($id_posts);
                // kirim data ke model posts
                // mengambil data id_users dari session users : $this->session->get('user')->id_users
                $posts->id_users = $this->session->get('user')->id_users ;
                $posts->title = $title;
                $posts->description = $description;
                $posts->file  = $namafilebaru;
                $posts->kategori =  $kategori;

                // proses menyimpan ke tabel posts dengan model posts : $posts->save()
                if ($posts->save()) {
                    // jika model posts berhasil menyimpan data ke tabel posts
                    $this->flashSession->success('penambahan postingan berhasil');
                    $this->response->redirect('blogger/postsread');    
                }else {
                    // jika model posts gagal menyimpan data ke tabel posts
                    $this->flashSession->success('penambahan postingan gagal');
                    $this->response->redirect('blogger/postsedit');
                }
                
                
                
            }else{
                // jika proses simpan file gagal
                $this->flashSession->success('penyimpanan file gagal');
                $this->response->redirect('blogger/postsedit');
            }
                

        }

        // jika method request $_GET
        $this->view->post =  Posts::findFirstByIdPosts($id_posts);
    }
    public function postsdeleteAction($id_posts){
        // panggil data di tabel posts yang sesuai dengan id_posts dari parameter
        $posts = Posts::findFirstByIdPosts($id_posts);
        // delete
        if($posts->delete()){
            $this->flashSession->success('penghapusan postingan berhasil');
            $this->response->redirect('blogger/postsread');
        }else{
            $this->flashSession->success('penghapusan postingan gagal');
            $this->response->redirect('blogger/postsread');
        }


        /** 
            catatan : 
            1. tidak dianjurkan menghapus data dengan metode request GET
            2. gunakan pertanyaan konfirmasi sebelum delete data ex:'Apakah anda yakin ingin menghapus data berikut
        */

        
    }

}

