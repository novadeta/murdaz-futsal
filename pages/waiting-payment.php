<?php 
  include_once './layouts/authorize.php';
  $guest = 'styles.css'; 
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
  include_once "./core/TransactionController.php";
  include_once "./core/TimeController.php";
  $transaction = new TransactionController();
  $time = new TimeController();
  $result_transaction = $transaction->show_transaction(['status' => '1','id_user' => $session_user['data']['id_user']]) ?? [] ;
  $result_time = $time->get_time(['status' => 'validation_user','id_user' => $session_user['data']['id_user']]) ?? [] ;
  if(isset($_GET['action']) && $_GET['action'] == 'batal-pembelian'){
    $delete_transaction = $transaction->delete_transaction(['id_transaction' => $_GET['id_transaction'],'id_user' => $session_user['data']['id_user']]) ;
    echo "
    <script>
      alert('Berhasil Menghapus Transaksi')
      document.location.href = './index.php?page=menunggu-pembayaran'
    </script>
    ";
  }
  if(isset($_GET['action']) && $_GET['action'] == 'batal-pembelian-waktu'){
    $delete_time = $time->delete_time(['id_time' => $_GET['id_transaction'],'id_user' => $session_user['data']['id_user']]) ;
    echo "
    <script>
      alert('Berhasil Menghapus Transaksi Waktu')
      document.location.href = './index.php?page=menunggu-pembayaran'
    </script>
    ";
  }
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full flex max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      <!-- cards -->
      <div class="w-full px-6  mx-auto">
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:flex-none">
            <h3 class="capitalize rounded-5 bg-white p-6 mb-6 text-center">Menunggu Pembayaran</h3>
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
              <h6 class="capitalize dark:text-white">Booking Lapangan</h6>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6>Tabel Booking Lapangan</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pembelian</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Main</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach ($result_transaction as $result) {
                          ?>
                            <tr>
                              <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?php 
                                  $split = explode(" ",$result['date']);
                                  echo $split[0];
                                  echo"<br> Jam : "; 
                                  echo $split[1]; 
                                ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?= $result['date_play'] ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                 <p class="mb-0 font-semibold leading-tight text-xs justify-center flex">
                                 <span class="bg-gradient-to-tl 
                                 <?= $result['status'] == '0'  ? 'from-red-500 to-red-400' 
                                  : ($result['status'] == "1" ? "from-yellow-500 to-yellow-400" 
                                  : ($result['status'] == "2"  ? "from-emerald-500 to-teal-400" 
                                  : ($result['status'] == "3" ? "from-emerald-500 to-teal-400" : "" )))
                                ?> px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"> 
                                <?= ($result['status'] == '0') ?  "Dibatalkan" : '' ?> 
                                <?= ($result['status'] == '1') ?  "Menunggu Pembayaran" : '' ?> 
                                <?= ($result['status'] == '2') ?  "Menunggu Validasi" : '' ?> 
                                <?= ($result['status'] == '3') ?  "Lunas" : '' ?> 
                              </span>
                              
                              </p>
                              </td>
                              <td class=" p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent flex justify-center gap-5">
                                <a class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=pemesanan/bayar-pembelian&id_transaction=<?= $result['id_transaction']; ?>">Bayar</a>
                                <a class="bg-gradient-to-tl from-red-500 to-red-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=menunggu-pembayaran&action=batal-pembelian&id_transaction=<?= $result['id_transaction']; ?>" onclick="javascript: return confirm ('Apakah Anda Ingin Menghapus Data Ini ?')" >Cancel</a>
                              </td>
                          </tr> 
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Pesan Waktu</h6>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6>Tabel Pesan Waktu</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pembelian</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Main</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach ($result_time as $result) {
                          ?>
                            <tr>
                              <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?php 
                                  $split = explode(" ",$result['date']);
                                  echo $split[0];
                                  echo"<br> Jam : "; 
                                  echo $split[1]; 
                                ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?= $result['purchased_time'] ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                 <p class="mb-0 font-semibold leading-tight text-xs justify-center flex">
                                 <span class="bg-gradient-to-tl 
                                 <?= $result['status_payment'] == '0'  ? 'from-red-500 to-red-400' 
                                  : ($result['status_payment'] == "1" ? "from-yellow-500 to-yellow-400" 
                                  : ($result['status_payment'] == "2"  ? "from-emerald-500 to-teal-400" 
                                  : ($result['status_payment'] == "3" ? "from-emerald-500 to-teal-400" : "" )))
                                ?> px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"> 
                                <?= ($result['status_payment'] == '0') ?  "Dibatalkan" : '' ?> 
                                <?= ($result['status_payment'] == '1') ?  "Menunggu Pembayaran" : '' ?> 
                                <?= ($result['status_payment'] == '2') ?  "Menunggu Validasi" : '' ?> 
                                <?= ($result['status_payment'] == '3') ?  "Lunas" : '' ?> 
                              </span>
                              
                              </p>
                              </td>
                              <td class=" p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent flex justify-center gap-5">
                                <a class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=pemesanan/bayar-pembelian-waktu&id_time=<?= $result['id_time']; ?>">Bayar</a>
                                <a class="bg-gradient-to-tl from-red-500 to-red-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=menunggu-pembayaran&action=batal-pembelian-waktu&id_time=<?= $result['id_time']; ?>" onclick="javascript: return confirm ('Apakah Anda Ingin Membatalkan Transaksi ?')" >Cancel</a>
                              </td>
                          </tr> 
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:flex-none">
            <h3 class="capitalize rounded-5 bg-white  p-6 text-center mb-6">Menunggu Validasi</h3>
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
              <h6 class="capitalize dark:text-white">Booking Lapangan</h6>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6>Tabel Booking Lapangan</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pembelian</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Main</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach ($result_transaction as $result) {
                          ?>
                            <tr>
                              <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?php 
                                  $split = explode(" ",$result['date']);
                                  echo $split[0];
                                  echo"<br> Jam : "; 
                                  echo $split[1]; 
                                ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?= $result['date_play'] ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                 <p class="mb-0 font-semibold leading-tight text-xs justify-center flex">
                                 <span class="bg-gradient-to-tl 
                                 <?= $result['status'] == '0'  ? 'from-red-500 to-red-400' 
                                  : ($result['status'] == "1" ? "from-yellow-500 to-yellow-400" 
                                  : ($result['status'] == "2"  ? "from-emerald-500 to-teal-400" 
                                  : ($result['status'] == "3" ? "from-emerald-500 to-teal-400" : "" )))
                                ?> px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"> 
                                <?= ($result['status'] == '0') ?  "Dibatalkan" : '' ?> 
                                <?= ($result['status'] == '1') ?  "Menunggu Pembayaran" : '' ?> 
                                <?= ($result['status'] == '2') ?  "Menunggu Validasi" : '' ?> 
                                <?= ($result['status'] == '3') ?  "Lunas" : '' ?> 
                              </span>
                              
                              </p>
                              </td>
                              <td class=" p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent flex justify-center gap-5">
                                <a class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=pemesanan/bayar-pembelian&id_transaction=<?= $result['id_transaction']; ?>">Bayar</a>
                                <a class="bg-gradient-to-tl from-red-500 to-red-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=menunggu-pembayaran&action=batal-pembelian&id_transaction=<?= $result['id_transaction']; ?>" onclick="javascript: return confirm ('Apakah Anda Ingin Menghapus Data Ini ?')" >Cancel</a>
                              </td>
                          </tr> 
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Pesan Waktu</h6>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6>Tabel Pesan Waktu</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pembelian</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Main</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach ($result_time as $result) {
                          ?>
                            <tr>
                              <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?php 
                                  $split = explode(" ",$result['date']);
                                  echo $split[0];
                                  echo"<br> Jam : "; 
                                  echo $split[1]; 
                                ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?= $result['purchased_time'] ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                 <p class="mb-0 font-semibold leading-tight text-xs justify-center flex">
                                 <span class="bg-gradient-to-tl 
                                 <?= $result['status_payment'] == '0'  ? 'from-red-500 to-red-400' 
                                  : ($result['status_payment'] == "1" ? "from-yellow-500 to-yellow-400" 
                                  : ($result['status_payment'] == "2"  ? "from-emerald-500 to-teal-400" 
                                  : ($result['status_payment'] == "3" ? "from-emerald-500 to-teal-400" : "" )))
                                ?> px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"> 
                                <?= ($result['status_payment'] == '0') ?  "Dibatalkan" : '' ?> 
                                <?= ($result['status_payment'] == '1') ?  "Menunggu Pembayaran" : '' ?> 
                                <?= ($result['status_payment'] == '2') ?  "Menunggu Validasi" : '' ?> 
                                <?= ($result['status_payment'] == '3') ?  "Lunas" : '' ?> 
                              </span>
                              
                              </p>
                              </td>
                              <td class=" p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent flex justify-center gap-5">
                                <a class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=pemesanan/bayar-pembelian-waktu&id_time=<?= $result['id_time']; ?>">Bayar</a>
                                <a class="bg-gradient-to-tl from-red-500 to-red-400 px-2 text-xs rounded-1.8 py-3 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="index.php?page=menunggu-pembayaran&action=batal-pembelian-waktu&id_time=<?= $result['id_time']; ?>" onclick="javascript: return confirm ('Apakah Anda Ingin Membatalkan Transaksi ?')" >Cancel</a>
                              </td>
                          </tr> 
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end cards -->
    </main>
  </div>

<?php 
  include_once "./layouts/main-footer.php";
?>