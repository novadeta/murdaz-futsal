<?php 
    include_once './layouts/authorize.php';
    $guest = 'styles.css'; 
    include_once "./layouts/main-header.php";
    include_once "./layouts/main-sidebar.php";
    include_once "./core/TransactionController.php";
    $transaction = new TransactionController();
    $result_transaction = $transaction->show_transaction(['status' => '3','id_user' => $session_user['data']['id_user']]) ;
  
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-full h-full min-h-screen lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl h-full relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Riwayat Pembelian</h6>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6>Tabel Riwayat Pembelian</h6>
                  </div>
                  <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pembelian</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Lapangan</th>
                            <th class="px-6 py-3 pl-2  font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Total Main</th>
                            <th class="px-6 py-3 pl-2  font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 pl-2  font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga</th>
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
                                ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs"><?= $result['date_play'] ?></p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-xs total_play" >aa</p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <span class="bg-gradient-to-tl  from-emerald-500 to-teal-400 px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                  <?= ($result['status'] == '3') ?  "Lunas" : '' ?> 
                                </span>
                              </p>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  Rp. <?= $result['price']?> 
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
    </main>
  </div>
<?php
  include_once "./layouts/main-footer.php";
?>

<script>
  function convertDate(e){
    console.log(e);
  }
  function convertSecond(time){
      const [hours,minutes,seconds] = time.split(":")
      return  parseInt(hours * 3600) + parseInt(minutes * 60) + parseInt(seconds) 
    }
   
  let totalPlay = document.querySelectorAll('.total_play')
  let convertStartTime = null
 let convertEndTime = null
 let differenceTime = null
 let hours = null
</script>
<?php 
echo "<script>";
    for ($i = 0; $i < count($result_transaction); $i++) {
      $start_time = $result_transaction[$i]['start_time'];
      $end_time = $result_transaction[$i]['end_time'];
      echo" 
        convertStartTime = convertSecond('$start_time')
        convertEndTime = convertSecond('$end_time')
        differenceTime = convertEndTime - convertStartTime
        hours = differenceTime / 3600
        totalPlay[$i].innerText = hours +' Jam'
    
        ";
    }
echo " </script>";
  ?>