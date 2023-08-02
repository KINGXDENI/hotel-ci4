<?= $this->extend('templates/index'); ?>

<?= $this->section('admin-content'); ?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">User List</h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
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
</div>
<?= $this->endSection(); ?>
