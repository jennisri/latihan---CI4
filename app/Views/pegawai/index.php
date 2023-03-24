<?php echo $this->extend('layout/templates'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
	<div class="col-10">
		<h2>Daftar Pegawai</h2>

		<a href="/pegawai/create" class="btn btn-primary btn-sm mb-3">Tambah</a>


		<?php if(session()->getFlashdata('pesan')) : ?>
		<div class="alert alert-success" role="alert">
			<?php echo session()->getFlashdata('pesan'); ?>
		</div>
	<?php endif; ?>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">NIP</th>
				<th scope="col">Nama</th>
				<th scope="col">Jenis Kelamin</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1 ?>

			<?php foreach ( $pegawai as $p ) : ?>
				<tr>
					<th scope="row"><?php echo $no++ ?></th>
					<td><?php echo $p['nip'] ?></td>
					<td><?php echo $p['nama']; ?></td>
					<td><?php echo $p['jk']; ?></td>
					<td>
						<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalDetail">
							Detail
						</button>

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit">
							Edit
						</button>

						<form action="/user/delete/" method="post" class="d-inline">
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


<?php echo $this->endSection(); ?>