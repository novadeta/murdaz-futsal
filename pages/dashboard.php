<?php 
  include_once './pages/authorize.php';
  $guest = 'styles.css'; 
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
  var_dump($guest);
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
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
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
                          <button class="py-2 px-3 bg-[#5E72E4] text-white shadow-sm rounded-2 font-semibold">Lapangan A</button>
                          <button class="py-2 px-3 shadow-sm rounded-2">Lapangan B</button>
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
                        <tbody>
                          <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <div class="flex px-2 py-1">
                                <div>
                                  <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                </div>
                                <div class="flex flex-col justify-center">
                                  <h6 class="mb-0 leading-normal text-sm">John Michael</h6>
                                </div>
                              </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-tight text-xs">Manager</p>
                            </td>
                            <td class="px-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                              <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span>
                            </td>
                          </tr>
                          
                        </tbody>
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
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                            <div class="flex items-center px-2 py-1">
                              <div class="ml-6">
                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Tanggal Beli</p>
                                <h6 class="mb-0 text-sm leading-normal dark:text-white">27 April 2022</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                            <div class="text-center">
                              <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Lapangan:</p>
                              <h6 class="mb-0 text-sm leading-normal dark:text-white">b</h6>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                            <div class="text-center">
                              <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Harga:</p>
                              <h6 class="mb-0 text-sm leading-normal dark:text-white">Rp 20,000</h6>
                            </div>
                          </td>
                        </tr>
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
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                            <div class="flex items-center px-2 py-1">
                              <div class="ml-6">
                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Tanggal Beli</p>
                                <h6 class="mb-0 text-sm leading-normal dark:text-white">27 April 2022</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                            <div class="text-center">
                              <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Harga:</p>
                              <h6 class="mb-0 text-sm leading-normal dark:text-white">Rp 20,000</h6>
                            </div>
                          </td>
                        </tr>
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