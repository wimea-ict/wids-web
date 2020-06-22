
        <!-- Main content --> 

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>USSD <?php $lan = ""; foreach ($language as $d){ $lan = $d->language; echo strtoupper($lan);} ?> TRANSLATIONS </h3>
      
                </div><!-- /.box-header --> <!--style=" overflow-y: scroll;"-->
                <div class='box-body'   >
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                  <th>English Format</th>
                  <th><?=$lan ?> Translations</th> 
               </tr>
            </thead>
            <tbody>
                  <?php
                  foreach ($language_trans as $dd)
                  {
                  ?>
                  <tr>
                    <td width="40%"><?php echo str_replace("-", "<br>", $dd->eng); ?></td>
                    <td><?php echo str_replace("-", "<br>", $dd->trans); ?></td>
                  </tr>
                  <?php
                  } 
                  ?>
                  <tr>
                    <td colspan="2">
                     <a href="<?php echo base_url().'index.php/USSD/index'; ?>"> <button class="btn btn-primary">Close</button></a>
                    </td>
                  </tr>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/frameworks/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">

                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>