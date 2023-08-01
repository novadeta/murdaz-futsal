<?php 
  $guest = 'styles.css';
  include_once "./layouts/authorize-guest.php";
  include_once "./layouts/guest-header.php";
  include_once "./core/TransactionController.php";
  include_once "./core/FieldController.php";
  $transaction = new TransactionController();
  $field = new FieldController();
  $field_result = $field->get_field("Aktif");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $request = $_POST;
    $file = $_FILES;
    $result = $transaction->create_transaction($request);
    if (isset($result['status'])) {
      echo "<script>
        alert('Waktu sudah ada yang booking')
        document.location.href = './index.php?page=guest/booking'
      </script>";
      return false;
    }
      echo "
      <script>
          alert('Berhasil Menambah')
          document.location.href = './index.php?page=guest/booking'
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
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h3 class="capitalize dark:text-white text-center">Jadwal Booking</h3>
                <p id="date-booking" class=" mb-0 text-sm leading-normal py-2 px-2 rounded-3 text-white dark:opacity-60 text-center mx-auto bg-[#5E72E4]" style="width: 120px;">
                  <?= date("d M Y") ?>
                </p>
                  <div class="mx-auto flex justify-center gap-5 my-5">
                <?php 
                      $no = 0;
                      foreach ($field_result as $field) {
                    ?>
                      <button onclick="changeField(this,<?= $field['id_field'] ?>)" class="btn-field text-slate-500 py-2 px-3  shadow-sm rounded-2 font-semibold"><?= $field['field_name']; ?></button>
                  <?php }?>
                </div>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto px-0 pt-0 pb-2">
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
        </div>
    </div>
    <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <h3 class="text-center mb-8">Form Pesan Booking</h3>
        <form method="POST" class="w-1/2 mx-auto" enctype="multipart/form-data">
            <input name="id_user" type="hidden" value="<?= $session_user['data']['id_user'];?>"  readonly>
            <input name="role" type="hidden" value="<?= $session_user['data']['role'];?>"  readonly>
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                <label for="date">Masukkan Tanggal Main</label>
                <input id="date" name="date_play" type="date"  class="flat focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="<?= date('Y-m-d') ?>" />
            </div>
            <div class="flex justify-center mt-4" style="gap: 10px;">
              <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="start_time">Mulai Main</label>
                  <input id="start" name="start_time" type="time" class="time focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
              </div>
              <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="end_time">Akhir Main</label>
                  <input id="end_time" name="end_time" type="time" class="time focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
              </div>
            </div>
            <div class="flex flex-col w-full mt-4 items-start mx-auto" style="gap: 10px;">
            <label for="price">Lapangan</label>
            <select required name="id_field" id="field" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                  <option value="">Silahkan Pilih</option>
                    <?php 
                      $no = 0;
                      foreach ($field_result as $field) {
                      ?>
                          <option value="<?= $field['id_field'] ?>"><?= $field['field_name'] ?></option>

                      <?php
                      }
                      ?>    
                </select>
            </div>
            <div id="price" class="flex flex-col mt-4 w-full items-start mx-auto" style="gap: 10px;">
              <p>Harga</p>
              <h4 >Rp. 0</h4>
              <input type="hidden" name="price" readonly>
            </div>
            <div class="flex flex-col w-1/5 items-start mx-auto mt-4">
                  <button id="button" type="submit" class="bg-blue-500 text-md w-full ease  mx-auto rounded-lg text-white px-3 py-2">Pesan</button>
              </div>
              </form>
          </div>
      </div>
        </div>
      </div>
      <!-- end cards -->
    </main>
  </div>

<?php 
  include_once "./layouts/guest-footer.php";
?>
<script>
  let picker = document.getElementById('date-booking');
  let schedule = document.getElementById('schedule-booking');
  let months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
  let btnField = document.querySelectorAll('.btn-field')
    window.onload = function () {
      picker.innerText = new Date().getDate() 
      picker.innerText += " " + months[new Date().getMonth()]
      picker.innerText += " " + new Date().getFullYear()
      btnField[0].classList.add("bg-[#5E72E4]")
      btnField[0].classList.add("text-white")
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
            (dataParse[index]["status"] == "3") ? status = 'Lunas' : 
            status = "Belum Diketahui"
            console.log(status);
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
                                    ? "from-emerald-500 to-teal-400" : status == "Lunas" 
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
    
    function changeField(e,id_field){
      btnField.forEach(btn => {
        btn.classList.remove('bg-[#5E72E4]')
        btn.classList.remove('text-white');
        e.classList.add('bg-[#5E72E4]');
        e.classList.add('text-white');
      })
      let [date,month,year] = document.getElementById('date-booking').innerText.split(" ")
      let numberOfMonth =  months.indexOf(month)+1
      let array = Array.from(schedule.children)
          array.forEach(element => {
          element.remove()
        });
      $.ajax({
      url: "./routes/transaction.php?action=get_transaction",
      type: "POST",
      data : {
        date_play : `${year}-${numberOfMonth}-${date}`,
        id_field : `${id_field}`
      },
      success: function (data){
          let dataParse = JSON.parse(data)
          let status = null
          for (let index = 0; index < dataParse.length; index++) {
            (dataParse[index]["status"] == "0") ? status = 'Batal' : 
            (dataParse[index]["status"] == "1") ? status = 'Menunggu Pembayaran' : 
            (dataParse[index]["status"] == "2") ? status = 'Sedang Ditinjau' : 
            (dataParse[index]["status"] == "3") ? status = 'Lunas' : 
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
                                      ? "from-emerald-500 to-teal-400" : status == "Lunas" 
                                      ? "from-emerald-500 to-teal-400" : ""} px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    ${status}
                                    </span>
                                  </td>
                                </tr>`;
          schedule.insertAdjacentHTML('beforeend',content);
          }
        }
    })
      
    }

    flatpickr("#date-booking", {
      dateFormat: "Y-m-d",
      position: "auto center",
      onChange: function (selectedDate,dateStr) {
        $.ajax({
        url: "./routes/transaction.php?action=get_transaction",
        type: "POST",
        data : {
          date_play : dateStr,
          id_field : '1'
        },
        success: function (data){
          let array = Array.from(schedule.children)
          array.forEach(element => {
          element.remove()
        });
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
        let splitDate = dateStr.split("-").reverse()
        document.getElementById('date-booking').innerText = `${selectedDate[0].getDate()} ${months[selectedDate[0].getMonth()]} ${selectedDate[0].getFullYear()}`
      }
    });

    let time = document.querySelectorAll('.time')
    let price = document.getElementById('price')
    function convertSecond(time){
      const [hours,minutes,seconds] = time.split(":")
      return  parseInt(hours * 3600) + parseInt(minutes * 60) + parseInt(seconds) 
    }
    flatpickr(".time", {
      dateFormat: "H:i:s",
      enableTime: true,
      noCalendar: true,
      time_24hr: true,
      minTime: "08:00",
      onChange: function(selected,str) {
        let startTime = time[0].value + "0"
        let endTime = time[1].value + "0"
        let convertStartTime = convertSecond(startTime)
        let convertEndTime = convertSecond(endTime)
        let differenceTime = convertEndTime - convertStartTime
        const hours = differenceTime / 3600
        if (str > "08:00:00" &&  str < "17:59:00") {
            let pricePerHours = 100000 * hours ;
            (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
            isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
            price.children[1].innerText = `Rp. ${pricePerHours}`
            price.children[0].innerText = "Harga : Rp. 100000 / jam"
            price.children[2].value = `${pricePerHours}`
        }else if (str >= "18:00:00" &&  str < "23:59:00") {
            let pricePerHours = 120000 * hours ;
            (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
            isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` :
             price.children[1].innerText = `Rp. ${pricePerHours}`
             price.children[0].innerText = "Harga : Rp. 120000 / jam"
             price.children[2].value = `${pricePerHours}`
        }else{
              price.children[1].innerText = `Rp. 0`
              price.children[2].value = `0`
        }
      }
  });
</script>