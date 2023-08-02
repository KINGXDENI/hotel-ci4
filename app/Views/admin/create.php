<?= $this->extend('templates/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Hotel</h3>
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('admin/save'); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="harga">Harga:</label>
              <input type="text" class="form-control" id="harga" name="harga" />
            </div>
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama" />
            </div>
            <div class="form-group">
              <label for="gambar">Gambar:</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="updateFileName()" />
                <label class="custom-file-label" for="gambar" id="file-label">Pilih file...</label>
              </div>
            </div>
            <div class="form-group">
              <label for="lokasi">Lokasi:</label>
              <input type="text" class="form-control" id="lokasi" name="lokasi" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function updateFileName() {
  const fileInput = document.getElementById('gambar');
  const fileLabel = document.getElementById('file-label');
  const fileName = fileInput.value.split('\\').pop(); // Get the filename from the file path
  fileLabel.innerText = fileName || 'Pilih file...'; // Update the label text
}
</script>

<?= $this->endSection(); ?>
