<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php 
                $grand_total=0;
                if ($keranjang = $this->cart->contents()){
                    foreach ($keranjang as $item){
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h5>Total Belanja Anda Rp. ".number_format($grand_total,0,',','.');
                
             ?> 

            </div><br><br>
            <h3>Masukkan Alamat Pengiriman dan Pembayaran </h3>
            <form method="post" action="<?php base_url() ?> ../dasbor/proses_pesanan">
                <div class="form-group">
                    <label for="">Nama Lengakap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat Lengakap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jasa Pengiriman</label>
                    <select name="" id="" class="form-control">
                        <option value="">JNT</option>
                        <option value="">GRAB</option>
                        <option value="">POS Indonesia</option>
                        <option value="">GOJEK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih Bank</label>
                    <select name="" id="" class="form-control">
                        <option value="">BNI - XXXXX</option>
                        <option value="">BRI - XXXXX</option>
                        <option value="">BCA - XXXXX</option>
                        <option value="">MANDIRI - XXXXX</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            </form>
            <?php 
            }else{
                echo "<h2>Keranjang Belanja Anda Masih Kosong";
            }
            ?>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>