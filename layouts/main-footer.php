
  <script src="<?= $url ?>/assets/js/plugins/chartjs.min.js" async></script>
  <!-- plugin for scrollbar  -->
  <script src="<?= $url ?>/assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="<?= $url ?>/assets/js/guest.js" async></script>
  <script>
    let e = document.getElementById('dropuser')
      e.addEventListener('click', function(e){
        this.classList.toggle('active')
      })
  </script>
</html>