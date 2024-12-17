<div class="content">
<h1 class="h3 mb-3"><?= $title ?></h1>
	<div id="menghilang">
		<?= $this->session->flashdata('alert') ?>
	</div>
	<div class="modal-body">
		<div class="card">
			<div class="card-header">
				<form action="<?= base_url('admin/konfigurasi/update') ?>" method="post" >
					<div class="card-body">
						<label class="form-label">Judul Website</label>
						<input class="form-control" name="judul_website" value="<?= $konfig->judul_website;?>"></input>
					</div>
					<div class="card-body">
						<label class="form-label">Profil</label>
						<textarea class="form-control" name="profil_website"><?= $konfig->profil_website; ?></textarea>
					</div>
					<div class="card-body">
						<label class="form-label">Instagram</label>
						<input type="text" class="form-control"  name="ig" value="<?= $konfig->ig; ?>">
					</div>
				
					<div class="card-body">
						<label class="form-label">Facebook</label>
						<input type="text" class="form-control"  name="fb" value="<?= $konfig->fb; ?>">
					</div>
				
					<div class="card-body">
						<label class="form-label">Email</label>
						<input type="email" class="form-control"  name="email" value="<?= $konfig->email; ?>" required />
					</div>
			
					<div class="card-body">
						<label class="form-label">Alamat</label>
						<input type="text" class="form-control"  name="alamat" value="<?= $konfig->alamat; ?>" required />
					</div>
				
					<div class="card-body">
						<label class="form-label">Whatsapp</label>
						<input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa; ?>" required />
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


