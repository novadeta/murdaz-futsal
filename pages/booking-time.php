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
                        </thead>
                        <tbody>
                          <tr>
                            <td class="p-2 align-middle bg-transparent whitespace-nowrap shadow-transparent" colspan="3">
                              <div class="flex px-2 py-1 justify-center">
                                <div class="flex flex-col justify-center">
                                  <h2 class="mb-0 font-semibold text-center leading-normal text-md">3,45 Jam</h2>
                                </div>
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
    <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <h3 class="text-center mb-8">Form Pesan Jam</h3>
        <form action="" class="w-1/2 mx-auto">
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                <label for="time">Masukkan </label>
                <input id="time" name="time" type="time" placeholder="08.00" class=" without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
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