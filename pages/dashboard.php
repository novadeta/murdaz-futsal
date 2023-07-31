<?php 
  include_once './layouts/authorize.php';
  $guest = 'styles.css'; 
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
  include_once "./core/TransactionController.php";
  include_once "./core/FieldController.php";
  $transaction = new TransactionController(); 
  $field = new FieldController();
  $result_transaction = $transaction->show_transaction(['status' => '1','id_user' => $session_user['data']['id_user']]) ?? [] ;
  $result_transaction_2 = $transaction->show_transaction(['status' => '2','id_user' => $session_user['data']['id_user']]) ?? [] ;
  $field_result = $field->get_field("Aktif");
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-col mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Jadwal Booking Hari ini</h6>
                <p id="date-booking" class=" mb-0 text-sm leading-normal py-2 px-2 rounded-3 text-white dark:opacity-60 text-center mx-auto bg-[#5E72E4]" style="width: 120px;">
                  <?= date("d M Y") ?>
                </p>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6>Tabel Booking</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <div class="mx-auto flex justify-center gap-5 ">
                      <?php 
                          $no = 0;
                          foreach ($field_result as $field) {
                        ?>
                          <button onclick="changeField(this,<?= $field['id_field'] ?>)" class="btn-field text-slate-500 py-2 px-3  shadow-sm rounded-2 font-semibold"><?= $field['field_name']; ?></button>
                      <?php }?>
                      </div>
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Mulai</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jam Akhir</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                          </tr>
                        </thead>
                        <tbody id="schedule-booking"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex w-full justify-center gap-5 px-3 ">
            <div class="flex flex-wrap mt-3 -mx-3 w-full">
              <div class="w-full max-w-full px-3  mt-0 mb-6 lg:mb-0  lg:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                  <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                      <h6 class="mb-2 dark:text-white">Menunggu Pembayaran</h6>
                    </div>
                  </div>
                  <div class="overflow-x-auto">
                    <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                      <tbody>
                      <?php 
                            foreach ($result_transaction as $result) {
                          ?>
                            <tr>
                              <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?php 
                                  $split = explode(" ",$result['date']);
                                  echo $split[0];
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
                                <?= ($result['status'] == '1') ?  "Menunggu Pembayaran" : '' ?> 
                              </span>
                              
                              </p>
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
            <div class="flex flex-wrap mt-3 -mx-3 w-3/5">
              <div class="w-full max-w-full px-3  mt-0 mb-6 lg:mb-0 lg:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                  <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                      <h6 class="mb-2 dark:text-white">Menunggu Validasi</h6>
                    </div>
                  </div>
                  <div class="overflow-x-auto">
                    <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                      <tbody>
                      <?php 
                            foreach ($result_transaction_2 as $result) {
                          ?>
                            <tr>
                              <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?php 
                                  $split = explode(" ",$result['date']);
                                  echo $split[0];
                                ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs">Rp. <?= $result['price'] ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                 <p class="mb-0 font-semibold leading-tight text-xs justify-center flex">
                                  <span class="bg-gradient-to-tl 
                                 <?= $result['status'] == '0'  ? 'from-red-500 to-red-400' 
                                  : ($result['status'] == "1" ? "from-yellow-500 to-yellow-400" 
                                  : ($result['status'] == "2"  ? "from-emerald-500 to-teal-400" 
                                  : ($result['status'] == "3" ? "from-emerald-500 to-teal-400" : "" )))
                                ?> px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"> 
                                <?= ($result['status'] == '2') ?  "Diproses" : '' ?> 
                              </span>
                              </p>
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
    </main>
  </div>
<?php 
  include_once "./layouts/main-footer.php";
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
            (dataParse[index]["status"] == "2") ? status = 'Diproses' : 
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
                                    ? "from-yellow-500 to-yellow-400" : status == "Diproses" 
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
            (dataParse[index]["status"] == "2") ? status = 'Diproses' : 
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
                                      ? "from-yellow-500 to-yellow-400" : status == "Diproses" 
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
            (dataParse[index]["status"] == "2") ? status = 'Diproses' : 
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
                                      ? "from-yellow-500 to-yellow-400" : status == "Diproses" 
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
        let splitDate = dateStr.split("-").reverse()
        document.getElementById('date-booking').innerText = `${selectedDate[0].getDate()} ${months[selectedDate[0].getMonth()]} ${selectedDate[0].getFullYear()}`
      }
    });
</script>