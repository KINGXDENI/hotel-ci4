<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
     <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css " rel="stylesheet">
    <link rel="icon" type="image/ico" href="<?= base_url('favicon.ico'); ?>">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url(''); ?>/css/styles.css" />
    <title>Hotel CI4</title>
  </head>
  <body>
    <nav>
  <div class="nav__logo"><i class="fas fa-hotel"></i> HOTEL CI4</div>
  <div class="nav__hamburger" id="menuIcon">
    <i class="fas fa-bars"></i>
  </div>
  <div class="nav__close">
      <i class="fas fa-times"></i>
    </div>
  <div class="nav__popup">
  <ul class="nav__links">
    <li class="link"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a></li>
   <li class="link">
    <a href="#" id="pesanDropdown" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"> <i class="fas fa-calendar"></i> Pesan <?php if (!empty($bookings)) : ?>
                    <span class="badge badge-primary"><?= count($bookings); ?></span>
                <?php endif; ?></a>
    <div class="dropdown-menu" aria-labelledby="pesanDropdown" id="bookingDropdown">
        <?php if (empty($bookings)) : ?>
            <div class="dropdown-item">
                <span>Anda belum memesan hotel.</span>
            </div>
        <?php else : ?>
            <?php foreach ($bookings as $booking) : ?>
                <?php foreach ($hotels as $hotel) : ?>
                    <?php if ($hotel['id'] === $booking['hotel_id']) : ?>
                        <div class="dropdown-item">
                            <span><?= $hotel['nama']; ?> - Rp. <?= number_format($hotel['harga'], 0, ',', '.'); ?></span>
                            <a href="#" class="delete-icon" onclick="confirmDeleteBooking('<?= base_url('user/deletebooking/' . $booking['id_booking']); ?>')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</li>

    <?php if(logged_in()) : ?>
    <li class="link"><a href="<?= base_url('logout'); ?>"> <i class="fas fa-sign-out-alt"></i> Keluar</a></li>
    <?php endif; ?>
    <?php if(!logged_in()) : ?>
    <li class="link"><a href="<?= base_url('login'); ?>"> <i class="	fas fa-sign-in"></i> Masuk</a></li>
    <?php endif; ?>
  </ul>
</div>
</nav>

    <header class="section__container header__container">
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
  <div class="header__image__container">
    <div class="header__content">
      <h1>Nikmati Liburan Impian Anda</h1>
      <p>Pesan Hotel, Penerbangan, dan Paket Menginap dengan harga terendah.</p>
      <div class="button__container">
        <a href="#hotel-popular" class="btns rounded">Booking Now</a>
      </div>
    </div>
  </div>
</header>


  <section class="section__container popular__container" id="hotel-popular">
    <h2 class="section__header">Hotel Populer</h2>
    <div class="popular__grid">
        <?php foreach ($hotels as $hotel) : ?>
    <?php
    $isBooked = false;
    foreach ($bookings as $booking) {
        if ($hotel['id'] === $booking['hotel_id']) {
            $isBooked = true;
            break;
        }
    }
    ?>
    <div class="popular__card">
                <img src="<?= base_url('upload/' . $hotel['gambar']); ?>" alt="popular hotel" />
                <div class="popular__content">
                    <div class="popular__card__header">
                        <h4><?= $hotel['nama']; ?></h4>
                        <h4>Rp.<?= number_format($hotel['harga'], 0, ',', '.'); ?></h4>
                    </div>
                    <p><?= $hotel['lokasi']; ?></p>
                    <form action="<?= base_url('book-hotel'); ?>" method="post">
                        <input type="hidden" name="hotel_id" value="<?= $hotel['id']; ?>">
                         <?php if ($isBooked) : ?>
                <button type="button" class="btn btn-booking" disabled>SUDAH DIBOOKING</button>
            <?php else : ?>
                <button type="submit" class="btn btn-booking">BOOKING</button>
            <?php endif; ?>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>



    <section class="client">
      <div class="section__container client__container">
        <h2 class="section__header">Review</h2>
        <div class="client__grid">
          <div class="client__card">
            <img src="<?= base_url(''); ?>/assets/client-1.jpg" alt="client" />
            <p>
              Proses pemesanan berjalan lancar, dan konfirmasinya langsung. Saya sangat merekomendasikan WDM&Co untuk pemesanan hotel tanpa ribet.
            </p>
          </div>
          <div class="client__card">
            <img src="<?= base_url(''); ?>/assets/client-2.jpg" alt="client" />
            <p>
              Website ini memberikan informasi detail tentang hotel, termasuk fasilitas, foto, yang membantu saya membuat keputusan yang terinformasi.
            </p>
          </div>
          <div class="client__card">
            <img src="<?= base_url(''); ?>/assets/client-3.jpg" alt="client" />
            <p>
              Saya dapat memesan kamar dalam hitungan menit, dan hotelnya melebihi harapan saya. Saya menghargai efisiensi dan keandalan WDM&Co.
            </p>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="section__container footer__container">
      <div class="footer__bar">
        Hotel CI4 © <?= date('Y'); ?>
      </div>
    </footer>
  </body>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  const pesanDropdown = document.getElementById('pesanDropdown');
  const bookingDropdown = document.getElementById('bookingDropdown');
  const hamburger = document.querySelector('.nav__hamburger');
  const navLinks = document.querySelector('.nav__links');
  const closeBtn = document.querySelector('.nav__close');

  // Fungsi untuk menampilkan popup menu
      function showMenu() {
        navLinks.classList.add('show');
        closeBtn.classList.add('show');
      }

      // Fungsi untuk menyembunyikan popup menu
      function hideMenu() {
        navLinks.classList.remove('show');
         closeBtn.classList.remove('show');
      }

      hamburger.addEventListener('click', showMenu);
      closeBtn.addEventListener('click', hideMenu);
      window.addEventListener('scroll', hideMenu);
  // Function to toggle the dropdown
  function toggleDropdown() {
    bookingDropdown.classList.toggle('show');
    bookingDropdown.classList.toggle('fadeIn');
  }

  // Event listener for the Pesan link
  pesanDropdown.addEventListener('click', function(event) {
    event.preventDefault();
    toggleDropdown();
  });

  // Event listener to close the dropdown when clicked outside
  window.addEventListener('click', function(event) {
    if (!event.target.matches('#pesanDropdown')) {
      if (bookingDropdown.classList.contains('show')) {
        bookingDropdown.classList.remove('fadeIn');
        bookingDropdown.classList.add('fadeOut');
        setTimeout(() => {
          bookingDropdown.classList.remove('show', 'fadeOut');
        }, 300);
      }
    }
  });
});
    function confirmDeleteBooking(bookingUrl) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this booking!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = bookingUrl;
            }
        });
    }
</script>

  <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js "></script>
</html>
