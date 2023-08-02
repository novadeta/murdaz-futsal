<?php 
  $guest = 'styles.css';
  include_once "./core/FieldController.php";
  include_once "./layouts/guest-header.php";
  $field = new FieldController();
  if (!isset($_GET['id_field'])) {
    header('Location: index.php?page=not-found');
  }
  $result_field = $field->show_field($_GET) ?? [];
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $request = $_POST;
      $result = $field->edit_field($request);
      echo "
      <script>
          alert('Berhasil Mengubah Data Lapangan')
          document.location.href = './index.php?page=guest/lapangan'
      </script>
      ";
  }
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      <!-- cards -->
      <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
            <div style="margin-top: 40px;" class="relative flex flex-col w-full mt-15 min-w-0 mb-0 break-words p-4 bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <h3 class="text-center mb-8">Ubah Lapangan</h3>
                <form id="field" class="w-1/2 mx-auto" method="POST">
                    <input id="field_code" name="id_field" type="hidden" value="<?= $result_field['id_field'] ?>" class=" without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
                    <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                        <label for="field_code">Kode Lapangan</label>
                        <input id="field_code" name="field_code" type="text" value="<?= $result_field['field_code'] ?>" class=" without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
                    </div>
                    <div class="flex justify-center mt-4" style="gap: 10px;">
                    <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                        <label for="field_name">Nama Lapangan</label>
                        <input id="field_name" name="field_name" type="text" value="<?= $result_field['field_name'] ?>"  class="without_ampm focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
                    </div>
                    <div class="flex flex-col w-full items-start mx-auto" style="gap: 10px;">
                        <label for="status">Status</label>
                        <select required name="status" id="status" class="focus:shadow-primary-outline w-full text-sm leading-5.6 ease block  mx-auto appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            <option value="">Silahkan Pilih</option>
                          <?php if ($result_field['status'] == 'Aktif') {
                           ?> 
                            <option value="Aktif" selected >Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <?php
                            } else{
                              ?>
                            <option  value="Aktif">Aktif</option>
                            <option selected value="Tidak Aktif">Tidak Aktif</option>
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/5 items-start mx-auto mt-4">
                        <button id="button" type="submit" class="bg-blue-500 text-md w-full ease  mx-auto rounded-lg text-white px-3 py-2">Ubah</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
      </div>
    </main>
  </div>
</body>

<?php 
  include_once "./layouts/guest-footer.php";
?>