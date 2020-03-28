<?php
require_once __DIR__.'/SimpleXLSX.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CSV_file extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
		$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('CSV_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

//index function 

public function converter()
{
     //$dir = 'assets/frameworks/adminlte/img/'.$filename;  
    //$pdf_file = 'assets/frameworks/adminlte/img/test.pdf';
    $pdf_file = fopen("assets/frameworks/adminlte/img/test.pdf", "r") or die("Unable to open file!");
echo fread($pdf_file,filesize("test.pdf"));
fclose($pdf_file);

if (!is_readable($pdf_file)) {
        print("Error: file does not exist or is not readable: $pdf_file\n");
        return;
}

$c = curl_init();

$cfile = curl_file_create($pdf_file, 'assets/frameworks/adminlte/img/');

$apikey = '1mryuygw0ww2 '; // from https://pdftables.com/api
curl_setopt($c, CURLOPT_URL, "https://pdftables.com/api?key=$apikey&format=csv");
curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_FAILONERROR,true);
curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");

$result = curl_exec($c);

if (curl_errno($c) > 0) {
    print('Error calling PDFTables: '.curl_error($c).PHP_EOL);
} else {
  // save the CSV we got from PDFTables to a file
  file_put_contents ($pdf_file . ".csv", $result);
}

curl_close($c);
 }





    public function index()
    {
        // echo dirname('file.xlsx');
        // $_FILES['file'
       if ( $xlsx = SimpleXLSX::parse( $_FILES['file']['tmp_name'] )) {

            // output worsheet 1

            $dim = $xlsx->dimension();
            $num_cols = $dim[0];
            $num_rows = $dim[1];

            $val = "";
            $sum = "";
            $temp=array(); $wind_dir=array(); $wind_str=array();
            $weather_desc=array(); $region=array();

            for($p=0;$p<sizeof($xlsx->rows( 0 ));$p++){

                for($i=0;$i<$num_cols;$i++){
                    switch ($xlsx->rows( 0 )[$p][$i]) {
                        case 'Temperatures':
                            $weather_desc[] = ($xlsx->rows( 0 )[$p-1][$i+1] == "")? $xlsx->rows( 0 )[$p-2][$i+1] = ($xlsx->rows( 0 )[$p-2][$i+1] == "")? ($xlsx->rows( 0 )[$p-3][$i+1]=="")? $xlsx->rows( 0 )[$p-2][$i+2] : $xlsx->rows( 0 )[$p-3][$i+1] : $xlsx->rows( 0 )[$p-2][$i+1] : $xlsx->rows( 0 )[$p-1][$i+1];
                            $temp[]=substr($xlsx->rows( 0 )[$p][$i]=($xlsx->rows( 0 )[$p][$i+1]=="")? $xlsx->rows( 0 )[$p][$i+2]:$xlsx->rows( 0 )[$p][$i+1], 0,2);
                            break;
                        case 'Wind direction':
                            $wind_dir[]=$xlsx->rows( 0 )[$p][ $i+1 ]=($xlsx->rows( 0 )[$p][ $i+1 ]=='')?$xlsx->rows( 0 )[$p][ $i+2 ]:$xlsx->rows( 0 )[$p][ $i+1 ];
                            break;
                        case 'Wind strength':
                            $wind_str[]=$xlsx->rows( 0 )[$p][ $i+1 ]=($xlsx->rows( 0 )[$p][ $i+1 ]=='')?$xlsx->rows( 0 )[$p][ $i+2 ]:$xlsx->rows( 0 )[$p][ $i+1 ];
                            break;
                        case 'Weather description':
                            $region[]=explode('(', $xlsx->rows( 0 )[$p][ 0 ])[0];
                            break;
                        default:
                            # code...
                            break;
                    }
                }

                if(strpos($xlsx->rows( 0 )[$p][0], "Today") !== false){
                    $val = $p;
                    $sum = $xlsx->rows( 0 )[$p][0];

                    
                }else if(strpos($xlsx->rows( 0 )[$p][0], "Below") !== false){
                    if(($p-$val)>1){
                        $sum .= " ".$xlsx->rows( 0 )[$p-1][0];
                    }
                }

                if(strpos($xlsx->rows( 0 )[$p][0], "Duty Forecaster") !== false){
                    $forecaster = (substr($xlsx->rows( 0 )[$p][0], 17)=="")? $xlsx->rows( 0 )[$p][1] : substr($xlsx->rows( 0 )[$p][0], 17);  
                }  
            }

            // Changing the format of the issue date of the forecast
            $i_date="";
            $iss_date = explode(' ',( $xlsx->rows( 0 )[6][1]=='')? substr($xlsx->rows( 0 )[6][0], 15): $xlsx->rows( 0 )[6][1]);
            for($i=1;$i<sizeof($iss_date);$i++){
                $i_date .= $iss_date[$i];
            }
            $issue_date = date('Y-m-d', strtotime($i_date));



            // Changing the format of the forecast date
            $fo_date="";
            $f_date = explode(' ', ($xlsx->rows( 0 )[7][1]=='')? substr($xlsx->rows( 0 )[7][0], 14):$xlsx->rows( 0 )[7][1]);
            for($i=1;$i<5;$i++){
                $fo_date .= $f_date[$i];
            }
            $forecast_date = date('Y-m-d', strtotime($fo_date));


            // The time forecasted morning or afternoon etc
            $time =(substr(explode(',', $xlsx->rows( 0 )[7][1])[1], 5)=='')? substr(explode(',', substr($xlsx->rows( 0 )[7][0], 14))[1], 5): substr(explode(',', $xlsx->rows( 0 )[7][1])[1], 5);
            $valid = (explode(' ', $xlsx->rows( 0 )[8][1])[2]=='')? explode(' ', substr($xlsx->rows( 0 )[8][0], 15))[2]: explode(' ', $xlsx->rows( 0 )[8][1])[2];

            if($time==""){
                $time="Evening"; //for midnight
            }

            // Insert daily forcest
            $data_to_insert = array(
                'language_id'   => 1,
                'weather'       => $sum,
                'date'          => $forecast_date,
                'time'          => $this->CSV_model->get_time(trim($time))->id,
                'issuedate'     => $issue_date,
                'validitytime'  => $valid,
                'dutyforecaster'=> $forecaster
            );


            $this->CSV_model->insert_daily($data_to_insert);
            
            for($m=0;$m<sizeof($temp);$m++){
                $wet_cat =( $this->CSV_model->get_weather_cat(trim($weather_desc[$m])=="")->id)? 10: $this->CSV_model->get_weather_cat(trim($weather_desc[$m]))->id;
                $data_to_insert2 = array(
                    'mean_temp'     => $temp[$m],
                    'max_temp'      => $temp[$m],
                    'min_temp'      => $temp[$m],
                    'wind'          => $temp[$m],
                    'wind_direction'=> $wind_dir[$m],
                    'wind_strength' => $wind_str[$m],
                    'region_id'     => ($m+1),
                    'weather_cat_id'=> ($wet_cat=="")? 10: $wet_cat,
                    'forecast_id'   => $this->CSV_model->get_recent_forecast()->id
                );
                $this->CSV_model->insert_daily_data($data_to_insert2);
            }
            

            $min=array();
            for($m=0;$m<sizeof($temp);$m++){
                $min[]=$this->CSV_model->get_region(($m+1))->region_name;
            }
            
            $data = array(
                'issue_date' => $issue_date,
                'forecast_date' => $forecast_date,
                'time' => $time,
                'valid' => $valid,
                'sum' => $sum,
                'weather_desc' => $weather_desc,
                'temp' => $temp,
                'wind_dir' => $wind_dir,
                'wind_str' => $wind_str,
                'forecaster' => $forecaster,
                'regs' => $min,
                'change' => 91
            );
            
            $this->load->view('template',$data);



        } else {
            echo SimpleXLSX::parseError();
        }
    }

}

/* End of file Daily_forecast.php */
