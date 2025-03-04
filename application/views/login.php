<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Login</h1>
							<p class="lead">
								Selamat Datang 
							</p>
						</div>
						<div id="menghilang"></div>
						<?= $this->session->flashdata('alert')?>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<!-- <img src="<?php echo base_url()?>asset/adminkit/static/img/avatars/avatar.jpg" alt="Charles Hall"
											class="img-fluid rounded-circle" width="132" height="132" /> -->
									</div>
									<form action="<?= base_url('admin/auth/login') ?>" method="post" >
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username"
												placeholder="Enter your Username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password"
												placeholder="Enter your password" />
											<!-- <small>
												<a href="index.html">Forgot password?</a>
											</small> -->
										</div>
										<!-- <div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me"
													name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
										</div> -->
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-primary">Sign in</button>
											<!-- <button href="<?php base_url('auth/register') ?>" class="btn btn-primary">Sign up</button> -->
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>
	<script>
    <?php if ($this->session->flashdata('alert')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?php echo $this->session->flashdata('alert'); ?>',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>
	</script>
</body>
