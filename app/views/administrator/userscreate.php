<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Tambah Users</h4>
		</div>
		<div class="panel-body">
			<?php $this->flashSession->Output() ?>
			<form method="post">
				<div class="form-group">
					<label for="">Nama</label>
					<input type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label for="">Password Konfirmasi</label>
					<input type="password" class="form-control" name="password_konfirmasi">
				</div>
				<div class="form-group">
					<label for="">Hak Akses</label>
					<select name="hak_akses" id="" class="form-control">
						<option value="blogger">Blogger</option>
						<option value="administrator">Administrator</option>
					</select>
				</div>
				<button class="btn btn-success">Tambah Users</button>
			</form>
		</div>
	</div>
</div>