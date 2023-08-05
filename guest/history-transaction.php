<?php 
  $guest = 'styles.css';
  include_once "./core/TransactionController.php";
  include_once "./layouts/guest-header.php";
  $transaction = new TransactionController();
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $result_transaction = $transaction->get_transaction(['status' => 'search','search' => $_POST['search']]) ?? [];
  }else{
    $result_transaction = $transaction->get_transaction(['status' => 'history']) ?? [];
  }
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      <!-- cards -->
      <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h3 class="capitalize dark:text-white text-center">Laporan Transaksi</h3>
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60 text-center">
                  <?= date("d M Y") ?>
                </p>
                <div class="flex justify-between">
                <div class="col-mid-4">
                  <form method="post" class="flex items-center gap-2">
                    <label>Masukkan Kata Kunci</label>
                    <input type="text" name="search" class="border-2 border-blue-500 rounded-1">
                    <button type="submit" class="bg-gradient-to-tl  from-blue-500 to-blue-400 px-2 text-xs mx-2 rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="./index.php?page=guest/pemesanan/laporan">
                      Cari
                    </button>
                  </form>
                </div>
                <a class="bg-gradient-to-tl  from-blue-500 to-blue-400 px-2 text-xs  rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="./index.php?page=guest/pemesanan/laporan">
                  Cetak Laporan
                </a>
                </div>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Panjang</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Username</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal dan Waktu Pesan</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Main</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Mulai</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berakhir</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Foto Pembayaran</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php 
                            $no = 1;
                            foreach ($result_transaction as $result) {
                          ?>
                          <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <div class="flex px-4 py-1">
                                <div class="flex flex-col justify-center">
                                  <p class=" mb-0 font-semibold  leading-normal text-md"><?= $result['fullname'] ?? "Tidak ada nama" ?></p>
                                </div>
                              </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['username'] ?></p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['date'] ?></p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['date_play'] ?></p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['start_time'] ?></p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['end_time'] ?></p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['price'] ?></p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
              <img width="100" src="<?= $url .'/assets/photo_payments/'.$result['payment'] ?>" alt="" srcset=""></td>
                            <!-- <p class="mb-0 font-semibold leading-normal text-md"><?= $result['payment'] ?></p> -->
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
</body>

<?php 
  include_once "./layouts/guest-footer.php";
  ?>