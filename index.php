<?php 
$url = './pages/';
$page = '';

if (isset($_GET['qrcode'])) {
  include $url . 'input-qrcode.php';
  return;
}

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    // user
    case 'login':
      include $url . 'login.php';
      break;
    case 'register':
      include $url . 'register.php';
      break;
    case 'logout':
      include $url . 'logout.php';
      break;
    case 'dashboard':
      include $url . 'dashboard.php';
      break;
    case 'pemesanan/main':
      include $url . 'booking-play.php';
      break;
    case 'pemesanan/bayar-pembelian':
      include $url . 'purchase-payment.php';
      break;
      case 'pemesanan/waktu':
        include $url . 'booking-time.php';
        break;
      case 'pemesanan/bayar-pembelian-waktu':
        include $url . 'purchase-payment-time.php';
        break;
    case 'riwayat-pemesanan':
      include $url . 'history-payment.php';
      break;
    case 'menunggu-pembayaran':
      include $url . 'waiting-payment.php';
      break;
    case 'scan-qr':
      include $url . 'scan-qr.php';
      break;
    case 'form-qrcode':
      include $url . 'input-qrcode.php';
      break;
    // admin
    case 'guest/dashboard':
      include 'guest/dashboard.php';
      break; 
    case 'guest/pemesanan':
      include 'guest/history-transaction.php';
      break; 
    case 'guest/pemesanan/laporan':
      include 'guest/report-transaction.php';
      break; 
    case 'guest/booking':
      include 'guest/booking.php';
      break; 
    case 'guest/validasi':
      include 'guest/validation.php';
      break; 
    case 'guest/lapangan':
      include 'guest/field.php';
      break;
    case 'guest/lapangan/edit':
      include 'guest/edit-field.php';
      break;
    case 'guest/pengguna':
      include 'guest/users.php';
      break;
    case 'guest/pengguna/detail':
      include 'guest/detail-user.php';
      break;
    case 'guest/profil':
      include 'guest/profile.php';
      break;  
    case 'guest/profil/edit':
      include 'guest/edit-profile.php';
      break;  
    case 'guest/logout':
      include 'guest/logout.php';
      break;   
    default:
      include $url . 'not-found.php';
      break;
  }
}else {
  include $url . 'index.php';
}
?>

