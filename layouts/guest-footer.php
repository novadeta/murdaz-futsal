  

  <!-- plugin for charts  -->
  <script src="<?= $url ?>/assets/js/plugins/chartjs.min.js" async></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="<?= $url ?>/assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="<?= $url ?>/assets/js/guest.js" async></script>
  </body>
</html>
  <script>
    let drop = document.getElementById('drop')
      drop.addEventListener('click', function(e){
        this.classList.toggle('active')
      })
      flatpickr(".flat", {
      dateFormat: "Y-m-d",
      minDate: "today"
    });
      flatpickr(".time", {
        dateFormat: "H:i:s",
        enableTime: true,
        noCalendar: true,
        time_24hr: true
      });
  </script>
