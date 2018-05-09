<div class="panel panel-default">
	<div class="panel-heading">
		
		<h4>
			Data Postingan 
			<strong>
				<?php 
					// menampilkan nama dari tabel user  yang sudah di daftar ke session 'auth'
					echo $this->session->get('user')->nama 
				?>
			</strong>
		</h4>
	</div>
	<div class="panel-body">
		<?php $this->flashSession->Output() ?>		
		<a href="<?= $this->url->get('blogger/postscreate') ?>" class="btn btn-info"> Tambah Postingan</a>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id Posts</th>
					<th>Title</th>
					<th>Description</th>
					<th>File</th>
					<th>kategori</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $posts as $post ) :?>
					<tr>
						<td><?= $post->id_posts ?></td>
						<td><?= $post->title ?></td>
						<td><?= $post->description ?></td>
						<td>
							<img src="<?= $this->url->getStatic('img/'.$post->file ) ?>" width="200px">
						 </td>
						<td><?= $post->kategori ?></td>
						<td>
							<!-- 
								url dengan format url:controller/action/parameter
								example : 'blogger/postsedit/$post->id_posts' 
								dimana '$post->id_posts' adalah variable yang menyimpan id_post 
								dari salah satu data di tabel posts.
						        
						     -->
							<a class="btn btn-primary" href="<?= $this->url->get('blogger/postsedit/'.$post->id_posts) ?>">
								<i class="glyphicon glyphicon-edit"></i>
							</a>
							<a class="btn btn-danger" href="<?= $this->url->get('blogger/postsdelete/'.$post->id_posts) ?>">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>