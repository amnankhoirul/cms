<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Burg | Keranjang</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/feane/css/bootstrap.css" />

	<!--owl slider stylesheet -->
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
	<!-- nice select  -->
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
		integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
		crossorigin="anonymous" />
	<!-- font awesome style -->
	<link href="<?php echo base_url()?>asset/feane/css/font-awesome.min.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url()?>asset/feane/css/style.css" rel="stylesheet" />
	<!-- responsive style -->
	<link href="<?php echo base_url()?>asset/feane/css/responsive.css" rel="stylesheet" />
	<!-- Boostrape -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Isotope.js -->
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.cart-container {
			max-width: 800px;
			margin: 50px auto;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		table th,
		table td {
			border: 1px solid #ddd;
			padding: 10px;
			text-align: center;
		}

		table th {
			background-color: #f9f9f9;
		}

		.cart-actions {
			display: flex;
			justify-content: space-between;
			margin-bottom: 20px;
		}

		.cart-actions button {
			padding: 10px 20px;
			border: none;
			color: white;
			background-color: #ff6666;
			cursor: pointer;
		}

		.coupon-section,
		.cart-totals {
			margin-top: 20px;
		}

		.cart-totals {
			text-align: right;
		}

		.coupon-section input {
			padding: 5px;
			width: 200px;
		}







	</style>
</head>

<body>
	<main class="content">
		<!-- akhir navbar -->
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-10">
				<div class="card">
					<div class="card-header">
						<!-- <h5 class="card-title mb-0">Empty card</h5> -->
						<!--  -->
						<!-- <div class="cart-container"> -->
						<h2>Halaman Keranjang</h2>
						<table class="mt-4">
							<thead>
								<tr>
									<th>No</th>
									<!-- <th>Image</th> -->
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no=1; 
								$subtotal = 0; // Inisialisasi subtotal
								foreach ($this->cart->contents() as $item) :
									$total = $item['price'] * $item['qty']; // Hitung total harga per item
									$subtotal += $total; // Tambahkan total item ke subtotal
								?>
								<tr>
									<td><?= $no++ ?></td>
									<!-- <td><img src="<?= base_url('upload/konten/' . $item['foto']) ?>" alt="Gambar Produk" style="width: 50px;"></td> -->
									<td><?= $item['name'] ?></td>
									<td>Rp. <?= number_format($item['price'], 0, ',', '.') ?></td>
									<td>
										<a href="<?= site_url('home/update_cart/' . $item['rowid'] . '/decrease') ?>"
											class="btn btn-sm btn-danger">-</a>
										<?= $item['qty'] ?>
										<a href="<?= site_url('home/update_cart/' . $item['rowid'] . '/increase') ?>"
											class="btn btn-sm btn-success">+</a>
									</td>
									<td>Rp. <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></td>
									<td>
										<a href="<?= site_url('home/hapus/' . $item['rowid']); ?>"
											class="btn btn-sm btn-danger"
											onClick="return confirm('Apakah Anda yakin untuk menghapus item ini?')">Hapus</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>

						</table>
					</div>
					<!-- <div class="card-body">
						</div> -->
				</div>
			</div>
		</div>
		<!--  -->
		<div class="row justify-content-center">
    <div class="col-10 mt-4">
        <div class="cart-actions d-flex justify-content-end gap-2">
            <a href="<?= site_url('home/hapus_semua') ?>" class="btn btn-danger"
                onClick="return confirm('Apakah Anda yakin ingin menghapus semua item di keranjang?')">
                Hapus Keranjang
            </a>
            <button class="btn btn-primary">
                <a href="<?= site_url('../Home') ?>" class="text-white" style="text-decoration: none;">Lanjut Belanja</a>
            </button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPembayaran">
                Pembayaran
            </button>
        </div>
        <div class="cart-totals mt-3">
            <p><strong>Subtotal: Rp. <?= number_format($subtotal, 0, ',', '.') ?></strong></p>
        </div>
    </div>
</div>

<!-- Modal Pembayaran -->
<div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPembayaranLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir Input Data -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="2" placeholder="Masukkan Alamat Anda"></textarea>
                </div>
                <div class="mb-3">
                    <label for="subtotal" class="form-label">Subtotal</label>
                    <input type="text" class="form-control" id="subtotal" value="Rp. 10.000" readonly>
                </div>
                <div class="mb-3">
                    <label for="pengiriman" class="form-label">Pengiriman</label>
                    <select class="form-select" id="pengiriman">
                        <option value="JNE">JNE</option>
                        <option value="TIKI">TIKI</option>
                        <option value="Pos Indonesia">Pos Indonesia</option>
                    </select>
                </div>

                <!-- Daftar Barang yang Dibeli -->
                <h5>Daftar Barang yang Dibeli</h5>
                <ul id="daftarBarang" class="list-group">
                    <!-- List item akan dimasukkan di sini menggunakan JavaScript -->
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="prosesPembayaranBtn">Proses Pembayaran</button>
            </div>
        </div>
    </div>
</div>


</body>
<footer>
	<!--  -->

	<script>
		document.getElementById('checkout-button').addEventListener('click', function () {
			// Ambil data dari tabel
			const rows = document.querySelectorAll('tbody tr');
			const transaksi = [];

			rows.forEach(row => {
				const judul = row.querySelector('td:nth-child(3)').innerText; // Kolom judul
				const harga = row.querySelector('td:nth-child(4)').innerText.replace(/[^0-9]/g,
					''); // Kolom harga

				transaksi.push({
					judul: judul,
					harga: parseInt(harga)
				});
			});

			// Kirim data ke server melalui AJAX
			fetch('<?= site_url("admin/transaksi/proses_checkout") ?>', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-Requested-With': 'XMLHttpRequest'
					},
					body: JSON.stringify({
						transaksi: transaksi
					})
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						alert('Transaksi berhasil disimpan!');
						// Redirect atau refresh halaman
						window.location.href = '<?= site_url("admin/transaksi/daftar_transaksi") ?>';
					} else {
						alert('Gagal menyimpan transaksi.');
					}
				})
				.catch(error => console.error('Error:', error));
		});

	</script>
	<script>
		function prosesPembayaran() {
			alert('Fitur pembayaran belum tersedia.');
		}

	</script>

	<!-- modal -->
	<script>
		document.getElementById('prosesPembayaranBtn').addEventListener('click', function () {
			// Tambahkan logika pembayaran di sini
			alert('Pembayaran berhasil diproses!');
			// Redirect atau aksi tambahan
			window.location.href = "<?= site_url('pembayaran/selesai') ?>";
		});

	</script>

	<!-- boostrape -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- wa pembayaran -->
<!-- pembayaran keranjang apa aja yg dipilih -->
<script>
document.getElementById('prosesPembayaranBtn').addEventListener('click', function() {
    // Ambil nilai input dari formulir
    var nama = document.getElementById('nama').value;
    var alamat = document.getElementById('alamat').value;
    var subtotal = document.getElementById('subtotal').value;
    var pengiriman = document.getElementById('pengiriman').value;

    // Daftar barang yang dibeli
    var barang = [
        { nama: "Kentang Goreng", harga: "Rp. 10.000", jumlah: 1 },
        { nama: "Burger", harga: "Rp. 15.000", jumlah: 2 }
    ];

    // Tampilkan daftar barang yang dibeli
    var daftarBarang = document.getElementById('daftarBarang');
    daftarBarang.innerHTML = ''; // Kosongkan daftar sebelumnya
    barang.forEach(function(item) {
        var li = document.createElement('li');
        li.classList.add('list-group-item');
        li.textContent = item.nama + " (x" + item.jumlah + ") - " + item.harga;
        daftarBarang.appendChild(li);
    });

    // Format pesan WhatsApp
    var pesan = 
        "Halo, saya ingin melakukan pembayaran dengan rincian sebagai berikut:\n\n" +
        "Nama: " + nama + "\n" +
        "Alamat: " + alamat + "\n" +
        "Subtotal: " + subtotal + "\n" +
        "Pengiriman: " + pengiriman + "\n\n" +
        "Daftar Barang yang Dibeli:\n";

    barang.forEach(function(item) {
        pesan += item.nama + " (x" + item.jumlah + ") - " + item.harga + "\n";
    });

    // Encode pesan agar bisa digunakan di URL
    var encodedPesan = encodeURIComponent(pesan);

    // Nomor WhatsApp tujuan (ganti dengan nomor kamu, format: 62 untuk Indonesia)
    var nomorWhatsApp = "62882003370440"; // Ganti dengan nomor WA tujuan

    // Buat link WhatsApp
    var linkWhatsApp = "https://wa.me/0882003370440" + nomorWhatsApp + "?text=" + encodedPesan;

    // Arahkan pengguna ke link WhatsApp
    window.open(linkWhatsApp, '_blank');
});
</script>

</footer>

</html>
