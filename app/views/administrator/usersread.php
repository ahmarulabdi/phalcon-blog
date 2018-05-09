<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Data Users</h4>
	</div>
	<div class="panel-body">
		<?php $this->flashSession->Output()  ?>
		<a class="btn btn-primary" href="<?= $this->url->get('administrator/userscreate') ?>" >Tambah User</a>
		<table class="table table-stripped table-hover">
			<thead>
				<tr>
					<th>Id Users</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Hak Akses</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user ): ?>
					<tr>
						<td><?= $user->id_users ?></td>
						<td><?= $user->nama ?></td>
						<td><?= $user->username ?></td>
						<td><?= $user->password ?></td>
						<td><?= $user->hak_akses ?></td>
						<td>
							<a href="<?= $this->url->get('administrator/usersedit/'.$user->id_users) ?>" class="btn btn-info" >
								<i class="glyphicon glyphicon-edit"></i>
							</a>
							<a data-target="#modalDelete" data-toggle="modal"  class="btn btn-danger" onclick="parsing(<?= $user->id_users ?>)">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- modal untuk pertanyaan konfirmasi sebelum penghapusan data users -->
<div class="modal fade" id="modalDelete" > 
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= $this->url->get('administrator/usersdelete') ?>" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Apakah anda ingin menghapus Users ini ?</h4>
				</div>
				<div class="modal-body">
					<p>
						menghapus users blogger ini, berarti juga menghapus postingan dari user ini
					</p>
					<input id="idUsers" type="hidden" name="id_users" >
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit">OK</button>
					<button class="btn btn-default">Batalkan</button>
				</div>
			</form>
		</div>
	</div>
</div>

 <!-- mengirim id_users ke modal -->
<script type="text/javascript">
	
	function parsing(id_users){
		$('#idUsers').val(id_users);
	}
</script>