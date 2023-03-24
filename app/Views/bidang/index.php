<?php echo $this->extend('layout/templates'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
  <div class="col-10">

    <h2 class="my-4">Daftar Bidang</h2>

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">
      Tambah
    </button>

    <?php if(session()->getFlashdata('pesan')) :?>
    <div class="alert alert-success" role="alert">
      <?php echo session()->getFlashdata('pesan'); ?>
    </div>
  <?php endif; ?>

  <!-- <a href="/bidang/create" class="btn btn-sm btn-primary mb-3">Tambah</a> -->

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Bidang</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach ( $bidang as $b ) : ?>
        <tr>
          <th scope="row"><?php echo $no++ ?></th>
          <td><?php echo $b['nama_bidang']; ?></td>
          <td>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $b['id_bidang']; ?>">
              Edit
            </button>

            <form action="/bidang/<?php echo $b['id_bidang']; ?>" method="post" class="d-inline">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin data akan dihapus?')">Delete</button>
            </form>
          </td>
        </tr>

      <?php endforeach ?>

    </tbody>
  </table>
</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/bidang/save" method="post">
          <?php echo csrf_field(); ?>

          <div class="form-group">
            <label for="nama_bidang">Nama Bidang</label>
            <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" value="<?php echo old('nama_bidang') ?>">
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
<?php foreach ( $bidang as $b) : ?>
  <div class="modal fade" id="modalEdit<?php echo $b['id_bidang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Bidang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/bidang/update/<?php echo $b['id_bidang'] ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group">
              <label for="nama_bidang">Nama Bidang</label>
              <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" value="<?php echo $b['nama_bidang']; ?>">
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
<?php echo $this->endSection(); ?>