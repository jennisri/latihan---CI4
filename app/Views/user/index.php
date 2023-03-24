<?php echo $this->extend('layout/templates'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
	<div class="col-10">
		<h2>Daftar User</h2>

		<button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modalUser">
			Tambah
		</button>


		<?php if(session()->getFlashdata('pesan')) : ?>
		<div class="alert alert-success" role="alert">
			<?php echo session()->getFlashdata('pesan'); ?>
		</div>
	<?php endif; ?>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Foto</th>
				<th scope="col">Nama</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1 ?>

			<?php foreach ( $user as $b ) : ?>
				<tr>
					<th scope="row"><?php echo $no++ ?></th>
					<td><img src="/img/<?php echo $b['foto']; ?>" alt="" width="100px"></td>
					<td><?php echo $b['nama']; ?></td>
					<td>
						<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalDetail<?php echo $b['slug'];  ?>">
							Detail
						</button>

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $b['slug']; ?>">
							Edit
						</button>

						<form action="/user/delete/<?php echo $b['id_user'] ?>" method="post" class="d-inline">
							<?php echo csrf_field(); ?>
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Data ini yakin dihapus?')">Delete</button>
						</form>
					</td>
				</tr>

			<?php endforeach ?>


		</tbody>
	</table>
</div>
</div>


<!-- Modal Detail -->
<?php foreach ( $user as $b ) : ?>
	<div class="modal fade" id="modalDetail<?php echo $b['slug'];  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table">
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td><?php echo $b['nama'] ?></td>
						</tr>

						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td><?php echo $b['alamat'] ?></td>
						</tr>

						<tr>
							<th>No Telepon</th>
							<th>:</th>
							<td><?php echo $b['handphone'] ?></td>
						</tr>

						<tr>
							<th>Foto</th>
							<th>:</th>
							<td><img src="/img/<?php echo $b['foto'] ?>" alt="" width="25%"></td>
						</tr>

					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


<?php endforeach ?>


<!-- Modal Tambah -->
<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/user/save" method="post" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>

					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama">
					</div>

					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat">
					</div>

					<div class="form-group">
						<label for="handphone">No Telepon</label>
						<input type="number" class="form-control" id="handphone" name="handphone">
					</div>

					<div class="form-group">
						<label for="foto">Foto</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
							<label class="custom-file-label" for="foto">Pilih Foto...</label>
						</div>

						<div class="mt-1">
							<img src="" alt="" class="img-thumbnail img-preview" width="100px">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<?php foreach ( $user as $b ) : ?>
	<div class="modal fade" id="modalEdit<?php echo $b['slug']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/user/update/<?php echo $b['id_user'] ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="slug" value="<?php echo $b['slug']; ?>">
						<input type="hidden" name="fotoLama" value="<?php echo $b['foto']; ?>">

						<div class="form-group">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $b['nama'] ?>">
						</div>

						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $b['alamat'] ?>">
						</div>

						<div class="form-group">
							<label for="handphone">No Telepon</label>
							<input type="number" class="form-control" id="handphone" name="handphone"value="<?php echo $b['handphone'] ?>">
						</div>

						<div class="form-group">
							<label for="foto">Foto</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
								<label class="custom-file-label" for="foto"><?php echo $b['foto'] ?></label>
							</div>

							<div class="mt-1">
								<img src="/img/<?php echo $b['foto'] ?>" alt="" class="img-thumbnail img-preview" width="100px">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>




<?php echo $this->endSection() ?>