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
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Table Kategori</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('admin/kategori/simpan') ?>" method="post">
							<div class="card-body">
								<label class="form-label">Nama Kategori</label>
								<input name="nama_kategori" type="text" class="form-control" placeholder="Nama">
							</div>
							<!-- <button class="btn btn-primary btn-lg">Simpan</button> -->
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
									<th>Name kategori konten</th>
									<th>Aksi</th>
									<!-- <th class="d-none d-md-table-cell">Assignee</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
									foreach($kategori as $ktg){ ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $ktg ['nama_kategori'] ?></td>
									<td>
										<a style="text-decoration:none;"
											href="<?php echo site_url('admin/kategori/hapus/'.$ktg['id_kategori']) ?>"
											onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
											<span class="badge badge-sm bg-gradient-danger">Hapus</span>
										</a>
										<a type="button" style="text-decoration:none;" data-bs-toggle="modal"
											data-bs-target="#edit<?= $ktg ['id_kategori'] ?>">
											<span class="badge badge-sm bg-gradient-success">Edit</span>
										</a>
										<!-- modal -->
										<div class="modal fade" id="edit<?= $ktg ['id_kategori'] ?>" tabindex="-1"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Table Edit
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url('admin/kategori/update') ?>"
															method="post">
															<input type="hidden" name="id_kategori"
																value="<?= $ktg ['id_kategori'] ?>">
															<div class="card-body">
																<label class="form-label">Nama kategori</label>
																<input name="nama_kategori" type="text" class="form-control"
																	value="<?= $ktg['nama_kategori'] ?>">
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
								<?php $no++; }  ?>
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
