<!-- Boostrape -->

<!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                <?= $konfig->alamat; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +<?= $konfig->no_wa; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <?= $konfig->email; ?>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
            <?= $konfig->judul_website; ?>
            </a>
            <p>============================</p>
            <!-- <p>
            <?= $konfig->profil_website; ?>
            </p> -->
            <div class="footer_social">
              <a href="<?= $konfig->fb; ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="<?= $konfig->fb; ?>">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="<?= $konfig->fb; ?>">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="<?= $konfig->ig; ?>">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="<?= $konfig->fb; ?>">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->
  <!-- isotope js -->

  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

  <!-- jQery -->
  <script src="<?php echo base_url()?>asset/feane/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="<?php echo base_url()?>asset/feane/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <!-- <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script> -->
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="<?php echo base_url()?>asset/feane/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
   <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!--  -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var iso = new Isotope(".filters-content .row", {
        itemSelector: ".col-sm-6",
        layoutMode: "fitRows",
    });

    document.querySelectorAll(".filters_menu li").forEach(function (el) {
        el.addEventListener("click", function () {
            document.querySelector(".filters_menu li.active").classList.remove("active");
            this.classList.add("active");
            var filterValue = this.getAttribute("data-filter");
            iso.arrange({ filter: filterValue === "*" ? "*" : `.${filterValue}` });
        });
    });
});

</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi Isotope
    var iso = new Isotope(".filters-content .row", {
        itemSelector: ".col-sm-6",
        layoutMode: "fitRows",
    });

    // Event Listener untuk kategori menu
    document.querySelectorAll(".filters_menu li").forEach(function (el) {
        el.addEventListener("click", function () {
            // Hapus class aktif dari kategori sebelumnya
            document.querySelector(".filters_menu li.active").classList.remove("active");
            // Tambahkan class aktif ke kategori yang dipilih
            this.classList.add("active");

            // Ambil nilai filter
            var filterValue = this.getAttribute("data-filter");
            iso.arrange({ filter: filterValue });
        });
    });
});

</script>
<!-- <script>
document.getElementById('search-icon').addEventListener('click', function () {
    const searchForm = document.querySelector('.search-form');
    searchForm.classList.toggle('active');
});

</script>
<script>
  document.getElementById('search-icon').addEventListener('click', function (e) {
    e.preventDefault(); // Mencegah tombol submit saat ikon ditekan
    const searchInput = document.querySelector('.search-input');
    searchInput.classList.toggle('active');
    if (searchInput.classList.contains('active')) {
        searchInput.focus(); // Fokus ke input jika terbuka
    }
});
</script> -->

<!-- cari -->
 <!-- <script>
  function filterMenu() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const menuItems = document.getElementById("menuItems").getElementsByClassName("col-lg-4");

    for (let i = 0; i < menuItems.length; i++) {
        const title = menuItems[i].getAttribute("data-title");
        if (title.includes(input)) {
            menuItems[i].style.display = "block"; // Tampilkan item yang cocok
        } else {
            menuItems[i].style.display = "none"; // Sembunyikan item yang tidak cocok
        }
    }
}

  </script> -->
      <!-- <script>
        document.getElementById('searchBar').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const items = document.querySelectorAll('.menu-item');

            items.forEach(item => {
                const title = item.querySelector('.menu-title').textContent.toLowerCase();
                if (title.includes(query)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script> -->
    <script>
    document.getElementById('searchBar').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll('.menu-item');
        let found = false;

        items.forEach(item => {
            const title = item.querySelector('.menu-title').textContent.toLowerCase();
            if (title.includes(query)) {
                item.style.display = 'block';
                found = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Tampilkan notifikasi jika tidak ada hasil
        const notFoundMessage = document.getElementById('notFoundMessage');
        if (!found) {
            notFoundMessage.style.display = 'block';
        } else {
            notFoundMessage.style.display = 'none';
        }
    });
</script>
<script>
  // Pencarian dengan mempertahankan layout
const searchInput = document.querySelector('#searchInput'); // ID input pencarian
const menuItems = document.querySelectorAll('.menu-item'); // Elemen menu-item

searchInput.addEventListener('input', function () {
    const query = this.value.toLowerCase();

    menuItems.forEach((item) => {
        const title = item.querySelector('.menu-title').textContent.toLowerCase();

        if (title.includes(query)) {
            item.classList.remove('d-none'); // Tampilkan elemen
        } else {
            item.classList.add('d-none'); // Sembunyikan elemen
        }
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertData = document.getElementById('alert-data');
        const title = alertData.getAttribute('data-title');
        const text = alertData.getAttribute('data-text');
        const icon = alertData.getAttribute('data-icon');

        // Hanya tampilkan SweetAlert jika ada data
        if (title && text && icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon
            });
        }
    });
</script>
<!--  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertData = document.getElementById('alert-data');
        const title = alertData.getAttribute('data-title');
        const text = alertData.getAttribute('data-text');
        const icon = alertData.getAttribute('data-icon');

        // Tampilkan SweetAlert hanya jika flashdata ada
        if (title && text && icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon
            });
        }
    });
</script>
<!-- add to cart -->
<script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const id_produk = this.getAttribute('data-id');

            fetch('<?= site_url("home/add_to_cart") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({ id_produk: id_produk })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert('Gagal menambahkan ke keranjang.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>

 
</body>

</html>