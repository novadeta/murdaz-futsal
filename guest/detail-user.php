<?php 
$guest = 'styles.css';
include_once "./core/UserController.php";
include_once "./layouts/guest-header.php";
$user = new UserController();
if (!isset($_GET['id_user'])) {
  header('Location: index.php?page=not-found');
}
$result_user = $user->show_user($_GET) ?? [];
?>
   <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Lapangan</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Pengguna <?= $result_user['username']; ?></h6>
          </nav>

        </div>
      </nav>

      <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
          <div class="flex  w-full max-w-full px-3  md:w-full " style="flex-direction :row-reverse;">
            <div class="relative w-full flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                  <p class="mb-0 dark:text-white/80">Profil Pengguna </p>
                </div>
              </div>
              <div class="flex-auto p-6">
                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Pengguna</p>
                <div class="flex flex-wrap -mx-3">
                  <div class="w-full max-w-full px-3 shrink-0  md:flex-0">
                    <div class="mb-4">
                      <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
                      <input type="text" name="username" value="<?= $result_user['username']; ?>" class="focus:shadow-primary-outline  dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" readonly/>
                    </div>
                    <div class="mb-4">
                      <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama</label>
                      <input type="text" name="username" value="<?= $result_user['fullname']; ?>" class="focus:shadow-primary-outline  dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" readonly/>
                    </div>
                  </div>
                </div>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                
                <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Biodata </p>
                <div class="flex flex-wrap -mx-3">
                  <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-0">
                    <div class="mb-4">
                      <label for="address" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat</label>
                      <p class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white min- text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"><?= $result_user['address']; ?></p>
                    </div>
                  </div>
                  <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-0">
                    <div class="mb-4">
                      <label for="address" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Jenis Kelamin</label>
                      <h1 type="text" name="gender" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        <?= $result_user['gender']; ?>
                      </h1>
                    </div>
                  </div>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <img class="w-full rounded-t-2xl" src="./public/assets/img/bg-profile.jpg" alt="profile cover image">
              <div class="flex flex-wrap justify-center -mx-3">
                <div class="w-4/12 max-w-full px-3 flex-0 ">
                  <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                    <a href="javascript:;">
                      <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle" src="./public/assets/img/team-2.jpg" alt="profile image">
                    </a>
                  </div>
                </div>
              </div>

              <div class="flex-auto p-6 pt-0">
                <div class="flex flex-wrap -mx-3">
                  <div class="w-full max-w-full px-3 flex-1-0">
                  </div>
                </div>
                
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
  <?php 
  
  include_once "./layouts/guest-footer.php";
?>
