<div class="panel panel-info">
	<div class="panel-heading">
		<h4>Edit Postingan</h4>
	</div>
	<div class="panel-body">
		<?php $this->flashSession->Output() ?>
		<form method="post" enctype="multipart/form-data" >
			<input type="hidden" name="id_posts" value="<?= $post->id_posts ?>">
			<div class="form-group">
				<label>Title</label>
				<input class="form-control" type="text" name="title" value="<?= $post->title ?>">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control">
					<?= $post->description ?>
				</textarea>
			</div>
			<div class="form-group">
				<label>Upload Foto Baru</label>
				<input type="file" name="file" >	 
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<select name="kategori" class="form-control">
					<option <?= $post->kategori == 'gaya hidup' ? 'selected' : '' ?> value="gaya hidup">Gaya Hidup</option>
					<option <?= $post->kategori == 'kesehatan' ? 'selected' : '' ?> value="kesehatan">Kesehatan</option>
					<option <?= $post->kategori == 'olahraga' ? 'selected' : '' ?> value="olahraga">Olahraga</option>
					<option <?= $post->kategori == 'teknologi' ? 'selected' : '' ?> value="teknologi">Teknologi</option>
					<option <?= $post->kategori == 'pendidikan' ? 'selected' : '' ?> value="pendidikan">Pendidikan</option>
				</select>
			</div>
			<div class="btn-group">
				<button class="btn btn-success" type="submit" >Tambah</button>
				<button class="btn btn-danger" type="reset" >Reset</button>
			</div>
		</form>
	</div>
</div>
