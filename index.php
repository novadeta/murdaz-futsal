<?php 
// if ($_SERVER['URI']) {
//   # code...
// }
$url = './pages/';
$page = '';
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
    case 'dashboard':
      include $url . 'dashboard.php';
      break;
    case 'pemesanan/main':
      include $url . 'booking-play.php';
      break;
    case 'pemesanan/waktu':
      include $url . 'booking-time.php';
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
    // admin
    case 'guest/dashboard':
      include 'guest/dashboard.php';
      break; 
    case 'guest/pemesanan':
      include 'guest/billing.php';
      break; 
    case 'guest/lapangan':
      include 'guest/tables.php';
      break;
    case 'guest/profile':
      include 'guest/profile.php';
      break;  
    default:
      include $url . 'not-found.php';
      break;
  }
}else {
  include $url . 'index.php';
}
?>