<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> <?= $judul;?> </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/feane/css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="<?php echo base_url()?>asset/feane/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>asset/feane/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo base_url()?>asset/feane/css/responsive.css" rel="stylesheet" />
  <!-- Boostrape -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
 <!-- Isotope.js -->
 <!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script> -->

  <!--  -->
  <style>

/*  */
.options {
    display: flex; /* Atur tata letak fleksibel */
    align-items: center; /* Rata vertikal */
    justify-content: space-between; /* Elemen kiri dan kanan berada di ujung masing-masing */
}

.options h6 {
    margin: 0; /* Menghilangkan margin bawaan dari elemen <h6> */
}

.icon-container {
    display: flex; /* Membuat tata letak untuk ikon */
    align-items: center; /* Rata tengah secara vertikal */
    gap: 10px; /* Memberikan jarak antar ikon */
}

.icon-right {
    display: flex; /* Ikon mengikuti tata letak flex */
    align-items: center; /* Rata tengah pada konten ikon */
    text-decoration: none; /* Hilangkan underline */
    color: inherit; /* Warna mengikuti konteks teks */
}

.icon-right svg {
    width: 24px; /* Ukuran ikon */
    height: 24px;
    fill: currentColor; /* Warna ikon mengikuti warna teks */
}
/*  */
/* / */
.filters_menu {
    list-style: none;
    padding: 0;
    margin: 30px 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.filters_menu li {
    cursor: pointer;
    font-size: 18px;
    color: #444;
    font-weight: 500;
    padding: 5px 20px;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    border-radius: 25px;
}

.filters_menu li.active,
.filters_menu li:hover {
    background-color: #ff6f61;
    color: white;
    border-color: #ff6f61;
}
/* search */
/* Container untuk pencarian */
.search-container {
    display: flex;
    align-items: center;
    gap: 5px; /* Jarak antara input dan tombol */
}

.search-input {
    width: 150px; /* Lebar input lebih kecil */
    padding: 6px 10px; /* Padding yang lebih ringkas */
    border: 1px solid #ddd;
    border-radius: 15px; /* Sudut melengkung */
    font-size: 13px;
    outline: none;
}

.search-button {
    background-color: #FFC107; /* Warna kuning */
    color: #fff;
    border: none;
    padding: 6px 10px; /* Padding kecil untuk tombol */
    border-radius: 15px; /* Sudut melengkung */
    font-size: 13px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: #E0A800; /* Warna hover */
}

/*  */
  </style>
</head>
