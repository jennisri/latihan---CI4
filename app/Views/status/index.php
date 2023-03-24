<?php echo $this->extend('layout/templates'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
  <div class="col-10">

    <h2 class="my-4">Daftar Status</h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
      Tambah
    </button>

    <?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo session()->getFlashdata('pesan'); ?>
    </div>
  <?php endif; ?>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach ( $status as $b ) : ?>
        <tr>
          <th scope="row"><?php echo $no++ ?></th>
          <td><?php echo $b['nama_status']; ?></td>
          <td>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEdit<?php echo $b['id_status'];?>">
              Edit
            </button>

            <form action="/status/<?php echo $b['id_status'] ?>" method="post" class="d-inline">
              <?php echo csrf_field() ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin akan dihapus?')">Delete</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/status/save" method="post">
          <div class="form-group">
            <label for="nama_status">Nama Status</label>
            <input type="text" class="form-control" id="nama_status" name="nama_status">
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
<?php foreach ( $status as $b ) : ?>
  <div class="modal fade" id="modalEdit<?php echo $b['id_status'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/status/update/<?php echo $b['id_status'] ?>" method="post">
            <div class="form-group">
              <label for="nama_status">Nama Status</label>
              <input type="text" class="form-control" id="nama_status" name="nama_status" value="<?php echo $b['nama_status']; ?>">
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