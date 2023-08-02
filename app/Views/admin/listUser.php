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
  <td>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userModal<?= $user->userid; ?>">
      Detail
    </button>
  </td>
</tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?php foreach ($users as $user) : ?>
<div class="modal fade" id="userModal<?= $user->userid; ?>" tabindex="-1" role="dialog" aria-labelledby="userModalLabel<?= $user->userid; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel<?= $user->userid; ?>">User Detail: <?= $user->username; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Username:</strong> <?= $user->username; ?></p>
        <p><strong>Email:</strong> <?= $user->email; ?></p>
        <p><strong>Role:</strong> <?= $user->name; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?= $this->endSection(); ?>
