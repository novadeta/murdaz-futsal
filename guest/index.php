<?php 
  session_start();
  $title = 'Login Admin';
  include_once "../layouts/main-header.php";
  include_once "../core/UserController.php";
  $role = '1';
?>
  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section class="min-h-screen">
        <div class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg')]">
          <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
          <div class="container z-10">
            <div class="flex flex-wrap justify-center -mx-3">
              <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                <h1 class="mt-12 mb-2 text-white">Selamat Datang!</h1>
                <p class="text-white">Silahkan masukkan username dan password dengan benar.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-56 md:-mt-56 ">
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  <h5>Sign in</h5>
                </div>
                <div class="flex-auto p-6">
                  <form method="POST" id="login" role="form text-left">
                    <div class="mb-4">
                      <input type="text" name="username" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Username" aria-label="Name" aria-describedby="email-addon" />
                    </div>
                    <div class="mb-4">
                      <input type="password" name="password" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                    </div>
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="py-12">
      <div class="container">
        <div class="flex flex-wrap -mx-3">
          <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Beranda </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Jadwal Booking </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Harga </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Fasilitas     </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Kontak </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Tentang Kita </a>
          </div>
          <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-whatsapp"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-facebook"></span>
            </a>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3">
          <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
            <p class="mb-0 text-slate-400">
              Copyright ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              Murdaz Futsal by Developer Tim.
            </p>
          </div>
        </div>
      </div>
      </footer>
      </main>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
      $(document).ready(function (){
        $('#login').submit(function (e){
          e.preventDefault();
          let formData = $(this).serialize();
          formData += "&role=<?= $role; ?>" 
          $.ajax({
            url: "../routes/user.php?action=checkuser",
            type: "post",
            data: formData,
            success: function(response){
              let dataParse =  JSON.parse(response)
              if (dataParse.status === "success") {
                Swal.fire({
                  title: 'Berhasil Login',
                  text : 'Berhasil Login',
                  icon: 'success',
                }).then(e => {
                  document.location.href = '../index.php?page=guest/dashboard'
                })
              }else {
                Swal.fire({
                  title: 'Username atau password salah',
                  text : 'Pastikan masukkan username dan password dengan benar',
                  icon: 'error',
                  })
              }
            },
            error: function(xhr, status, error) {
                console.log(xhr.status);
            }
          })
        })
      })
    </script>

<?php 
  include_once "../layouts/guest-footer.php"
?>