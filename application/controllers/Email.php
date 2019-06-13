<?php defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->session_control->verify_session();
        $this->load->library('email');
        $config = array(
            'protocol'     => 'smtp',
            'smtp_host'    => 'ssl://smtp.gmail.com',
            'smtp_port'    => 465,
            'smtp_timeout' => '7',
            'smtp_user'    => 'alcijacobshneid@gmail.com',
            'smtp_pass'    => 'ajs08041944',
            'charset'      => 'utf-8',
            'newline'      => "\r\n",
            'mailtype'     => 'text', // or html
            'validation'   => TRUE
        ); // bool whether to validate email or not      

        $this->email->initialize($config);
    }

    public function index($id, $table)
    {
        $data['person'] = $this->db->where('id', $id)
            ->get($table)
            ->result_array()[0];

        $this->template->load('template/restrito', 'email', $data);
    }

    public function send()
    {
        $data = $this->input->post(null, true);
        $this->load->library('email');
        $config = array(
            'protocol'     => 'smtp',
            'smtp_host'    => 'ssl://smtp.gmail.com',
            'smtp_port'    => '465',
            'smtp_timeout' => '7',
            'smtp_user'    => 'alcijacobshneid@gmail.com',
            'smtp_pass'    => 'ajs08041944',
            'charset'      => 'utf-8',
            'newline'      => "\r\n",
            'mailtype'     => 'text', // or html
            'validation'   => TRUE
        ); // bool whether to validate email or not      

        $this->email->initialize($config);
        $this->email->from('alcijacobshneid@gmail.com', 'Pastor Alci');
        $this->email->to($data['email']);

        $this->email->subject($data['assunto']);
        $this->email->message($data['mensagem']);

        if ($this->email->send()) {
            echo 'saporra mesmo';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
