<main class="content">
<div id="menghilang">
	<?= $this->session->flashdata('alert') ?>
</div>
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><?= $title ?></h1>
		<!--  -->
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Tambah
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Table Konten</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('admin/konten/simpan') ?>" method="post"
							enctype='multipart/form-data'>
							<div class="card-body">
								<label class="form-label">Judul</label>
								<input name="judul" type="text" class="form-control" placeholder="judul">
							</div>
							<div class="card-body">
								<label class="form-label">Kategori</label>
								<select name="id_kategori" class="form-control">
									<?php foreach ($kategori as $ktg) { ?>
										<option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="card-body">
								<label class="form-label">Keterangan</label>
								<input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
							</div>
							<div class="card-body">
								<label class="form-label">Harga</label>
								<input name="harga" type="number" class="form-control" placeholder="harga">
							</div>
							<div class="card-body">
								<label class="form-label">Foto</label>
								<input name="foto" type="file" class="form-control" accept="image/png, image/jpeg"
									placeholder="Foto">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!--  -->
		<!--  -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<!-- <h5 class="card-title mb-0">Empty card</h5> -->
						<!--  -->
						<table class="table table-hover my-0">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Harga</th>
									<th>Tanggal</th>
									<th>Kreator</th>
									<th>Foto</th>
									<th>Aksi</th>
									<!-- <th class="d-none d-md-table-cell">Assignee</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($konten as $ktg) { ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $ktg['judul'] ?></td>
										<td><?= $ktg['nama_kategori'] ?></td>
										<td><?= $ktg['harga'] ?></td>
										<td><?= $ktg['tgl'] ?></td>
										<td><?= $ktg['nama'] ?></td>
										<td>
											<a style="text-decoration:none;"
												href="<?= base_url('upload/konten/' . $ktg['foto']) ?>" target="_blank">
												<span class="badge badge-sm bg-gradient-primary">Lihat Foto</span>
											</a>
										</td>
										<td>
											<a style="text-decoration:none;"
												href="<?php echo site_url('admin/konten/hapus/' . $ktg['foto']) ?>"
												onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
												<span class="badge badge-sm bg-gradient-danger">Hapus</span>
											</a>
											<a style="text-decoration:none;" data-bs-toggle="modal"
												data-bs-target="#edit<?= $ktg['foto'] ?>">
											</a>

											<!-- Button trigger modal -->
											<a data-bs-toggle="modal" data-bs-target="#konten<?= $no; ?>">
											<span class="badge badge-sm bg-gradient-success">Edit</span>
											</a>
											<!-- Modal -->
											<div class="modal fade" id="konten<?= $no; ?>" tabindex="-1"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel"><?= $ktg['judul'] ?></h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url('admin/konten/update') ?>" method="post" enctype='multipart/form-data'>
																<input type="hidden" name="nama_foto" value="<?= $ktg['foto'] ?>">
																<div class="card-body">
																	<label class="form-label">Judul</label>
																	<input name="judul" type="text" class="form-control"
																		value="<?= $ktg['judul'] ?>">
																</div>
																<div class="card-body">
																	<label class="form-label">Kategori</label>
																	<select name="id_kategori" class="form-control">
																		<?php foreach ($kategori as $kti) { ?>
																			<option 
																				<?php if ($kti['id_kategori'] == $ktg['id_kategori']){echo "selected";} ?>
																					value="<?= $kti['id_kategori'] ?>">
																					<?= $kti['nama_kategori'] ?>
																				</option>
																		<?php } ?>
																	</select>
																</div>
																<div class="card-body">
																	<label class="form-label">Keterangan</label>
																	<textarea name="keterangan" class="form-control"><?= $ktg['keterangan'] ?></textarea>
																</div>

																<div class="card-body">
																	<label class="form-label">Harga</label>
																		<input name="harga" class="form-control" value="<?= $ktg['harga'] ?>"></input>
																</div>
																<div class="card-body">
																	<label class="form-label">Foto</label>
																	<input name="foto" type="file" class="form-control"
																		accept="image/png, image/jpeg" placeholder="Foto">
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary"
																		data-bs-dismiss="modal">Batal</button>
																	<button type="submit"
																		class="btn btn-primary">Simpan</button>
																</div>
															</form>

														</div>
													</div>
												</div>
											</div>
										</td>


										<!-- <td class="d-none d-md-table-cell">Vanessa Tucker</td> -->
									</tr>
								<?php  $no++; } ?>
							</tbody>
						</table>
						<!--  -->

					</div>
					<div class="card-body">
					</div>
				</div>
			</div>
		</div>

	</div>
</main>