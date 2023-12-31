<?php 
  include_once './layouts/authorize-guest.php';
  include_once "./layouts/guest-header.php";
  $guest = 'styles.css'; 
  include_once "./core/TransactionController.php";
  include_once "./core/TimeController.php";
  $transaction = new TransactionController();
  $time = new TimeController();
  $result_transaction = $transaction->get_transaction(['status' => 'validation']) ;
  $result_time = $time->get_time(['status' => 'validation']) ?? [] ;
  if(isset($_GET['action']) && $_GET['action'] == 'hapus_time'){
    $request = $_GET;
    $file = $_FILES;
    $delete_transaction = $time->delete_time($request,$file) ;
    echo "
    <script>
    alert('Berhasil Menghapus Transaksi')
    document.location.href = './index.php?page=guest/validasi'
    </script>
    ";
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['id_transaction'])) {
      $request = $_POST;
      $file = $_FILES;
      $edit_time = $transaction->edit_transaction($request,$file);
      echo "
      <script>
      alert('Berhasil Menerima Transaksi')
      document.location.href = './index.php?page=guest/validasi'
      </script>
      ";
    }
    if (isset($_POST['id_time'])) {
      $request = $_POST;
      $file = $_FILES;
      $edit_time = $time->edit_time($request,$file);
      echo "
      <script>
      alert('Berhasil Menerima Transaksi')
      document.location.href = './index.php?page=guest/validasi'
      </script>
      ";
    }
  }
  elseif (isset($_GET['action']) && $_GET['action'] == 'terima') {
    $request = $_GET;
    $acc_transaction = $transaction->edit_transaction($_GET);
    echo "
    <script>
    alert('Berhasil Menerima Transaksi')
    document.location.href = './index.php?page=guest/validasi'
    </script>
    ";
  }
  elseif (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $request = $_GET;
    $delete_transaction = $transaction->delete_transaction(($_GET));
    echo "
    <script>
    alert('Berhasil Membatalkan Transaksi')
    document.location.href = './index.php?page=guest/validasi'
    </script>
    ";
  }
?>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Validasi Pembayaran</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Validasi Pembayaran</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
              </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              <li class="relative flex items-center pr-2">
                <p class="hidden transform-dropdown-show"></p>
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger aria-expanded="false">
                  <i class="cursor-pointer fa fa-bell"></i>
                </a>

                <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                  <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New message</span> from Laur</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative mb-2">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New album</span> by Travis Scott</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative">
                    <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment successfully completed</h6>
                          <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                            <i class="mr-1 fa fa-clock"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <h6 class="mb-0 dark:text-white">Validasi Pembayaran Booking</h6>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <?php 
                    foreach ($result_transaction as $result) {
                    ?>
                   <li class="relative flex p-6 mt-4 mb-2 border-0 rounded-b-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                      <div class="flex flex-col">
                        <div class="flex flex-col">
                          <h6 class="mb-4 text-sm leading-normal dark:text-white"><?= $result['username'] ?></h6>
                          <span class="mb-2 text-xs leading-tight dark:text-white/80">Tanggal Beli: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"><?= date("d-m-Y", strtotime($result['date'])) ?></span></span>
                          <span class="mb-2 text-xs leading-tight dark:text-white/80">Tanggal Bermain: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"><?= date("d-m-Y",strtotime($result['date_play'])) ?></span></span>
                          <span class="mb-2 text-xs leading-tight dark:text-white/80">Waktu Mulai: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"><?= $result['start_time'] ?></span></span>
                          <span class="mb-2 text-xs leading-tight dark:text-white/80">Waktu Berakhir: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"></span><?= $result['end_time'] ?></span>
                          <span class="mb-2 text-xs leading-tight dark:text-white/80">Total Harga: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"></span><?= $result['price'] ?></span>
                        </div>
                        <div>
                          <img width="200"  src="<?= $url .'/assets/photo_payments/'. $result['payment'] ?>" alt="" srcset="">
                        </div>
                      </div>
                      <div class="ml-auto text-right">
                        <a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-blue-700" href="./index.php?page=guest/validasi&action=terima&id_transaction=<?= $result['id_transaction'] ?>">Terima</a>
                        <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"  href="./index.php?page=guest/validasi&action=hapus&id_transaction=<?= $result['id_transaction'] ?>" onclick="javascript: return confirm('Apakah ingin membatalkan?')">Batalkan</a>
                      </div>
                  </li>
                    <?php
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <h6 class="mb-0 dark:text-white">Validasi Pembayaran Waktu</h6>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <?php 
                    foreach ($result_time as $result) {
                    ?>
                  <li class="relative flex p-6 mt-4 mb-2 border-0 rounded-b-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
                    <div class="flex flex-col">
                      <h6 class="mb-4 text-sm leading-normal dark:text-white"></h6>
                      <span class="mb-2 text-xs leading-tight dark:text-white/80">Tanggal Beli: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"><?= date("d-m-Y", strtotime($result['date'])) ?></span></span>
                      <span class="mb-2 text-xs leading-tight dark:text-white/80">Jam yang dibeli: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"><?= explode(":",$result['purchased_time'])[0] ?> Jam </span></span>
                      <span class="text-xs leading-tight dark:text-white/80">Harga: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2"><?= $result['price'] ?? '0' ?></span></span>
                      <div class="mt-5">
                        <img width="200"  src="<?= $url .'/assets/photo_payments/'. $result['payment'] ?>" alt="" srcset="">
                        </div>
                    </div>
                    <div class="ml-auto text-right">
                      <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text" href="index.php?page=guest/validasi&action=hapus_time&id_time=<?= $result['id_time'] ?>"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Batal</a>
                      <form method="POST">
                        <input type="hidden" name="id_time" value="<?= $result['id_time'] ?>" readonly>
                        <input type="hidden" name="role" value="<?= $session_user['data']['id_user'] ?>" readonly>
                        <input type="hidden" name="purchased_time" value="<?= $result['purchased_time'] ?>" readonly>
                        <button type="submit" class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Terima</button>
                      </form>
                    </div>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
              </div>
          </div>
          </div>
        </div>

      </div>
    </main>
<?php 
  include_once "./layouts/guest-footer.php";
?>