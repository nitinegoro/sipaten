    <div id="logoff" class="modal">
        <div class="modal-content">
            <h5>Keluar Aplikasi?</h5>
        </div>
        <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
            <a href="<?php echo site_url('apps/login/signout') ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
        </div>
    </div>
    <script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/android/js/materialize.js"); ?>"></script>
    <script src="<?php echo base_url("public/android/js/init.js"); ?>"></script>
    <script>
      $('.datepicker').pickadate({
      selectMonths: true, 
      selectYears: 15 
      });

      $('.modal').modal();
      
      $('.carousel.carousel-slider').carousel({fullWidth: true});  
    </script>



</body>
</html>