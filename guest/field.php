<?php 
  $guest = 'styles.css';
  include_once "./core/FieldController.php";
  include_once "./layouts/guest-header.php";
  $field = new FieldController();
  $randomqr = uniqid('Qrcode-');
  $result_field = $field->get_field() ?? [];
   if(isset($_GET['action'])){
    if ($_GET['action'] == 'hapus') {
        $delete_user = $field->delete_field(['id_field' => $_GET['id_field']]) ;
        echo "
        <script>
          alert('Berhasil Menghapus Lapangan')
          document.location.href = './index.php?page=guest/lapangan'
        </script>
        ";
    }
}
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
                <h3 class="capitalize dark:text-white text-center">Lapangan</h3>
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
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kode Lapangan</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Lapangan</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">QRCode</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">AKsi</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php 
                            $no = 1;
                            foreach ($result_field as $result) {
                          ?>
                          <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <div class="flex px-4 py-1">
                                <div class="flex flex-col justify-center">
                                  <p class=" mb-0 font-semibold  leading-normal text-md"><?= $result['field_code'] ?></p>
                                </div>
                              </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <p class="mb-0 font-semibold leading-normal text-md"><?= $result['field_name'] ?></p>
                            </td>
                            <?php
                              if ($result['status'] == 'Aktif') {
                                echo '<td class="px-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">'. $result['status'].' </span>
                              </td>';
                            }else{
                              echo'<td class="px-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                <span class="bg-gradient-to-tl from-red-500 to-red-400 px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">'. $result['status'].'</span>
                                </td>';
                              }
                              
                              ?>
                            
                            <td class="p-2 align-middle flex flex-col items-center justify-center bg-transparent border-b whitespace-nowrap shadow-transparent mx-auto">
                              <img onclick="downloadQRcode(this,'<?= $result['field_code'] ?>')" class="cursor-pointer" src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl=<?= $result['qrcode'] ?>" width="150" height="150" alt="">
                            </td>
                            <td class="px-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                              <a  class="bg-gradient-to-tl from-blue-500 to-blue-400 px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="./index.php?page=guest/lapangan/edit&id_field=<?= $result['id_field'] ?>">
                                Edit
                              </a>

                              <a class="bg-gradient-to-tl from-red-500 to-red-400 px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white" href="./index.php?page=guest/lapangan&action=hapus&id_field=<?= $result['id_field'] ?>" onclick="javascript: return confirm('Apakah ingin menghapus?')">Hapus</a>
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
    <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <h3 class="text-center mb-8">Tambah Lapangan</h3>
        <form id="form_field" class="w-1/2 mx-auto" method="POST">
            <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                <label for="field_code">Kode Lapangan</label>
                <input id="field_code" name="field_code" type="text" placeholder="KD-1" class=" without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
            </div>
            <div class="flex justify-center mt-4" style="gap: 10px;">
              <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="field_name">Nama Lapangan</label>
                  <input id="field_name" name="field_name" type="text" placeholder="Lapangan B" class="without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
              </div>
              <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                  <label for="status">Status</label>
                  <select required name="status" id="status" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                      <option value="">Silahkan Pilih</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
            </div>
            <div class="flex flex-col w-1/5 items-start mx-auto mt-4">
                <button id="button" type="submit" class="bg-blue-500 text-md w-full ease  mx-auto rounded-lg text-white px-3 py-2">Buat</button>
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
  include_once "./layouts/guest-footer.php";
?>
<script>
  $('document').ready(function (){
    $('#form_field').submit(function(e) {
      e.preventDefault();
      let formData = $(this).serialize();
      let url = encodeURIComponent('http://localhost/futsal?qrcode=<?= $randomqr ?>')
      formData+= "&qrcode="+url
      console.log(formData);
      $.ajax({
        url : './routes/field.php?action=create_field',
        data : formData,
        type: 'POST',
        success: function(data){
            alert('Berhasil Menambah Lapangan')
            document.location = './index.php?page=guest/lapangan'
        }
      })
    })
  })
  function downloadQRcode({src},nameFile){
  const api = src;
  fetch(api)
  .then(e => e.blob())
  .then(blob => {
    const blobUrl = URL.createObjectURL(blob)
    const link = document.createElement('a');
    link.href = blobUrl
    link.download = `${nameFile}.png`;
    link.click()
    URL.revokeObjectURL(blobUrl)
  }).catch(e => console.log(e))
}
</script>