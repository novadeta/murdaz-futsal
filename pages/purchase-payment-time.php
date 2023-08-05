<?php 
  $guest = 'styles.css';
  include_once "./layouts/authorize.php";
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
  include_once "./core/TimeController.php";
  $time = new TimeController();
  $time_result = $time->show_time(["id_time" => $_GET['id_time']]);
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $request = $_POST;
    $file = $_FILES;
    $result = $time->edit_time($request,$file);
      echo "
      <script>
          alert('Berhasil Membayar')
          document.location.href = './index.php?page=menunggu-pembayaran'
      </script>
      ";
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
    <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <h3 class="text-center mb-8">Bayar Pemesanan Anda</h3>
        <form method="POST" class="w-1/2 mx-auto" enctype="multipart/form-data">
            <div>
              <p>Tanggal Beli : <?php
                $split_date = explode(" ",$time_result['date']);
                echo date('d M Y',strtotime($split_date[0]));
              ?></p>
            </div>
            <div>
              <p>Nama : <?php
                echo $time_result['username'];
              ?></p>
            </div>
            <div>
              <p>Tanggal Beli : <?php
                $split_date = explode(" ",$time_result['date']);
                echo date('d M Y',strtotime($split_date[0]));
              ?></p>
            </div>
            <div>
              <p>Jenis Waktu yang Dibeli : <?php
                echo $time_result['type_price'];
              ?></p>
            </div>
            <div>
              <p>Waktu yang Dibeli : <?php
                echo $time_result['purchased_time'];
              ?></p>
            </div>
            <input name="id_user" type="hidden" value="<?= $session_user['data']['id_user'];?>"  readonly>
            <input name="id_time" type="hidden" value="<?= $time_result['id_time'] ?>"  readonly>
            <input name="status" type="hidden" value="2"  readonly>
            <div class="flex flex-col w-full mt-4 items-start mx-auto" style="gap: 10px;">
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
              <label for="norek">Silahkan Transfer ke Rekening BCA</label>
              <p id="norek" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">88271922</p>
            </div>
            <div id="price" class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
              <p>Total yang harus dibayar</p>
              <h4 >Rp. <?= $time_result['price'] ?></h4>
              <input type="hidden" name="price"  readonly>
            </div>
            <label class="block mt-4" for="payment">Masukkan Bukti Pembayaran
                <input required name="payment" id="payment" class="block w-full text-sm text-slate-500 mt-4 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-[#5e72e3] file:text-white
                    hover:file:bg-violet-100" name="payment" id="payment" type="file" multiple require />
            </label>
            <div class="flex flex-col w-1/5 items-start mx-auto mt-4">
                  <button id="button" type="submit" class="bg-blue-500 text-md w-full ease  mx-auto rounded-lg text-white px-3 py-2">Pesan</button>
              </div>
              </form>
          </div>
      </div>
        </div>
      </div>
    </main>
  </div>
</body>

<?php 
  include_once "./layouts/main-footer.php";
?>