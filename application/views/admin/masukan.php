<main class="content">
<!-- <div id="menghilang">
	<?= $this->session->flashdata('alert') ?>
</div> -->
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><?= $title ?></h1>
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
									<th>Nama</th>
									<th>No_wa</th>
									<th>Email</th>
									<th>Masukan</th>
									<!-- <th>Aksi</th> -->
									<!-- <th class="d-none d-md-table-cell">Assignee</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($masukan as $msk) { ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $msk['nama'] ?></td>
										<td><?= $msk['no_wa'] ?></td>
										<td><?= $msk['email'] ?></td>
										<!-- <td><?= $msk['masukan'] ?></td> -->
										<td>
											<a style="text-decoration:none;" data-bs-toggle="modal"
												data-bs-target="#edit<?= $msk['id_masukan'] ?>">
											</a>

											<!-- Button trigger modal -->
											<a data-bs-toggle="modal" data-bs-target="#konten<?= $no; ?>">
												<span class="badge badge-sm bg-gradient-success">Lihat</span>
											</a>
											<a style="text-decoration:none;"
												href="<?php echo site_url('admin/masukan/hapus/' . $msk['id_masukan']) ?>"
												onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
												<span class="badge badge-sm bg-gradient-danger">Hapus</span>
											</a>
											<!-- Modal -->
											<div class="modal fade" id="konten<?= $no; ?>" tabindex="-1"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Halaman Masukan</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url('admin/masukan/balas') ?>" method="post" enctype='multipart/form-data'>
															<input type="hidden" name="id_masukan" value="<?= $msk['id_masukan'] ?>">
																<div class="card-body">
																	<label class="form-label">Masukan</label>
																		<textarea name="masukan" class="form-control" readonly><?= $msk['masukan'] ?></textarea>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary"
																		data-bs-dismiss="modal">Tutup</button>
																</div>
															</form>

														</div>
													</div>
												</div>
											</div>
										</td>
										<!-- <td>
											<a style="text-decoration:none;"
												href="<?php echo site_url('admin/masukan/hapus/' . $msk['id_masukan']) ?>"
												onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
												<span class="badge badge-sm bg-gradient-danger">Hapus</span>
											</a>
											<a style="text-decoration:none;" data-bs-toggle="modal"
												data-bs-target="#edit<?= $msk['id_masukan'] ?>">
											</a>

											Button trigger modal
											<a data-bs-toggle="modal" data-bs-target="#konten<?= $no; ?>">
											<span class="badge badge-sm bg-gradient-success">Balas</span>
											</a>
											Modal
											<div class="modal fade" id="konten<?= $no; ?>" tabindex="-1"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Halaman Balas</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url('admin/masukan/balas') ?>" method="post" enctype='multipart/form-data'>
															<input type="hidden" name="id_masukan" value="<?= $msk['id_masukan'] ?>">
																<div class="card-body">
																	<label class="form-label">Masukan</label>
																		<textarea name="masukan" class="form-control" readonly><?= $msk['masukan'] ?></textarea>
																</div>
																<div class="card-body">
																	<label class="form-label">Email</label>
																		<input name="email" class="form-control" value="<?= $msk['email'] ?>" readonly></input>
																</div>
																<div class="card-body">
																	<label class="form-label">Balas</label>
																		<textarea name="balas" class="form-control"></textarea>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary"
																		data-bs-dismiss="modal">Batal</button>
																	<button type="submit"
																		class="btn btn-primary">Balas</button>
																</div>
															</form>

														</div>
													</div>
												</div>
											</div>
										</td> -->
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