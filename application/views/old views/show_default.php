 <div class="col-lg-12  col-center-style" style="background-color: #e4ecf3; background-size: cover; ">

<div class="row col-padding"><?php
                          date_default_timezone_set("Africa/Nairobi");
                          $Today = date('y:m:d');
                            $new = date('l, F d, Y', strtotime($Today));
                            echo "<h2>".$new."     "."L. Victoria Basin</h2>";
                            //echo now([timezone ="America/New_York"]);

                ?>
       				</div>

		<div class="row col-padding">
		<div class="col-lg-3 ">
		<div class="col-padding margin-style">
		<?php 
		   $comp =  date('Y-m-d');
		   $sql1 = $this->db->get_where('daily_forecast',array('date' => $comp , 'region' => 3), 1);
		     //foreach ($sql->result_array() as $row)
                     // {
						 //if()
		?>
		<p>Weather conditons</p>
            <div class="card">
		<?php foreach ($sql1->result_array() as $row2)
                      {?>

		<p><?php echo  $row2['time'] ?></p>
					 <?php } ?>
            </div>
		</div>
		</div>




<div class="col-lg-9 ">

<div class="col-lg-3">
<!--<div class="card">-->
<div class=" col-padding margin-style">
<p>Temperature(MAX/MIN)</p>
    <div class="card ">
<?php foreach ($sql1->result_array() as $row2)
                      {?>
		<p><?php echo  $row2['max_temp']."/".$row2['min_temp']  ?></p>
					 <?php } ?>
    </div>
    </div>
</div>
<div class="col-lg-3">

<div class=" col-padding margin-style">
<p>Sunrise</p>
    <div class="card">
<?php foreach ($sql1->result_array() as $row2)
                      {?>
		<p><?php echo  $row2['sunrise'] ?></p>
					 <?php } ?>
</div>
</div>
</div>




<div class="col-lg-3">
<div class=" col-padding margin-style">
<p>Sunset</p>
    <div class="card">
<?php foreach ($sql1->result_array() as $row2)
                      {?>
		<p><?php echo  $row2['sunset'] ?></p>
					 <?php } ?>
    </div>
    </div>
</div>

<div class="col-lg-3">
<div class="col-padding margin-style">
<p >Wind Speed</p>
    <div class="card">
<?php foreach ($sql1->result_array() as $row2)
                      {?>
		<p><?php echo  $row2['wind']."mph"; ?></p>
					 <?php } ?>
    </div>
    </div>
</div>
</div><br/>
            <!--key of disticts-->
            <div class="col-lg-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Regions to Sub Regions to Districts</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="tabdiv"  style="height: 200px;">
                            <div class="tabbed">
                                <input name="tabbed" id="tabbed1" type="radio" checked>
                                <section>
                                    <h1>
                                        <label class = "my_label btn btn-default" for="tabbed1">L.VICTORIA BASIN</label>
                                    </h1>
                                    <div>
                                        <strong>Central and Western Region</strong> </BR>
                                        <p >   Kalangala, Kampala, Wakiso, Masaka, Mpigi,Butambala, Kalungu, Bukomansimbi, Gomba, and Mityana  </p>

                                        <strong>Eastern Region</strong> </BR>
                                        <p >   Jinja, Bugiri, Busia, Mayuge, Namayingo and Tororo  </p>

                                    </div>
                                </section>
                                <input name="tabbed" id="tabbed2" type="radio">
                                <section>
                                    <h1>
                                        <label class = "my_label btn btn-default" for="tabbed2"  >NORTHERN</label>
                                    </h1>
                                    <div>

                                        <strong>North Western</strong> </BR>
                                        <p >  Moyo, Yumbe, Adjumani, Arua, Maracha, Zombo, Nebbi, Koboko</p>



                                        <strong>Central Northern Region</strong> </BR>
                                        <p >Gulu, Apac, Pader, Nwoya, Amuru, Oyam and Kiryandongo </p>



                                        <strong>Eastern Northern Region</strong> </BR>
                                        <p >  Lira, Kitgum, Agago, Lamwo, Otuke, Pader, Alebtong, Kole, Dokolo  </p>



                                    </div>
                                </section>
                                <input name="tabbed" id="tabbed3" type="radio">
                                <section>
                                    <h1>
                                        <label class = "my_label btn btn-default" for="tabbed3">CENTRAL</label>
                                    </h1>
                                    <div>

                                        <strong>Northern and Southern Region</strong> </BR>
                                        <p >  Nakasongola, Luwero, Kyankwanzi, Nakaseke, Kiboga, Mubende, Kasanda, Sembabule, Lwengo, Lyantonde, and Rakai  </p>



                                        <strong>Eastern Region</strong> </BR>
                                        <p >  Mukono, Buikwe, Kayunga, Buvuma  </p>

                                    </div>
                                </section>
                                <input name="tabbed" id="tabbed4" type="radio">
                                <section>
                                    <h1>
                                        <label class = "my_label btn btn-default" for="tabbed4">EASTERN</label>
                                    </h1>
                                    <div>

                                        <strong>South Eastern</strong> </BR>
                                        <p > Kamuli, Iganga, Luuka, Namutumba, Buyende, Kaliro,  Butaleja  </p>



                                        <strong>Eastern Central</strong> </BR>
                                        <p > Pallisa, Budaka, Kibuku, Mbale, Sironko, Manafwa, Bududa, Bulambuli,Kapchorwa, Kween, Bukwo, Bukedea, Kumi, Kaberamaido, Serere and Soroti </p>



                                        <strong>North Eastern</strong> </BR>
                                        <p > Amuria, Katakwi, Moroto, Kotido, Nakapiripirit, Abim, Napak, Amudat, Kaabong </p>

                                    </div>
                                </section>
                                <input name="tabbed" id="tabbed5" type="radio" >
                                <section>
                                    <h1>
                                        <label class = "my_label btn btn-default" for="tabbed5">WESTERN</label>
                                    </h1>
                                    <div>
                                        <strong>Central Western Region</strong> </BR>
                                        <p > Bundibugyo, Ntoroko, Kabarole, Kyenjojo, Kyegegwa ,Kamwenge,Masindi,Buliisa, Hoima, Kakumiro,  Kibaale</p>
                                        <strong>South Western Region</strong> </BR>
                                        <p >  Kasese, Kabale, Kisoro, Rukungiri, Kanungu, Ntungamo, Mbarara, Kiruhura,Isingiro, Ibanda, Bushenyi, Buhweju, Mitooma, Sheema ,Rubirizi</p>

                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
</div>
<!--</div>-->

<div class="row col-padding weather-icon-container" style="min-height: 50px;">
    <h3 style="text-align: center">Today</h3>
<?php 
$today = date('y-m-d');
   // $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'time' => 'Morning'), 5);
    $sql2 = "SELECT daily_forecast.region, daily_forecast.time, daily_forecast.cat_id FROM daily_forecast WHERE date = '$comp' GROUP BY daily_forecast.region, daily_forecast.time, daily_forecast.cat_id";
    $sql3 = $this->db->query($sql2);
    foreach ($sql3->result_array() as $row1)
                      {

					$sea1 = $this->db->get_where('category',array('id'=>$row1['cat_id']));
                          $sea2 = $this->db->get_where('region',array('id'=>$row1['region']));
						  ?>
<div class="col-lg-2" style="margin-left: 20px;">

<div class=" col-padding margin-style">

<h4><?php foreach ($sea2->result() as $p){ echo $p->name ; } ?></h4>
<div class="card">
<?php foreach ($sea1->result() as $p){ ?>
  <img src="<?php echo base_url()?>assets/frameworks/adminlte/<?php   echo $p->img; ?>" alt="Avatar<?php echo $row1['cat_id']; ?>" style="width:100%">
<p><?php echo  $p->cat_name; ?></p>
<?php } ?>
</div>
</div>
</div>
	 <?php } ?>


</div>

</div> 
 <!--<div class="col-lg-5  col-center-style" style="background-color: #e4ecf3; background-size: cover; ">

 </div>-->