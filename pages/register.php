<?php 
  $title = "Register Akun";
  include_once "./layouts/main-header.php";
  $role = "2";
?>
  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section>
        <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
          <div class="container z-1">
            <div class="flex flex-wrap -mx-3">
              <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0">
                  <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid">
                        <p class="mx-auto text-sm mb-0"><a href="index.php?page=login" class="text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500" ><span class="text-lg fas fa-arrow-left"></span></a></p>
                    </div>
                    <h4 class="font-bold">Register Akunmu</h4>
                    <p class="mb-0">Silahkan isi dengan benar</p>
                  </div>
                  <div class="flex-auto p-6">
                    <form id="register" role="form">
                      <div class="mb-4">
                        <input type="text" name="username" placeholder="Masukkan username" name="username" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                      <div class="mb-4">
                        <input type="text" name="fullname" placeholder="Masukkan Nama Lengkap" name="password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                      <div class="mb-4">
                        <select required name="gender" id="gender" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            <option value="">Gender</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="mb-4">
                        <textarea  name="address" placeholder="Masukkan Alamat" name="address" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"></textarea>
                      </div>
                      <div class="mb-4">
                        <input type="password" name="password" placeholder="Masukkan password"  name="password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                      <div class="mb-4">
                        <input type="password" name="password2" placeholder="Masukkan password ulang" name="password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                      <div class="text-center">
                        <button type="submit" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Buat Akun</button>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
              <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden  rounded-xl ">
                  <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                  <img src="<?= $url ?>/assets/img/logo.png" class=" transition-all duration-200 " alt="main_logo" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
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
            <a href="#" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="#" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-whatsapp"></span>
            </a>"
            <a href="#" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="#" target="_blank" class="mr-6 text-slate-400">
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
<?php 
    include_once './layouts/main-footer.php'
?>
 <script>
    $(document).ready(function (){
      $('#register').submit(function (e){
        e.preventDefault();
        let formData = $(this).serialize();
        formData += "&role=<?= $role; ?>" 
        $.ajax({
          url: "./routes/user.php?action=createuser",
          type: "post",
          data: formData,
          success: function(response){
            console.log(response);
            let dataParse =  JSON.parse(response)
            if (dataParse.status === "success") {
              Swal.fire({
                title: 'Berhasil Membuat Akun',
                text : 'Silahkan Login',
                icon: 'success',
              }).then(e => {
                document.location.href = './index.php?page=login'
              })
            }else if(dataParse.status == "username-exists"){
              Swal.fire({
                title: 'Username sudah ada',
                text : 'Username yang kamu masukkan sudah digunakan orang lain',
                icon: 'error'
                })
            }else {
              Swal.fire({
                title: 'Password tidak sama',
                text : dataParse.message,
                icon: 'error'
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