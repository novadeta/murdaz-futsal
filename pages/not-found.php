<?php 
  $title = "404 | Not Found";
  include_once "./layouts/main-header.php";
  $role = '2';
?>
  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section class="relative">
        </div>
        <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
          <div class="container z-1">
            <div class="flex flex-wrap -mx-3">
              <div class="absolute top-0 right-0 flex-col justify-center hidden w-full h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://source.unsplash.com/random/300×300')] rounded-xl ">
                  <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                  <h1 class="z-20 mt-12 font-bold text-white">404</h1>
                  <h4 class="z-20 text-white ">Halaman yang kamu cari tidak ditemukan :(</h4>
                    <a href="./index.php" class="z-20 bg-white py-5 px-4 w-[200px] rounded-2 font-bold mt-5 mx-auto">
                        Kembali
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  <?php 
    include_once './layouts/main-footer.php'
  ?>