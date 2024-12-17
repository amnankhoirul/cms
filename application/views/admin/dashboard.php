<div class="col-md-12 mb-lg-0 mb-4">
	<div class="card mt-4">
		<div class="card-header pb-0 p-3">
			<div class="row">
				<div class="col-6 d-flex align-items-center">
					<h3 class="mb-0"><?= $this->session->userdata('nama'); ?></h3>
				</div>
				<div class="col-6 text-end">
					<a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"
							aria-hidden="true"></i>&nbsp;&nbsp;Add New Card</a>
				</div>
			</div>
		</div>
		<div class="card-body p-3">
			<div class="row">
				<div class="col-md-6 mb-md-0 mb-4">
					<div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
						<img class="w-10 me-3 mb-0" src="<?= base_url('asset/soft-ui-dashboard/')?>assets/img/logos/mastercard.png" alt="logo">
						<h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
						<i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip"
							data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Card"
							aria-label="Edit Card"></i><span class="sr-only">Edit Card</span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
						<img class="w-10 me-3 mb-0" src="<?= base_url('asset/soft-ui-dashboard/')?>assets/img/logos/visa.png" alt="logo">
						<h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
						<i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip"
							data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Card"
							aria-label="Edit Card"></i><span class="sr-only">Edit Card</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--  -->
<div class="row">
    <!-- Masukan -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Masukan</p>
                            <h5 class="font-weight-bolder mb-0">
                                <?= $masukan_count ?>
                                <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <a href="<?= base_url('admin/masukan') ?>"><i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Konten -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Kategori Konten</p>
                            <h5 class="font-weight-bolder mb-0">
                                <?= $kategori_konten_count ?>
                                <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <a href="<?= base_url('admin/kategori') ?>"><i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">User</p>
                            <h5 class="font-weight-bolder mb-0">
                                <?= $user_count ?>
                                <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <a href="<?= base_url('admin/user') ?>"><i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Konten</p>
                            <h5 class="font-weight-bolder mb-0">
                                <?= $konten_count ?>
                                <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <a href="<?= base_url('admin/konten') ?>"><i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
