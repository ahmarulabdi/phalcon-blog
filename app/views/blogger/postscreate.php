<div class="panel panel-success">
	<div class="panel-heading">
		<h4>Form Tambah Postingan</h4>
	</div>
	<div class="panel-body">
		<?php $this->flashSession->Output() ?>
		<form method="post" enctype="multipart/form-data" >
			
			<div class="form-group">
				<label>Title</label>
				<input class="form-control" type="text" name="title" placeholder="Title Untuk Postingan">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Upload Foto</label>
				<input type="file" name="file" >	 
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<select name="kategori" class="form-control">
					<option value="gaya hidup">Gaya Hidup</option>
					<option value="kesehatan">Kesehatan</option>
					<option value="olahraga">Olahraga</option>
					<option value="teknologi">Teknologi</option>
					<option value="pendidikan">Pendidikan</option>
				</select>
			</div>
			<div class="btn-group">
				<button class="btn btn-success" type="submit" >Tambah</button>
				<button class="btn btn-danger" type="reset" >Reset</button>
			</div>
		</form>
	</div>

</div>