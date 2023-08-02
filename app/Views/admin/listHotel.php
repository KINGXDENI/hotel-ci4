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
          <td><?= $hotel['harga']; ?></td>
          <td> <img src="<?= base_url('upload/' . $hotel['gambar']); ?>" alt="<?= $hotel['nama']; ?>" width="50px" height="50px"/></td>
          <td>
            <a href="<?= base_url('admin/edit/' . $hotel['id']); ?>" class="btn btn-primary">Edit</a>
            <a href="<?= base_url('admin/deletehotel/' . $hotel['id']); ?>" onclick="confirmDelete(event, '<?= $hotel['id']; ?>')" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>
</div>
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
