<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
       </section>
     </div>
<!--       <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versi</b> <?php echo SIPATEN_VERSION; ?>
    </div>
   <div class="container text-center">
      <small>Hak Cipta &copy; 2017 - <?php echo date('Y'); ?> Kec. Koba, <a href="">Kab. Koba</a>. All rights
         reserved.<small>
   </div>
</footer> -->
        <div class="modal animated fadeIn modal-danger" id="logout" tabindex="-1" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Keluar!</h4>
                <span><?php echo $this->session->userdata('account')->name; ?>, Yakin anda akan Keluar dari sistem?</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?php echo site_url("login/signout?from_url=" . current_url()) ?>" type="button" class="btn btn-outline"> Iya </a>
              </div>
            </div>
          </div>
        </div>
   </div>
   <script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/fastclick/fastclick.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/app.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/jquery.tableCheckbox.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/jquery.printPage.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/bnotify/bootstrap-notify.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/jquery.timeago.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/moment.min.js"); ?>"></script>
   <script src="<?php echo base_url('public/plugins/validation/js/formValidation.js') ?>"></script>
   <script src="<?php echo base_url('public/plugins/validation/js/framework/bootstrap.js') ?>"></script>
   <script src="<?php echo base_url('public/plugins/validation/js/language/id_ID.js') ?>"></script>
   <script src="<?php echo base_url('public/dist/js/ajaxFileUpload.js'); ?>"></script>
   <script src="<?php echo base_url("public/plugins/select2/select2.full.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/less-1.3.0.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/dist/js/prefixfree.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/datepicker/bootstrap-datepicker.min.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/heightchart/highcharts.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/heightchart/modules/exporting.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/autocomplete/tautocomplete.js"); ?>"></script>
   <script src="<?php echo base_url("public/plugins/bootstrap-tour/js/bootstrap-tour.min.js"); ?>"></script>
   <script type="text/javascript"> 
      var base_url   = '<?php echo site_url(); ?>';
      var base_path  = '<?php echo base_url('public'); ?>';
      var current_url = '<?php echo current_url(); ?>';
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
<?php 
/* End of file footer.php */
/* Location: ./application/modules/Akademik/views/_template/footer.php */
?>