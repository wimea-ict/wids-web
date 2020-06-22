<section class="content-header">
                    <h1>
                        Daily
                        <small>Single Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Daily Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>


                  <h3 class='box-title'>DAILY FORECAST PDF UPLOADER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo  site_url('index.php/CSV_file')?>" method="post" enctype="multipart/form-data">
          
 <!-- get the regions for the dailyforecast_region table-->
      <table>
        <tr>
          <td>Upload PDF Document</td>
        </tr> 
        <tr>
          <td><br><br><input type="file" name="file2"  /></td>
        </tr>
       <tr>
         <td><br>
           <input class="btn btn-primary" type="submit" value="Upload Data" />
         </td>
       </tr>
          

    </table>
  </form>

    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
