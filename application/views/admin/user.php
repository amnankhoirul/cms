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
						<h5 class="modal-title" id="exampleModalLabel">Table Tambah User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('admin/user/simpan') ?>" method="post">
							<div class="card-body">
								<label class="form-label">Username</label>
								<input name="username" type="text" class="form-control" placeholder="Username">
							</div>
							<div class="card-body">
								<label class="form-label">Nama</label>
								<input name="nama" type="text" class="form-control" placeholder="Nama">
							</div>
							<div class="card-body">
								<label class="form-label">Password</label>
								<input name="password" type="password" class="form-control" placeholder="Password">
							</div>
							<div class="card-body">
								<label class="form-label">Level</label>
								<select class="form-control" name="level">
									<option value="Admin">Admin</option>
									<option value="User">User</option>
								</select>
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
									<th>Username</th>
									<th class="d-none d-xl-table-cell">Nama</th>
									<th class="d-none d-xl-table-cell">Level</th>
									<th>Aksi</th>
									<!-- <th class="d-none d-md-table-cell">Assignee</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
									foreach($user as $usr){ ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $usr ['username'] ?></td>
									<td class="d-none d-xl-table-cell"><?= $usr ['nama'] ?></td>
									<td class="d-none d-xl-table-cell"><?= $usr ['level'] ?></td>
									<td>
										<a style="text-decoration:none;"
											href="<?php echo site_url('admin/user/hapus/'.$usr['id_user']) ?>"
											onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
											<span class="badge badge-sm bg-gradient-danger">Hapus</span>
										</a>
										<a type="button" style="text-decoration:none;" data-bs-toggle="modal"
											data-bs-target="#edit<?= $usr ['id_user'] ?>">
											<span class="badge badge-sm bg-gradient-success">Edit</span>
										</a>
										<!-- modal -->
										<div class="modal fade" id="edit<?= $usr ['id_user'] ?>" tabindex="-1"
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
														<form action="<?= base_url('admin/user/update') ?>"
															method="post">

															<input type="hidden" name="id_user"
																value="<?= $usr ['id_user'] ?>">
															<div class="card-body">
																<label class="form-label">Username</label>
																<input name="username" type="text" class="form-control"
																	placeholder="<?= $usr ['username'] ?>" readonly>
															</div>
															<div class="card-body">
																<label class="form-label">Nama</label>
																<input name="nama" type="text" class="form-control"
																	value="<?= $usr['nama'] ?>">
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
								<?php };  ?>
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
