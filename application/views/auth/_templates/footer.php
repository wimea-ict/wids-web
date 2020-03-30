<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
        </div>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/adminlte.min.css">

        <script src="<?php echo base_url() ?>assets/frameworks/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/icheck/js/icheck.min.js"></script>
        <script>
            $(function(){
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>