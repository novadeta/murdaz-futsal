<?php 
    include_once './layouts/main-header.php';
?>
<body class="bg-[#F7F7F7]">
    <header class="container">
        <nav class="mt-[30px] flex justify-between items-center">
            <ul class="flex gap-5 text-forest font-bold justify-between items-center py-4 text-[]">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li>
                    <a href="#jadwal">Jadwal Booking</a>
                </li>
                <li>
                    <a href="#fasilitas">Fasilitas</a>
                </li>
                <li>
                    <a href="#kontak">Kontak</a>
                </li>
            </ul>
            <div>
                <a class="font-bold bg-forest text-white py-3.5 px-9 rounded-[10px] shadow-[0px_4px_15px_0px_rgba(0,0,0,0.20)]" href="index.php?page=login">Dashboard</a>
            </div>
        </nav>
    </header>
    <main class="container">
        <section class="flex my-[137px]">
            <div class="text-forest">
                <h1 class="text-forest">Rayakan Kemenangan bersama kami</h1>
                <p class="max-w-72">Ciptakan momen dan pengalaman 
                    bermain futsal  bersama kami di 
                    <span>Murdaz Futsal</span>
                </p>
                <div class="flex justify-start gap-2">
                    <a class="flex gap-2 justify-center items-center py-3 bg-forest font-bold text-white px-3 rounded-[5px] shadow-[0px_4px_15px_0px_rgba(0,0,0,0.20)]" href="">
                        Masuk Sekarang
                        <img class="text-black mt-1" src="./public/assets/img/arrow-circle.svg" alt="" srcset="">
                    </a>
                    <a class="flex gap-2 justify-center items-center relative px-3 before:ease-in before:duration-200 before:absolute before:left-0 before:w-20 before:h-full before:-z-10  hover:before:w-full before:border before:border-forest before:px-9 before:rounded-[5px] before:shadow-[0px_4px_15px_0px_rgba(0,0,0,0.20)] font-bold" href="#jadwal">
                        Jadwal Booking
                    </a>
                </div>
            </div>
            <div class="flex gap-5 ">
                <div class="rounded-5 overflow-hidden drop-shadow-[0px_0px_50px_rgba(0,0,0,0.25)]">
                    <img src="./public/assets/img/hero-1.png" alt="">
                </div>
                <div class="rounded-5 overflow-hidden relative bottom-16 drop-shadow-[0px_0px_50px_rgba(0,0,0,0.25)]">
                    <img src="./public/assets/img/hero-2.png" alt="">
                </div>
                <div class="rounded-5 overflow-hidden drop-shadow-[0px_0px_50px_rgba(0,0,0,0.25)]">
                    <img src="./public/assets/img/hero-3.png" alt="">
                </div>
            </div>
        </section>
        <section id="jadwal" class="my-[250px]">
        <div class="flex flex-col justify-center items-center gap-10 my-[50px]">
            <h2 class="text-xl rounded-5 m-0 border border-malachite text-malachite  py-2.5 px-9">Booking</h2>
            <p class="font-bold text-forest max-w-xl text-10 text-center">Pastikan lihat jadwal untuk pemesanan lapangan</p>
        </div>
        <div class="py-9 px-[60px] shadow-[0px_0px_50px_0px_rgba(0,0,0,0.25)] rounded-5 bg-white">
            <div class="flex justify-center">
                <div class="rounded-5 bg-malachite py-2.5 px-9 ">
                    <h2 id="flat" class="text-xl m-0"><?= date('d M Y') ?></h2>
                </div>
            </div>
            <div class="flex justify-center items-stretch gap-5 mt-12">
                <div class="w-full">
                    <div class="flex gap-5 flex-col items-center justify-center">
                        <h3 class="text-center">Pilih Lapangan</h3>
                        <div class=" shadow-xxs rounded-4 px-3 py-3 group/1 cursor-pointer">
                            <h5 class="border-malachite inline-block border text-malachite py-5 px-[50px] m-0 rounded-4 group-hover/1:text-white group-hover/1:bg-malachite ease-in-out duration-150">Lapangan A</h5>
                        </div>
                        <div class=" shadow-xxs rounded-4 px-3 py-3 group/1 cursor-pointer">
                            <h5 class="border-malachite inline-block border text-malachite py-5 px-[50px] m-0 rounded-4 group-hover/1:text-white group-hover/1:bg-malachite ease-in-out duration-150">Lapangan B</h5>
                        </div>
                    </div>
                </div>
                <div class="w-full h-full">
                    <div class="relative w-full h-full flex flex-col p-5 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        <div class=" table-responsive">
                        <table class="w-full table-flush text-slate-500" cellspacing="0">
                            <thead class="border-4 w-full">
                            <tr class="">
                                <th class="border p-2">Mulai</th>
                                <th class="border p-2">Berakhir</th>
                                <th class="border p-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="border">
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">08.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">09.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">Pending</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">08.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">09.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">Pending</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">08.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">09.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">Pending</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">08.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">09.00</td>
                                    <td class="p-2 text-sm border-b-2 border-malachite font-normal leading-normal text-center">Pending</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div> 
        </section>
        <section id="jadwal" class="my-[250px]">
            <div class="flex flex-col justify-center items-center gap-10 my-[50px]">
                <h2 class="text-xl rounded-5 m-0 border border-malachite text-malachite    py-2.5 px-9">Harga</h2>
                <p class="font-bold text-forest max-w-xl text-10 text-center">
                    Harga yang relatif lebih  
                    murah daripada yang lain!
                </p>
            </div>
            <div class="flex w-full gap-5">
                <div class="flex flex-col items-center px-6 w-full border border-malachite rounded-5 py-6 bg-white">
                    <h3 class="w-full relative text-center font-bold">Malam</h3>
                    <div class="w-1/2 h-1.2 bg-malachite "></div>
                    <h4 class="text-secondary my-5">18.00 - 00.00</h4>
                    <p class="text-5 font-bold text-forest my-10">Rp <span class="text-12">120.000</span> /jam</p>
                    <a class="mt-8 rounded-5 border-malachite border font-bold text-6 py-5 w-full text-center text-malachite hover:bg-malachite hover:text-white duration-100 ease-in" href="">Pesan Sekarang</a>
                </div>
                <div class="flex flex-col items-center px-6 w-full border border-malachite rounded-5 py-6 bg-white">
                    <h3 class="w-full relative text-center font-bold">Normal</h3>
                    <div class="w-1/2 h-1.2 bg-malachite "></div>
                    <h4 class="text-secondary my-5">08.00 - 17.59</h4>
                    <p class="text-5 font-bold text-forest my-10">Rp <span class="text-12">120.000</span> /jam</p>
                    <a class="mt-8 rounded-5 border-malachite border font-bold text-6 py-5 w-full text-center text-malachite hover:bg-malachite hover:text-white duration-100 ease-in" href="">Pesan Sekarang</a>
                </div>
                <div class="flex flex-col items-center px-6 w-full border border-malachite rounded-5 py-6 bg-white">
                    <h3 class="w-full relative text-center font-bold">Hari Libur</h3>
                    <div class="w-1/2 h-1.2 bg-malachite "></div>
                    <h4 class="text-secondary my-5">Sabtu - Minggu</h4>
                    <p class="text-5 font-bold text-forest my-10">Rp <span class="text-12">120.000</span> /jam</p>
                    <a class="mt-8 rounded-5 border-malachite border font-bold text-6 py-5 w-full text-center text-malachite hover:bg-malachite hover:text-white duration-100 ease-in" href="">Pesan Sekarang</a>
                </div>
            </div>
        </section>
        <section class="my-[250px]">
            <div class="flex flex-col justify-center items-center gap-10 my-[50px]">
                <h2 class="text-xl rounded-5 m-0 border border-malachite text-malachite  py-2.5 px-9">Fasilitas</h2>
                <p class="font-bold text-forest text-10 text-center">Fasilitas Apa Yang Diperoleh</p>
            </div>
            <div class="flex gap-3">
                <div class="relative rounded-1.25 py-5 px-7 w-full bg-white flex flex-col justify-center before:w-[4px] before:left-[12px] before:rounded-3 before:block before:absolute before:top-0 before:bottom-0 before:bg-malachite before:h-19 before:my-auto border">
                    <div class="flex gap-3">
                        <img src="./public/assets/img/toilet.svg" alt="" srcset="">
                        <h4>Toilet</h4>
                    </div>
                    <p class="text-secondary m-0">Toilet yang bersih</p>
                </div>
                <div class="relative rounded-1.25 py-5 px-7 w-full bg-white flex flex-col justify-center before:w-[4px] before:left-[12px] before:rounded-3 before:block before:absolute before:top-0 before:bottom-0 before:bg-malachite before:h-19 before:my-auto border">
                    <div class="flex gap-3">
                        <img src="./public/assets/img/market.svg" alt="" srcset="">
                        <h4>Warung</h4>
                    </div>
                    <p class="text-secondary m-0">Sedia Makanan</p>
                </div>
                <div class="relative rounded-1.25 py-5 px-7 w-full bg-white flex flex-col justify-center before:w-[4px] before:left-[12px] before:rounded-3 before:block before:absolute before:top-0 before:bottom-0 before:bg-malachite before:h-19 before:my-auto border">
                    <div class="flex gap-3">
                        <img src="./public/assets/img/mosque.svg" alt="" srcset="">
                        <h4>Ibadah</h4>
                    </div>
                    <p class="text-secondary m-0">Tempat suci</p>
                </div>
                <div class="relative rounded-1.25 py-5 px-7 w-full bg-white flex flex-col justify-center before:w-[4px] before:left-[12px] before:rounded-3 before:block before:absolute before:top-0 before:bottom-0 before:bg-malachite before:h-19 before:my-auto border">
                    <div class="flex gap-3">
                        <img src="./public/assets/img/parking.svg" alt="" srcset="">
                        <h4>Parkir</h4>
                    </div>
                    <p class="text-secondary m-0">Parkir yang teduh</p>
                </div>
            </div>
            
            <div class="swiper swiper-container  rounded-5 bg-white p-5 my-10">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="">
                            <img class="w-full" src="./public/assets/img/toilet.png" alt="" srcset="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="">
                            <img class="w-full" src="./public/assets/img/toilet.png" alt="" srcset="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="">
                            <img class="w-full" src="./public/assets/img/toilet.png" alt="" srcset="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="">
                            <img class="w-full" src="./public/assets/img/toilet.png" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination">a</div>
        </section>
        <section class="my-[250px]">
            <div class="flex flex-col justify-center items-center gap-10 my-[50px]">
                <h2 class="text-xl rounded-5 m-0 border border-malachite text-malachite  py-2.5 px-9">Kontak</h2>
            </div>
            <div class="bg-gradient-to-r from-[#1B4925] to-[#5AD78C] rounded-5 py-10">
                <p class="font-bold mx-auto text-10 text-center max-w-xl text-white">
                    Ingin berdikusi lebih lanjut? 
                    Kami siap melayani anda
                </p>
                <div class="flex items-center justify-center">
                    <a href="" class="font-bold rounded-1.2 flex items-center justify-center gap-5 px-6 py-4 bg-[rgba(255,255,255,.9)]"> 
                        <img src="./public/assets/img/whatssapp.svg" alt="" srcset="">
                        Hubungi Kami
                    </a>
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
   
<?php 
    include_once "./layouts/main-footer.php";
?>
 <script>
    let picker = document.getElementById('flat');
    let month = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
    window.onload = function () {
            picker.innerText = new Date().getDate() 
            picker.innerText += " " + month[new Date().getMonth()]
            picker.innerText += " " + new Date().getFullYear()

    };
    flatpickr("#flat", {
      dateFormat: "Y-m-d",
      onChange: function (selectedDate,dateStr) {
        $.ajax({
            url: '"./routes/transaction.php?action="',
            type: "GET",
            success: function(data){

            }
        })
        let splitDate = dateStr.split("-").reverse()
        flat.innerText = `${selectedDate[0].getDate()} ${month[selectedDate[0].getMonth()]} ${selectedDate[0].getFullYear()}`
      }
    });
    var menu = ['Slide 1', 'Slide 2', 'Slide 3','Slide 4']
      var swiper = new Swiper(".swiper-container", {
      spaceBetween: 100,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function(index,className){
            return '<span class="' + className + '">' + (menu[index]) + '</span>';
        }
      },
    });
</script>