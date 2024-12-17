<body>
	<div class="hero_area">
		<div id="menghilang">
			<?= $this->session->flashdata('alert') ?>
		</div>
		<!-- Caraousel -->
		<div class="bg-box">
			<?php $no=1; foreach($foto_caraousel as $ft_crs){?>
			<div class="" style="widh:50%;" <?php if($no==1){echo "active";} ?>>
				<img src="<?= base_url('upload/caraousel/' . $ft_crs['foto']) ?>">
			</div>
			<?php $no++; } ?>
		</div>
		<!-- header section strats -->
		<header class="header_section">
			<div class="container">
				<nav class="navbar navbar-expand-lg custom_nav-container ">
					<a class="navbar-brand" href="<?php echo base_url()?>asset/feane/index.html">
						<span>
							<?= $konfig->judul_website;?>
						</span>
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class=""> </span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav  mx-auto ">
							<?php $menu = $this->uri->segment(1); ?>
							<li class="nav-item <?php if($menu == 'Home'){echo "active";} ?>">
								<a class="nav-link" href="<?php echo base_url('Home')?>">Home <span
										class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item <?php if($menu == 'Home'){echo "active";} ?> ">
								<a class="nav-link" href="#menu">Menu</a>
							</li>
							<li class="nav-item <?php if($menu == 'About'){echo "active";} ?>">
								<a class="nav-link" href="<?php echo base_url('About')?>">About</a>
							</li>
							<li class="nav-item <?php if($menu == 'Masukan'){echo "active";} ?>">
								<a class="nav-link" href="<?php echo base_url('Masukan')?>">Masukan</a>
							</li>
						</ul>
						<div class="user_option">
							<!-- <a href="<?php echo base_url('profil')?>" class="user_link">
								<i class="fa fa-user" aria-hidden="true"></i>
							</a> -->
							<!-- <div class="search-container">
								<form class="search-form" action="<?= base_url('home/cari') ?>" method="post">
									<input type="text" name="query" class="search-input" placeholder="Search..." required>
									<button class="btn nav_search-btn" type="submit" id="search-icon">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</form>
							</div> -->

							<a class="cart_link" href="<?= base_url('keranjang') ?>">
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
									<g>
										<g>
											<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
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
											<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
										</g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
								</svg>
							</a>

							<a href="<?= base_url('auth') ?>" class="order_online">
								Login
							</a>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!-- end header section -->

		<!-- slider section -->
		<section class="slider_section">
			<div id="customCarousel1" class="carousel slide" data-ride="carousel">

				<!-- Carousel Inner -->
				<div class="carousel-inner">
					<?php $no = 1; foreach ($caraousel as $crs): ?>
					<div class="carousel-item <?php if ($no == 1) { echo "active"; } ?>">
						<div class="container">
							<div class="row">
								<div class="col-md-7 col-lg-6">
									<div class="detail-box">
										<h1>
											<?= htmlspecialchars($crs['judul']); ?>
										</h1>
										<p>
											<?= htmlspecialchars($crs['keterangan']); ?>
										</p>
										<div class="btn-box">
											<a href="#" class="btn1">Order Now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $no++; endforeach; ?>
				</div>

				<!-- Carousel Indicators -->
				<div class="container">
					<ol class="carousel-indicators">
						<?php $no = 1; foreach ($caraousel as $crs): ?>
						<!-- // Reset variabel $no untuk indikator carousel -->
						<li data-target="#customCarousel1" data-slide-to="<?= $no - 1; ?>"
							class="<?php if ($no == 1) { echo "active"; } ?>">
						</li>
						<?php $no++;endforeach; ?>
					</ol>
				</div>

			</div>
		</section>
		<!-- end slider section -->
	</div>

	<!-- offer section -->

	<section class="offer_section layout_padding-bottom">
		<div class="offer_container">
			<div class="container ">
				<div class="row">
					<div class="col-md-6  ">
						<div class="box ">
							<div class="img-box">
								<img src="<?php echo base_url()?>asset/feane/images/o1.jpg" alt="">
							</div>
							<div class="detail-box">
								<h5>
									Tasty Thursdays
								</h5>
								<h6>
									<span>20%</span> Off
								</h6>
								<a href="">
									Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
										xml:space="preserve">
										<g>
											<g>
												<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
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
												<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
											</g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6  ">
						<div class="box ">
							<div class="img-box">
								<img src="<?php echo base_url()?>asset/feane/images/o2.jpg" alt="">
							</div>
							<div class="detail-box">
								<h5>
									Pizza Days
								</h5>
								<h6>
									<span>15%</span> Off
								</h6>
								<a href="">
									Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
										xml:space="preserve">
										<g>
											<g>
												<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
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
												<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
											</g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
										<g>
										</g>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- end offer section -->

	<!-- food section -->
	<section class="food_section layout_padding-bottom">
		<div class="container">
			<div class="heading_container heading_center">
				<h2>
					<section id="menu">Our Menu</section>
				</h2>
			</div>
			<!-- Input Pencarian -->
			<div class="d-flex flex-column align-items-center mb-4">
				<input type="text" id="searchBar" class="form-control w-50" placeholder="Cari menu...">
				<div id="notFoundMessage" class="text-danger mt-2" style="display: none;">Menu tidak ditemukan.</div>
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

			<!-- Konten -->
			<div class="filters-content">
				<div class="row" id="menuItems">
					<?php foreach ($konten as $index => $ktn) { ?>
					<div class="col-sm-6 col-lg-4 kategori-<?= $ktn['id_kategori'] ?> menu-item">
						<div class="box">
							<div class="img-box">
								<img src="<?= base_url('upload/konten/' . $ktn['foto']) ?>" alt="Gambar Produk">
							</div>
							<div class="detail-box">
								<h5 class="menu-title"><?= $ktn['judul'] ?></h5>
								<p><?= mb_strimwidth($ktn['keterangan'], 0, 100, '...') ?></p>
								<div class="options">
									<h6>Rp. <?= number_format($ktn['harga'], 0, ',', '.') ?></h6>
									<!-- Tombol Ikon -->
									<div class="icon-container">
										<!-- Ikon Keranjang -->
										<?php echo anchor('home/tambah_ke_keranjang/'.$ktn['id_konten'],'<i class="bi bi-cart" style="color: white;"></i>')?>
										<!-- Ikon Modal -->
										<a data-bs-toggle="modal" data-bs-target="#modal-<?= $index ?>" class="icon-right"><i class="bi bi-search"></i></a>
										<!-- Modal Detail -->
										<div class="modal fade" id="modal-<?= $index ?>" tabindex="-1"
											aria-labelledby="modalLabel-<?= $index ?>" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="modalLabel-<?= $index ?>">
															Detail Produk</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<div class="card">
															<img src="<?= base_url('upload/konten/' . $ktn['foto']) ?>"
																alt="Foto Produk" class="card-img-top mb-3 img-fluid"
																style="max-width: 300px; margin: 0 auto; display: block;">

															<div class="card-body text-dark">
																<h5 class="card-title"><?= $ktn['judul'] ?></h5>
																<p class="card-text"><?= $ktn['keterangan'] ?></p>
																<h6>Rp. <?= number_format($ktn['harga'], 0, ',', '.') ?>
																</h6>
															</div>
														</div>
													</div>
													<div class="modal-footer d-flex">
														<button type="button" class="btn btn-secondary"
															data-bs-dismiss="modal">Tutup</button>
														<button type="button" class="btn btn-warning text-white"
															onclick="window.location.href='<?= base_url('keranjang') ?>'">Beli</button>
													</div>
												</div>
											</div>
										</div>
										<!-- Akhir Modal -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<!-- end food section -->

	<!-- client section -->
	<div>
		<script src="https://static.elfsight.com/platform/platform.js" async></script>
		<div class="elfsight-app-b16aa857-f9ab-46e3-a96b-c021a338f7ad" data-elfsight-app-lazy></div>
	</div>

	<!--  -->
