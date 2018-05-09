<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Edit Users</h4>
		</div>
		<div class="panel-body">
			<?php $this->flashSession->Output() ?>
			<form method="post">
				<input type="hidden" name="id_users" value="<?= $user->id_users ?>">
				<div class="form-group">
					<label for="">Nama</label>
					<input type="text" class="form-control" name="nama" value="<?= $user->nama ?>">
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" name="username" value="<?= $user->username ?>">
				</div>
				<hr>
				<div class="form-group">
					<label>Password Lama</label>
					<br>
					<label for="">Password</label>
					<input type="password" class="form-control" name="password_lama" >
				</div>
				<hr>
				<div class="form-group">
					<label>Password Baru</label>
					<br>
					<label for="">Password</label>
					<input type="password" class="form-control" name="password" >
				</div>
				<div class="form-group">
					<label for="">Password Konfirmasi</label>
					<input type="password" class="form-control" name="password_konfirmasi" >
				</div>
				<div class="form-group">
					<label for="">Hak Akses</label>
					<select name="hak_akses" id="" class="form-control">
						<option <?= $user->hak_akses == 'blogger' ? 'selected' : ''  ?> value="blogger">Blogger</option>
						<option <?= $user->hak_akses == 'administrator' ? 'selected' : ''  ?> value="administrator">Administrator</option>
					</select>
				</div>
				<button class="btn btn-success">Edit Users</button>
			</form>
		</div>
	</div>
</div>