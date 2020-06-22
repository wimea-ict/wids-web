<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advisory extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('Advisory_model');
		 $this->load->model('Major_model');
         $this->load->model('Minor_model');
         $this->load->model('Product_model');
		  $this->load->model('Region_model');
           $this->load->model('Decadal_forecast_model');
            $this->load->model('Daily_forecast_model'); 
        $this->load->library('form_validation');
        $this->load->library('session');//Major_model		
    }

    
    public function index()
    {
        $id= $this->uri->segment(3);
    $advisory = $this->Advisory_model->get_all($id);
    
    //print_r($advisory); exit();
    $data = array(
            'change' => 5,
            'forecast_id' => $id,
            'advisory_data' => $advisory
        );

        $this->load->view('template', $data);
    }

    // Replace whole function
    public function read()
    {
    //echo $id;
    //exit;
        $id = $this->uri->segment(3);
    //change messageluganda
    $data = array(
        'change' => 8,
        'advisory_read' => $this->Advisory_model->get_by_id_replaced($id),
        'rem' => "show"
    );
        $this->load->view('template', $data);
    }

    public function daily()
    {
    $data = array(
            'change' => 84,
            'get_all_advisory' => $this->Daily_forecast_model->get_all_advisory()
        );

        $this->load->view('template', $data);
    }

    public function daily1()
    {
    $data = array(
            'change' => 84,
            'get_all_advisory' => $this->Daily_forecast_model->get_all_advisory($this->uri->segment(3))
        );

        $this->load->view('template', $data);
    }
    public function create()
    {
        $selected = $this->input->post('selected_sector');
       $data = array(
           'selected' =>$selected ,
           'error' => '',
            'button' => 'Create',
            'id' => set_value('id'),
            'type' => set_value('type'),
            'msg' => set_value('msg'),
            'summary' => set_value('summary'),
            'audio' => set_value('audio'),
            'change' => 6
    );
    $data['category'] = $this->Product_model->get_category()->result();
	$data['region_data']= $this->Region_model->get_all();
	$data['sector_data']= $this->Minor_model->get_categories()->result();
    $data['forecast_id']= $this->uri->segment(3);
    //print_r($data);exit();
    $this->load->view('template', $data);
    }
    
        public function dekadal()
    {
    
    $data = array(
            'change' => 82,
            'get_all_advisory' => $this->Decadal_forecast_model->get_all_advisory()
        );

        $this->load->view('template', $data);
    }
	
	 // DEKADAL WORD 
    public function dekadal_advisory_word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ward.doc");

        $data = array(
            
            'get_all_advisory' => $this->Decadal_forecast_model->get_all_advisory(),
            'start' => 0
        );

        $this->load->view('advisory_dekadal_doc',$data);
    }

    public function dekadaladvisory_pdf()
    {
        $data = array(
            'get_all_advisory' => $this->Decadal_forecast_model->get_all_advisory(),
            'start' => 0
        );

        ini_set('memory_limit', '10G');
        $html = $this->load->view('advisory_dekadal_doc', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('advisory.pdf', 'D');
    }

	



    //========get selected sector with ajax-------------
 

    function get_sub_category(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->product_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
    function get_sub_category1(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->Product_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
    //-------------------------------------------------
  
    public function create_action()
    {
        
                // Loop to store and display values of individual checked checkbox.
   
           
            $datatoinsert = array(
             'forecast_id' => $this->input->post('forecast_id',TRUE),
             'advice' => "Seasonal",
             'sector' => $this->input->post('category',TRUE),
             'message_summary' => $this->input->post('summary',TRUE)
        );
        $this->Advisory_model->insert($datatoinsert);
        $advisory = $this->Advisory_model->get_all();
        $data = array(
            'change' => 5,
            'advisory_data' => $advisory
        );          
          
           $this->load->view('template', $data);
        
    }

    public function update($id)
    {
        $row = $this->Advisory_model->get_by_id($id);

        if ($row) {
            $luganda = $row->messageLuganda;
            $english = $row->message;

            if($english!=NULL)
                $msg = str_replace("<br/>", "." ,$english );
            elseif($luganda!=NULL)
            $msg = str_replace("<br/>", "." ,$luganda);
            $data = array(
                'error' => '',
                'button' => 'Update',
                'action' => site_url('index.php/Advisory/update_action'),
                'record_id' => set_value('id', $row->record_id),
                'region' => set_value('region', $row->region),
                'sub' => set_value('sub', $row->subregionid),
                'type' => set_value('type', $row->type),
                'advise' => set_value('advise', $row->advice),
                'msg' => set_value('msg', $msg),
                'audio' => set_value('audio', $row->audio),
                'change' => 9,
	    );
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
            $this->load->view('template', $data);
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (!empty($_FILES['userfile']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile')) {
                    $row = $this->Advisory_model->get_by_id($this->input->post('id', TRUE));
                    if ($row) {
                        $luganda = $row->messageLuganda;
                        $english = $row->message;
                        // var_dump($luganda);
                        // var_dump($english);
                        // exit;
                        if($english!=NULL)
                            $msg = str_replace("<br/>", "." ,$english );
                        elseif($luganda!=NULL)
                            $msg = str_replace("<br/>", "." ,$luganda);
                        $data = array(
                            'error' => $this->upload->display_errors(),
                            'button' => 'Update',
                            'action' => site_url('index.php/Advisory/update_action'),
                            'record_id' => set_value('id', $row->record_id),
                            'region' => set_value('region', $row->region),
                            'sub' => set_value('sub', $row->subregionid),
                            'type' => set_value('type', $row->type),
                            'advise' => set_value('advise', $row->advice),
                            'msg' => set_value('msg', $msg),
                            'audio' => set_value('audio', $row->audio),
                            'change' => 9,
                        );
                        $upload = "not_OK";
                        $this->load->view('template', $data);
                    } else {
                        $upload = "not_OK";
                        $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
                        $this->load->view('template', $data);
                    }
                } else {
                    $upload = "OK";
                    $temp = $this->upload->data();
                    $image = $temp['file_name'];
                    $image = 'food_agric/' . $image;

                    $odd = $this->input->post('audio', TRUE);
                    if(strpos($odd,'no image')){
                        //echo "no file uploaded yet";

                    }else {
                        $path = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads/' . $odd;

                        $this->remove_file($path);
                    }

                }
            } else {
                $image = $this->input->post('audio', TRUE);
                $upload = "OK";
            }
            if ($upload == "OK") {
                $all = $this->input->post('msg', TRUE);
                $all = str_replace(".", ".<br/>", $all);

                $all .= "<br>";
                if (!empty($_POST['check_list'])) {

                    // Loop to store and display values of individual checked checkbox.
                    foreach ($_POST['check_list'] as $selected) {
                        $all .= $selected;
                    }

                }


                $data = array(
                    'msg' => $all,
                    'file1' => $image,
                );

                $this->Advisory_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
                $advisory = $this->Advisory_model->get_all();
                $data = array(
                    'change' => 5,
                    'advisory_data' => $advisory
                );
                $this->load->view('template', $data);
            }
        }
    }

    

    public function delete($id)
    {
        $row = $this->Advisory_model->get_by_id($id);
        $advisory = $this->Advisory_model->get_all();
	         $data = array(
			   'change' => 5,
              'advisory_data' => $advisory
             );
        if ($row) {
            if(strpos($row->audio,'no image')){
                //echo "no file uploaded yet";

            }else {
                $path = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads/' . $row->audio;

                $this->remove_file($path);
            }
            $this->Advisory_model->delete($id);
            $this->session->set_flashdata('message', '<font color="green" size="5">Delete Record Success</font>');
             $this->index();
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
             $this->index();
        }
    }
    public function remove_file($pp)
    {
        if (file_exists($pp)) {
            unlink($pp);
        }
        //else{
        // echo "path not found";
        //}
    }

   public function _rules()
    {
	$this->form_validation->set_rules('advisory', 'Advisory message', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ward.xls";
        $judul = "ward";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Ward Name");

	foreach ($this->Ward_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ward_name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ward.doc");

        $data = array(
            'advisory_data' => $this->Advisory_model->get_all(),
            'start' => 0
        );

        $this->load->view('Advisory_doc',$data);
    }
    public function pdf()
    {
        $data = array(
            'Advisory_data' => $this->Advisory_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '10G');
        $html = $this->load->view('advisory_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('advisory.pdf', 'D');
    }
	
	
	 public function dailyadvisory_word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=dailyadvisory.doc");

        $data = array(
            
            'get_all_advisory' => $this->Daily_forecast_model->get_all_advisory(),
            'start' => 0
        );

        $this->load->view('daily_advisory',$data);
    }

    public function dailyadvisory_pdf()
    {
        $data = array(
            'get_all_advisory' => $this->Daily_forecast_model->get_all_advisory(),
            'start' => 0
        );

        ini_set('memory_limit', '10G');
        $html = $this->load->view('daily_advisory', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('dailyadvisory.pdf', 'D');
    }

	
	
	
	
	
	
    public function do_upload()
    {
        $config['upload_path'] = './uploads/food_agric/';
        $config['allowed_types'] = 'mp3';
        $config['max_size'] = 500000;
        $config['max_width'] = 5000000;
        $config['max_height'] = 5000000;

        $this->load->library('upload', $config);
    }

}

/* End of file Ward.php */
