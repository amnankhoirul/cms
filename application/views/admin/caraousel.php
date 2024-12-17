<div class="content">
	<h1 class="h3 mb-3"><?= $title ?></h1>
	<div id="menghilang">
		<?= $this->session->flashdata('alert') ?>
	</div>
	<div class="d-flex justify-content-between flex-wrap">
		<!-- Form Foto -->
		<div class="card p-3 me-3" style="width: 48%;"> <!-- Form foto -->
			<form action="<?= base_url("admin/caraousel/simpan_foto") ?>" method="post" enctype='multipart/form-data'>
				<h5 class="card-header">Input Foto</h5>
				<div class="mb-3">
					<label for="formFile" class="form-label">Pilih Foto dengan ukuran(1:3)</label>
					<input class="form-control" type="file" name="foto" require>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>

		<!-- Form Judul -->
		<div class="card p-3" style="width: 48%;"> <!-- Form judul -->
			<form action="<?= base_url("admin/caraousel/simpan") ?>" method="post" >
				<h5 class="card-header">Input Judul & Keterangan</h5>
				<div class="col mb-3">
					<label class="form-label">Judul</label>
					<input type="text" class="form-control" placeholder="judul foto" name="judul" required />
				</div>
				<div class="col mb-3">
					<label class="form-label">Keterangan</label>
					<input type="text" class="form-control" placeholder="keterangan" name="keterangan" required />
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>

	<div class="row mt-4">
    <!-- Menampilkan Foto -->
    <div class="col-md-6"> <!-- Kolom Kiri untuk Foto -->
        <?php foreach ($foto_caraousel as $ft_crs) { ?>
            <div class="card mb-3">
                <img class="card-img-top" style="width: 100%; height: auto;" src="<?= base_url('upload/caraousel/' . $ft_crs['foto']) ?>" alt="Foto">
                <div class="card-body">
                    <a href="<?= base_url('admin/caraousel/hapus_foto/' . $ft_crs['foto']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Anda yakin untuk menghapusnya?')">Hapus</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Menampilkan Judul dan Keterangan -->
    <div class="col-md-6"> 
        <?php foreach ($caraousel as $crs) { ?>
            <div class="card mb-3">
                <div class="card-body">
				<h5 class="card-header">Hasil input Judul & Keterangan</h5>
                    <div class="mb-3">
                        <label class="form-label"><strong>Judul</strong></label>
                        <input type="text" class="form-control" value="<?= $crs['judul'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Keterangan</strong></label>
                        <textarea class="form-control" rows="3" readonly><?= $crs['keterangan'] ?></textarea>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="<?= base_url('admin/caraousel/hapus/' . $crs['id_caraousel']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Anda yakin untuk menghapusnya?')">Hapus</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</div>
