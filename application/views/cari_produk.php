<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Hasil Pencarian</h1>
	<div class="row">
		<?php if (!empty($konten)) : ?>
		<?php foreach ($konten as $ktn) : ?>
		<!-- konten -->
		<div class="filters-content">
			<div class="row">
				<div class="col-sm-6 col-lg-4 kategori-<?= $ktn['id_kategori'] ?>" action="<?= base_url('keranjang') ?>"
					method="post">
					<div class="box">
						<div class="detail-box">
							<h5><?= $ktn['judul'] ?></h5>
							<p><?= mb_strimwidth($ktn['keterangan'], 0, 100, '...') ?></p>

							<div class="options">
								<h6>
									Rp. <?= number_format($ktn['harga'], 0, ',', '.') ?>
								</h6>
								<?php endforeach; ?>
								<?php else : ?>
								<div class="col-12">
									<p>Produk tidak ditemukan.</p>
								</div>
								<?php endif; ?>
							</div>
						</div>
