<?php 
  $url = "http://" . $_SERVER['SERVER_NAME'] . "/futsal/public";
  $guest = 'styles.css'; 
  include_once "./layouts/main-header.php";
  include_once "./layouts/main-sidebar.php";
?>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 min-h-screen text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75 "></div>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl min-h-screen ">
      <div class="w-full px-2 md:px-6 py-6 mx-auto h-full min-h-screen">
      <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
              <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h3 class="capitalize dark:text-white text-center">Scan Qr</h3>
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60 text-center">
                  Silahkan Scan QR disini bagi yang punya booking jam
                </p>
              </div>
              <div class="flex-auto p-4">
              <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto px-0 pt-12 pb-2">
                    <div class="p-2 overflow-x-auto">
                    <div style="width: 100%; height: 500px; max-width: 610px; " class="mx-auto border-none" id="reader"></div>
                    </div>
                    <button onclick="downloadImage()">Klik</button>
                </div>
            </div>    
        </div>
    </div>
      
    </div>
    </main>
  </div>
</body>

<?php 
  include_once "./layouts/main-footer.php";
?>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
  function onScanSuccess(decodedText, decodedResult) {
  console.log(`Code matched = ${decodedText}`, decodedResult);
}

function onScanFailure(error) {
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { 
    fps: 10, 
    qrbox: {width: 300, height: 300},
    supportedScanTypes: [ Html5QrcodeScanType.SCAN_TYPE_CAMERA ],
  }, false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);

function downloadImage(){
  let url = encodeURIComponent('<?= $url ?>')
  const api = 'https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl='+ url;
  fetch(api)
  .then(e => e.blob())
  .then(blob => {
    const blobUrl = URL.createObjectURL(blob)
    const link = document.createElement('a');
    link.href = blobUrl
    link.download = "Lapangan 1.png";
    link.click()
    URL.revokeObjectURL(blobUrl)
  }).catch(e => console.log(e))
}

</script>