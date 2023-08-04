<?php 
  $guest = 'styles.css';
  include_once "./layouts/authorize.php";
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
  include_once "./core/TransactionController.php";
  include_once "./core/TimeController.php";
  include_once "./core/FieldController.php";
  $time = new TimeController();
  $field = new FieldController();
  $transaction = new TransactionController();
  $qrcode = $_GET['qrcode'];
  $field_result = $field->show_field(['qrcode' => 'http://'.$_SERVER['SERVER_NAME'].'/futsal?qrcode=' . $_GET['qrcode']]);
  if (!isset($field_result)) {
    header('Location: ./index.php');
  }
  $time_result = $time->get_time(['id_user' => $session_user['data']['id_user']]);
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $request = $_POST;
    $time_ = $time->time_qrcode($request);
    $transaction_ = $transaction->transaction_qrcode($request);
    if (isset($transaction_['error'])) {
        echo "<script>
          alert('$transaction_[error]')
          document.location.href = location.href
        </script>";
        return false;
    }
  }
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <div class="w-full px-6 py-6 mx-auto">

  <div class="flex flex-wrap mt-6 -mx-3">
    <div class="w-full max-w-full px-3 mt-0 lg:w-8/12 lg:flex-none mx-auto">
      <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h3 class="capitalize dark:text-white text-center">Jam yang dimiliki</h3>
              </div>
          <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top  text-slate-500">
                        <thead class="align-bottom">
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Normal</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Malam</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Hari Libur</th>
                        </thead>
                        <tbody>
                          <tr>
                            <?php 
                          foreach ($time_result as $result) {
                            ?>
                            <td class="p-2 align-middle bg-transparent whitespace-nowrap shadow-transparent">
                              <div class="flex px-2 py-1 justify-center">
                                <div class="flex flex-col justify-center">
                                  <h2 class="mb-0 font-semibold text-center leading-normal text-md"><?= $result['time'][0] .''. $result['time'][1] ?> Jam</h2>
                                </div>
                              </div>
                            </td>
                          <?php
                            }
                            ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
                <p id="date-booking" class=" mb-0 text-sm leading-normal py-2 px-2 rounded-3 text-white dark:opacity-60 text-center mx-auto bg-[#5E72E4]" style="width: 120px;">
                  <?= date("d M Y") ?>
                </p>
                  <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                      <thead class="align-bottom">
                        <tr>
                          <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Mulai</th>
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Berakhir</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                        </tr>
                      </thead>
                      <tbody id="schedule-booking"></tbody>
                    </table>
                  </div>
              </div>
        </div>
      <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
          <h3 class="text-center bg-blue-500  text-white py-4 rounded-2">Pemesanan Lapangan</h3>
          <p class="text-center text-xl"><?= $field_result['field_name'] ?></p>
          <form method="POST" class="w-1/2 mx-auto">
              <input name="id_user" type="hidden" value="<?= $session_user['data']['id_user'];?>"  readonly>
              <input name="id_field" type="hidden" value="<?= $field_result['id_field'] ?>"  readonly>
              <input name="date_play" type="hidden" value="<?= date("Y-m-d")  ?>"  readonly>
              <div class="flex flex-col w-full items-center mx-auto" style="gap: 5px;">
                  <h3 class="font-semibold" for="date">Tanggal Main</h3>
                  <h5 class="font-normal text-slate-500"><?= date('d M Y') ?></h5>
              </div>
              <div class="flex justify-center mt-4" style="gap: 10px;">
                <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                    <label for="start_time">Mulai Main</label>
                    <input id="start" name="start_time" type="time" class="times focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
                </div>
                <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                    <label for="end_time">Akhir Main</label>
                    <input id="end_time" name="end_time" type="time" class="times focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
                </div>
              </div>
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

<script>
  let picker = document.getElementById('date-booking');
  let schedule = document.getElementById('schedule-booking');
  let months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
    window.onload = function () {
      picker.innerText = new Date().getDate() 
      picker.innerText += " " + months[new Date().getMonth()]
      picker.innerText += " " + new Date().getFullYear()
      $.ajax({
        url: "./routes/transaction.php?action=get_transaction",
        type: "POST",
        data : {
          date_play : "<?= date("Y-m-d") ?>",
          id_field : "1"
        },
        success: function (data){
          let dataParse = JSON.parse(data)
          let status = null
          for (let index = 0; index < dataParse.length; index++) {
            (dataParse[index]["status"] == "0") ? status = 'Batal' : 
            (dataParse[index]["status"] == "1") ? status = 'Menunggu Pembayaran' : 
            (dataParse[index]["status"] == "2") ? status = 'Sedang Ditinjau' : 
            (dataParse[index]["status"] == "3") ? status = 'Berhasil' : 
            status = "Belum Diketahui"
            let content = ` <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <div class="flex px-2 py-1">
                                    <div class="flex flex-col px-3 justify-center">
                                      <p class="mb-0 font-semibold  leading-normal text-md">${dataParse[index]["start_time"].slice(0,5)}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <p class="mb-0 font-semibold leading-normal text-md">${dataParse[index]["end_time"].slice(0,5)}</p>
                                </td>
                                <td class="px-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                  <span class="bg-gradient-to-tl ${status == 'Batal' 
                                    ? 'from-red-500 to-red-400' : status == "Menunggu Pembayaran" 
                                    ? "from-yellow-500 to-yellow-400" : status == "Sedang Ditinjau" 
                                    ? "from-emerald-500 to-teal-400" : status == "Berhasil" 
                                    ? "from-emerald-500 to-teal-400" : ""} px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                  ${status}
                                  </span>
                                </td>
                              </tr>`;
          schedule.insertAdjacentHTML('beforeend',content);
          }
        }
      })
    };

    let time = document.querySelectorAll('.time')
    let price = document.getElementById('price')
    function convertSecond(time){
      const [hours,minutes,seconds] = time.split(":")
      return  parseInt(hours * 3600) + parseInt(minutes * 60) + parseInt(seconds) 
    }

  flatpickr(".times", {
    dateFormat: "H:i:s",
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    minTime : "08:00"
  });
</script>