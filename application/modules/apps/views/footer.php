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
    <script type="text/javascript">
        var base_url = '<?php echo site_url('apps/'); ?>',
            base_path  = '<?php echo base_url('public'); ?>';
            current_url = '<?php echo current_url(); ?>';
            my_channel = 'channel-<?php echo $this->session->userdata('account')->nip; ?>';

      $('.button-collapse').sideNav();

        $('.datepicker').pickadate({
          selectMonths: true, 
          selectYears: 15 
        });

        $('.modal').modal();
      
        $('.carousel.carousel-slider').carousel({fullWidth: true});  
    </script>
   <?php 

   /**
    * Load js from loader core
    *
    * @return CI_OUTPUT
    **/
   if($this->load->get_js_files() != FALSE) : 
      foreach($this->load->get_js_files() as $file) :  
    ?>
    <script src="<?php echo $file; ?>"></script>
   <?php 
      endforeach; 
    endif; 
  ?>
</body>
</html>