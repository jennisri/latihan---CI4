<?php echo $this->extend('layout/templates'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
	<div class="col-10">
		<h3 class="mt-2">Tambah Data Pegawai</h3>
		<hr>

		<form action="/pegawai/save" method="post" enctype="multipart/form-data">

			<?php echo csrf_field(); ?>

			<div class="form-group">
				<label for="nip">NIP</label>
				<input type="number" class="form-control" id="nip" name="nip" value="<?php echo old('nip') ?>">
			</div>

			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo old('nama') ?>">
			</div>

			<div class="form-group">
				<label for="jk">Jenis Kelamin</label>
				<select class="form-control" id="jk" name="jk" value="<?php echo old('jk') ?>">
					<option value="">--Pilih--</option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>

			<div class="form-group">
				<label for="id_bidang">Bidang</label>
				<select class="form-control" id="id_bidang" name="id_bidang" value="<?php echo old('id_bidang') ?>">
					<option value="">--Pilih--</option>
					<?php foreach ( $bidang as $b ) : ?>
						<option value="<?php echo $b['id_bidang'] ?>"><?php echo $b['nama_bidang']; ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo old('alamat') ?>">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo old('email') ?>">
			</div>

			<div class="form-group">
				<label for="no_telepon">No Telepon</label>
				<input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo old('no_telepon') ?>">
			</div>

			<div class="form-group">
				<label for="id_status">Status</label>
				<select class="form-control" id="id_status" name="id_status" value="<?php echo old('id_status') ?>">
					<option value="">--Pilih--</option>
					<?php foreach ( $status as $b ) : ?>
						<option value="<?php echo $b['id_status'] ?>"><?php echo $b['nama_status']; ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="gaji">Gaji</label>
				<input type="number" class="form-control" id="gaji" name="gaji" value="<?php echo old('gaji') ?>">
			</div>

			<div class="form-group">
				<label for="tmk">Terhitung Masa Kerja</label>
				<input type="date" class="form-control" id="tmk" name="tmk" value="<?php echo old('tmk') ?>">
			</div>

			<div class="form-group">
				<label for="foto_diri">Foto</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="foto_diri" name="foto_diri" onchange="previewFoto()">
					<label class="custom-file-label nama-label" for="foto_diri">Pilih Foto...</label>
				</div>

				<div class="mt-1">
					<img src="" alt="" class="img-thumbnail img-preview tampilan" width="100px">
				</div>
			</div>


			<div class="float-right mb-5">
				<button type="submit" name="tambah" class="btn btn-primary">Tambah</button>

			</div>
			

		</form>
		
	</div>
</div>
<?php echo $this->endSection(); ?>