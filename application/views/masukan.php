
  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <div class="col md-7">
        <h2 class="row justify-content-center">
          Masukkan
        </h2>
        <div id="alert-data" 
          data-title="<?= $this->session->flashdata('title') ?>" 
          data-text="<?= $this->session->flashdata('text') ?>" 
          data-icon="<?= $this->session->flashdata('icon') ?>">
      </div>

      </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="form_container">
            <form action="<?= base_url('masukan/simpan')?>" method="post">
              <div>
                <input type="text" name="nama" class="form-control" placeholder="Nama" />
              </div>
              <div>
                <textarea type="text" name="masukan" class="form-control" placeholder="Masukkan" id=""></textarea>
              </div>
              <div>
                <input type="number" name="no_wa" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" />
              </div>
              <div class="btn_box">
                <button>
                  Kirim
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- end book section -->

  