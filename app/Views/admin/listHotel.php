<?= $this->extend('templates/index'); ?>

<?= $this->section('admin-content'); ?>
<div class="container-fluid">
     <?php if (session()->getFlashdata('status')) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '<?= session()->getFlashdata('status'); ?>',
                    timer:1000,
                     showConfirmButton: false
                });
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session()->getFlashdata('error'); ?>',
                    timer:1000,
                     showConfirmButton: false
                });
            });
        </script>
    <?php endif; ?>
   <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">List Hotel</h1>
        <a href="<?= base_url('admin/create'); ?>" class="btn btn-success">Tambah</a>
    </div>
      <div class="table-responsive">
   <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Harga</th>
          <th scope="col">Gambar</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($hotels as $hotel) : ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $hotel['nama']; ?></td>
          <td><?= $hotel['lokasi']; ?></td>
          <td>Rp.<?= $hotel['harga']; ?></td>
          <td> <img src="<?= base_url('upload/' . $hotel['gambar']); ?>" alt="<?= $hotel['nama']; ?>" width="50px" height="50px"/></td>
          <td>
            <a href="<?= base_url('admin/edit/' . $hotel['id']); ?>" class="btn btn-primary">Edit</a>
            <a href="<?= base_url('admin/deletehotel/' . $hotel['id']); ?>" onclick="confirmDelete(event, '<?= $hotel['id']; ?>')" class="btn btn-danger">Hapus</a>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#hotelModal<?= $hotel['id']; ?>">
      Detail
    </button>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>
</div>
<!-- Create the modal for displaying hotel details -->
<?php foreach ($hotels as $hotel) : ?>
<div class="modal fade" id="hotelModal<?= $hotel['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hotelModalLabel<?= $hotel['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hotelModalLabel<?= $hotel['id']; ?>">Detail Hotel <?= $hotel['nama']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nama:</strong> <?= $hotel['nama']; ?></p>
        <p><strong>Lokasi:</strong> <?= $hotel['lokasi']; ?></p>
        <p><strong>Harga:</strong> Rp.<?= $hotel['harga']; ?></p>
        <img src="<?= base_url('upload/' . $hotel['gambar']); ?>" alt="<?= $hotel['nama']; ?>" width="100%"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<script>
function confirmDelete(event, id) {
  event.preventDefault();
  Swal.fire({
    title: 'Konfirmasi',
    text: 'Apakah Anda yakin ingin menghapus data ini?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '<?= base_url('admin/deletehotel/'); ?>' + id;
    }
  });
}
</script>

<?= $this->endSection(); ?>
