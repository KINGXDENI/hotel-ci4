<?= $this->extend('templates/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Hotel</h3>
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('admin/update/' . $hotel['id']); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="harga">Harga:</label>
              <input type="text" class="form-control" id="harga" name="harga" value="<?= $hotel['harga']; ?>" />
            </div>
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $hotel['nama']; ?>" />
            </div>
            <div class="form-group">
              <label for="gambar">Gambar:</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImage(this)" />
                <label class="custom-file-label" for="gambar" id="file-label">Pilih file...</label>
              </div>
              <?php if ($hotel['gambar']) : ?>
                <img src="<?= base_url('upload/' . $hotel['gambar']); ?>" class="mx-auto d-block" width="200" alt="Gambar Hotel" id="image-preview">
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="lokasi">Lokasi:</label>
              <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $hotel['lokasi']; ?>" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function previewImage(input) {
  const fileLabel = document.getElementById('file-label');
  const preview = document.getElementById('image-preview');
  const file = input.files[0];
  const reader = new FileReader();

  reader.onload = function(e) {
    preview.src = e.target.result;
  };

  if (file) {
    fileLabel.innerText = file.name;
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
    fileLabel.innerText = "Pilih file...";
  }
}
</script>

<?= $this->endSection(); ?>
