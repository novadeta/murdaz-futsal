<?php 
  $guest = 'styles.css';
  include_once "./layouts/authorize.php";
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
  include_once "./core/TimeController.php";
  $time = new TimeController();
  $time_result = $time->get_time(['id_user' => $session_user['data']['id_user']]) ?? [];
  if (count($time_result) >= 1 && isset($time_result['purchased_time'])) {
    $date = date("h",strtotime($time_result['purchased_time']));
  }
  $date = 0;
  $convertDate = intval($date);
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $request = $_POST;
    $file = $_FILES;
    $result = $time->create_time($request,$file);
    if (isset($result['error'])) {
      echo "
      <script>
        alert('$result[error]')
      </script>";
    }else if(isset($result['message'])){
      echo "
      <script>
       alert('Berhasil Memesan Waktu')
       document.location.href = './index.php?page=pemesanan/waktu'
      </script>
      ";
    }else{
      return false;
    }
  }
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap mt-6 -mx-3 justify-center">
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
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
                          <?php 
                          foreach ($time_result as $result) {
                          
                              if ($result['purchased_time'] !== "00:00:00" && count($result) >= 1 ) {
                                ?>
                                  <tr>
                                    <td class="p-2 mt-2 align-middle bg-transparent whitespace-nowrap shadow-transparent" colspan="3">
                                      <div class="flex px-2 gap-5 items-center  justify-center">
                                        <p class="mb-0 font-semibold text-center leading-normal text-md"><?=   $result['type_price'] ?> : </p>
                                      <span class="bg-gradient-to-tl 
                                        <?= $result['status_payment'] == '0'  ? 'from-red-500 to-red-400' 
                                          : ($result['status_payment'] == "1" ? "from-yellow-500 to-yellow-400" 
                                          : ($result['status_payment'] == "2"  ? "from-emerald-500 to-teal-400" : "" ))
                                        ?> px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white"> 
                                        <?= ($result['status_payment'] == '1') ?  "Menunggu Pembayaran" : '' ?> 
                                        <?= ($result['status_payment'] == '2') ?  "Menunggu Validasi" : '' ?> 
                                      </span> :
                                        <p class="mb-0 font-semibold text-center leading-normal text-md"><?=   $result['purchased_time'] == "00:00:00" ? "00" : date('h', strtotime($result['purchased_time'])) ?>  Jam</p>
                                      </div>
                                    </td>
                                  </tr>
                              <?php
                              }
                              }
                              ?>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <h3 class="text-center mb-8">Form Pesan Jam</h3>
        <form method="POST" class="w-1/2 mx-auto" enctype="multipart/form-data">
            <input name="id_user" type="hidden" value="<?= $session_user['data']['id_user'];?>"  readonly>
            <input name="id_time" type="hidden" value="<?= $time_result['id_time'] ?? []?>"  readonly>
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                <label for="time">Masukkan Jumlah jam yang ingin dibeli</label>
                <input id="time" name="purchased_time" type="time" placeholder="08.00" class="time focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
            </div>
            <div class="flex gap-5 mt-4">
              <div>
                <input value="Normal" class="btn-price peer/radio hidden" checked id="normal" name="type_price" type="radio"">
                <label  class="text-slate-500 py-2 px-3  shadow-sm rounded-2 font-semibold peer-checked/radio:bg-[#5E72E4] peer-checked/radio:text-white" for="normal">
                    Normal
                </label>
              </div>
              <div>
                <input value="Malam"  class="btn-price peer/radio hidden" name="type_price" id="malam" type="radio"">
                <label  class="text-slate-500 py-2 px-3  shadow-sm rounded-2 font-semibold peer-checked/radio:bg-[#5E72E4] peer-checked/radio:text-white" for="malam">
                    Malam
                </label>
              </div>
              <div>
                <input value="Libur" class="btn-price peer/radio hidden" id="libur" name="type_price" type="radio"">
                <label  class="text-slate-500 py-2 px-3  shadow-sm rounded-2 font-semibold peer-checked/radio:bg-[#5E72E4] peer-checked/radio:text-white" for="libur">
                    Hari Libur
                </label>
              </div>
            </div>
            <div id="price" class="flex flex-col mt-4 w-full items-start mx-auto" style="gap: 10px;">
              <p>Harga</p>
              <h4 >Rp. 0</h4>
              <input type="text"  class="hidden" name="price" >
            </div>
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="norek">Silahkan Transfer ke Rekening BCA</label>
                  <p id="norek" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">88271922</p>
              </div>
            <label class="block mt-4" for="payment">Masukkan Bukti Pembayaran
                <input name="payment" id="payment" class="block w-full text-sm text-slate-500 mt-4 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-[#5e72e3] file:text-white
                    hover:file:bg-violet-100" name="payment" id="payment" type="file" multiple />
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

<script>
  let btnPrice = document.querySelectorAll('.btn-price')
  let time = document.querySelectorAll('.time')
  let price = document.getElementById('price')
  window.onload = function () {
  btnPrice.forEach(e => {
    if (e.checked) {
      if (e.value ==  'Normal') {
          price.children[0].innerText = "Harga : Rp. 100000 / jam"
        }else if(e.value == 'Malam'){
          price.children[0].innerText = "Harga : Rp. 120000 / jam"
        }else{
          price.children[0].innerText = "Harga : Rp. 150000 / jam"
        }
    }
  })
  }
  function changePrice(e){
    console.log(e);
  }
  function convertSecond(time){
      const [hours,minutes,seconds] = time.split(":")
      return  parseInt(hours * 3600) + parseInt(minutes * 60) + parseInt(seconds) 
  }
  btnPrice.forEach(e => {
    e.addEventListener('click', function(){
      if (e.checked) {
        let str = time[0].value + "0"
        let convert = convertSecond(str)
        let hour = convert / 3600
        if (e.value ==  'Normal') {
          let pricePerHours = hour * 100000;
          (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
          isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
          price.children[1].innerText = `Rp. ${pricePerHours}`
          price.children[0].innerText = "Harga : Rp. 100000 / jam"
          price.children[2].value = `${pricePerHours}`
        }else if(e.value == 'Malam'){
          let pricePerHours = hour * 120000;
          (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
          isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
          price.children[1].innerText = `Rp. ${pricePerHours}`
          price.children[0].innerText = "Harga : Rp. 120000 / jam"
          price.children[2].value = `${pricePerHours}`
          
        }else if(e.value == 'Libur'){
          let pricePerHours = hour * 150000;
          (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
          isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
          price.children[1].innerText = `Rp. ${pricePerHours}`
          price.children[0].innerText = "Harga : Rp. 150000 / jam"
          price.children[2].value = `${pricePerHours}`
        }else{
          let pricePerHours = 0;
          (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
          isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
          price.children[1].innerText = `Rp. ${pricePerHours}`
          price.children[0].innerText = "Harga : Rp. 0 / jam"
          price.children[2].value = `${pricePerHours}`
        }
      }
    })
  })
  flatpickr(".time", {
    dateFormat: "H:i:s",
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    onChange: function(selected,str) {
      let convert = convertSecond(str)
      let hour = convert / 3600
      
      btnPrice.forEach(e => {
        console.log(e);
        if (e.checked) {
          if (e.value ==  'Normal') {
            let pricePerHours = hour * 100000;
            (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
            isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
            price.children[1].innerText = `Rp. ${pricePerHours}`
            price.children[0].innerText = "Harga : Rp. 100000 / jam"
            price.children[2].value = `${pricePerHours}`
          }else if(e.value == 'Malam'){
            let pricePerHours = hour * 12000;
            (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
            isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
            price.children[1].innerText = `Rp. ${pricePerHours}`
            price.children[0].innerText = "Harga : Rp. 120000 / jam"
            price.children[2].value = `${pricePerHours}`
          }else{
            let pricePerHours = hour * 150000;
            (pricePerHours < 0) ?  price.children[1].innerText = `Rp. 0` :
            isNaN(pricePerHours) ? price.children[1].innerText = `Rp. 0` : 
            price.children[1].innerText = `Rp. ${pricePerHours}`
            price.children[0].innerText = "Harga : Rp. 150000 / jam"
            price.children[2].value = `${pricePerHours}`
          }
        }
      })
    }
  });
</script>