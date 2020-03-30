<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><?php echo lang('footer_version'); ?></b> 1.3.0
                </div>
                <strong><?php echo lang('footer_copyright'); ?> &copy; 2016-<?php echo date('Y'); ?> <a href="#" target="_blank">Weather repository</a> &amp; <a href="#" target="_blank">WIMEA Projects</a>.</strong> <?php echo lang('footer_all_rights_reserved'); ?>.
            </footer>
        </div>

       <script src="<?php echo base_url($plugins_dir . '/jQueryUI/jquery-ui.min.js'); ?>"></script>
        
        <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
		<!-- DataTables -->
		<script src="<?php echo base_url($plugins_dir . '/datatables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url($plugins_dir . '/datatables/dataTables.bootstrap.min.js');?>"></script>
		<!-- bootstrap datepicker -->
		<script src="<?php echo base_url($plugins_dir . '/datepicker/bootstrap-datepicker.js');?>"></script>
		<!-- bootstrap time picker -->
		<script src="<?php echo base_url($plugins_dir . '/timepicker/bootstrap-timepicker.min.js');?>"></script>
		<!-- Select2 -->
		<script src="<?php echo base_url($plugins_dir . '/select2/select2.full.min.js');?>"></script>
		<script src="<?php echo base_url($frameworks_dir . '/notify/notify.min.js'); ?>"></script>
		<!-- page script -->
		<script>
		$(function() {
			$('#example1').dataTable({
			});
			});
			$(function () {
			/*$("#example1").DataTable();*/
			$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false
			});
			$('select').select2();
			});
				
	$(function () {
	/*Initialize Select2 Elements */
	$(".chzn").select2();

    /*Datemask dd/mm/yyyy */
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    /*Datemask2 mm/dd/yyyy */
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});


    /*Date picker */
    $('#datepicker').datepicker({
      autoclose: true
    });

    /*Timepicker */
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
  
    $(".treeview").on("click")({
		 $(".treeview").addClass("active");
	});
		</script>

<?php if ($mobile == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
    </body>
</html>