<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Session_control {
    var $CI;

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function verify_session() {
        if (empty($this->CI->session->userdata('usuarios'))) {
            redirect('login');
        }
    }
}