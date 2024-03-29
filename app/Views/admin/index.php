<?= $this->extend('templates/index'); ?>

<?= $this->section('admin-content'); ?>
<div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800">User List Admin</h1>
   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php $i =1; ?>
   <?php foreach ($users as $user) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $user->username; ?></td>
      <td><?= $user->email; ?></td>
      <td><?= $user->name; ?></td>
      <td><a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-warning">Detail</a></td>
    </tr>
   <?php endforeach ?>
  </tbody>
</table>
</div>
<?= $this->endSection(); ?>