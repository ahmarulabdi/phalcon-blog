<h4> 
	<?php $this->flashSession->Output() ?>
			Selamat datang <?= $this->session->get('user')->hak_akses  ?> 
			<strong>
				<?php 
					// menampilkan nama dari tabel user  yang sudah di daftar ke session 'auth'
					echo $this->session->get('user')->nama 
				?>
			</strong>
			 di Phalcon Blog
		</h4>