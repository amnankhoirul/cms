<!-- food section -->

<section class="food_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Our Menu
			</h2>
		</div>
		<!-- Kategori Menu -->
		<ul class="filters_menu d-flex justify-content-center">
			<li class="active" data-filter="*">All</li>
			<?php foreach ($kategori as $kate) { ?>
			<li data-filter=".kategori-<?= $kate['id_kategori'] ?>">
				<?= $kate['nama_kategori'] ?>
			</li>
			<?php } ?>
		</ul>

		<!-- konten -->
		<div class="filters-content">
			<div class="row">
				<?php foreach ($konten as $index => $ktn) { ?>
				<div class="col-sm-6 col-lg-4 kategori-<?= $ktn['id_kategori'] ?>">
					<div class="box">
						<div class="img-box">
							<img src="<?= base_url('upload/konten/' . $ktn['foto']) ?>" alt="">
						</div>
						<div class="detail-box">
							<h5><?= $ktn['judul'] ?></h5>
							<p><?= mb_strimwidth($ktn['keterangan'], 0, 20, '...') ?></p>

							<div class="options">
								<h6>
									Rp. <?= number_format($ktn['harga'], 0, ',', '.') ?>
								</h6>
								<!-- Tombol Icon -->
								<div class="icon-container">
									<a href="<?= base_url('Home/keranjang') ?>" class="icon-right">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path
														d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                                    c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                                    C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                                    c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                                    C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path
														d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                                        c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
										</svg>
									</a>

									<!-- Tombol Icon untuk Modal -->
									<a data-bs-toggle="modal" data-bs-target="#modal-<?= $index ?>" class="icon-right">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
											<path
												d="M10 2a8 8 0 100 16 8 8 0 000-16zm-7.5 8a7.5 7.5 0 1113.258 4.8l5.121 5.122a1 1 0 01-1.415 1.414l-5.121-5.12A7.5 7.5 0 012.5 10z" />
										</svg>
									</a>
									<!--  -->
									<div class="modal fade" id="modal-<?= $index ?>" tabindex="-1"
										aria-labelledby="modalLabel-<?= $index ?>" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content text-dark">
												<div class="modal-header">
													<h5 class="modal-title" id="modalLabel-<?= $index ?>">Detail
														Produk</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<form action="<?= base_url('admin/transaksi/simpan') ?>" method="post">
													<div class="modal-body">
														<div class="card">
															<img src="<?= base_url('upload/konten/' . $ktn['foto']) ?>"
																alt="Foto Produk" class="card-img-top mb-3"
																style="max-width: 300px; height: auto; margin: 0 auto;">
															<div class="card-body text-dark">
																<h5 clawwwwss="card-title text-dark">
																	<?= $ktn['judul'] ?></h5>
																<p class="card-text "><?= $ktn['keterangan'] ?></p>
																<h6 class="text-muted">Rp.
																	<?= number_format($ktn['harga'], 0, ',', '.') ?>
																</h6>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-bs-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Beli</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Akhir Tombol Icon untuk Modal -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<!-- Akhir Konten -->
	</div>
</section>

<!-- end food section -->
