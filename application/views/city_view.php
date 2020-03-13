
        <!-- Main content -->

        <section class="content-header">

<h1>
    City
    <small>Data tables</small>
</h1>


<ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Seasonal Forecast</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
</ol>
</section>

<section class='content'>
<div class='row'>
<div class='col-xs-12'>
<div class='box'>
<div class='box-header'>

<h3 class='box-title'>LIST OF CITIES <?php


if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
echo anchor('index.php/season/create/','Create',array('class'=>'btn btn-danger btn-sm'));
}else{

}?>


<!-- change the link -->
<?php echo anchor(site_url('index.php/city/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>


<?php echo anchor(site_url('index.php/city/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>

<?php echo anchor(site_url('index.php/City/displayform'), '<i class="fa fa-plus"></i> Add New', 'class="btn btn-primary btn-sm"'); ?>



<div class='box-body'   >
<table class="table table-bordered table-striped" id="mytable">
<thead>
<tr>
<th width="80px">No</th>
<th>City Name</th>



<th>Division Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$start = 0;
// print_r($city_data); exit();
foreach ($city_data as $c)
{

?>
<tr>
<td><?php echo ++$start ?></td>
<td><?php echo $c['city_name']; ?></td>

<td><?php echo $c['division_name']; ?></td>
<td style="text-align:center" width="140px">
<?php
echo '  ';
echo anchor(site_url('index.php/City/update/'.$c['id']),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'Edit','class'=>'btn btn-primary btn-sm'));
echo '  ';
echo anchor(site_url('index.php/City/delete/'.$c['id']),'<i class="fa fa-trash-o"></i>','title="Delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 

?>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
<script src="<?php echo base_url('assets/frameworks/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
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
