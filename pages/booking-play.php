<?php 
  $guest = 'styles.css';
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
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
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60 text-center">
                  <?= date("d M Y") ?>
                </p>
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
                        <tbody>
                          <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <div class="flex px-2 py-1">
                                <div>
                                  <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                </div>
                                <div class="flex flex-col justify-center">
                                  <p class="mb-0 font-semibold  leading-normal text-md">08.00</p>
                                </div>
                              </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md">12.00</p>
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
    <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <h3 class="text-center mb-8">Form Pesan Booking</h3>
        <form action="" class="w-1/2 mx-auto">
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                <label for="date">Masukkan Tanggal Main</label>
                <input id="date" name="date" type="date" placeholder="08.00" class=" without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
            </div>
            <div class="flex justify-center mt-4" style="gap: 10px;">
              <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="start_time">Mulai Main</label>
                  <input id="start" name="start_time" type="datetime-local" class="without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
              </div>
              <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="end_time">Akhir Main</label>
                  <input id="end_time" name="end_time" type="time" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
              </div>
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
      <!-- end cards -->
    </main>
  </div>
</body>

<?php 
  include_once "./layouts/main-footer.php";
?>