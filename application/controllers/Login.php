<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $link['link'] = '<link href="'. base_url() .'assets/css/login.css" rel="stylesheet">';
        $this->template->load('template/template', 'login', $link);
    }

    public function authenticate() {
        $login = $this->input->post('login');
        $senha = md5('as65d!#12'.$this->input->post('password').'oliçl!%21SD');

        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $data = $this->db->get('usuarios');

        if ($data->num_rows() == 1) {
            $user = $data->row();
            $this->session->set_userdata('usuarios', $user->nome);
            redirect('clientes/index');
        } else {
            redirect('login/index');
        }
    }

    public function logout() {
        $this->session->set_userdata('usuarios', '');
        redirect('login/index');
    }
}