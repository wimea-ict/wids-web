<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    protected $CI;
    var $template_data = array();

    function set($name, $value) {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
        $this->CI = & get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }

    public function load_auth($content, $data = NULL) {
        if (!$content) {
            return NULL;
        } else {
            $this->CI = & get_instance();
            $this->template['header'] = $this->CI->load->view('auth/_templates/header', $data, TRUE);
            $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
            $this->template['footer'] = $this->CI->load->view('auth/_templates/footer', $data, TRUE);

            return $this->CI->load->view('auth/_templates/template', $this->template);
        }
    }

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */