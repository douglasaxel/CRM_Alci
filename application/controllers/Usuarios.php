<?php defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->session_control->verify_session();

        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required'
            ),
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'required|is_unique[usuarios.login]|trim',
                array(
                    'is_unique[usuarios.login]' => 'Este %s já está cadastrado.'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|trim'
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
    }

    public function index()
    {
        $data['usuarios'] = $this->db->get('usuarios')->result_array();
        $this->template->load('template/restrito', 'usuarios/list', $data);
    }

    public function save()
    {
        $data = $this->input->post(null, true);
        if (!empty($data['id'])) {
            $this->db->where('id', $data['id'])->update('usuarios', $data);
        } else {
            if ($this->form_validation->run() == true) {
                $this->db->insert('usuarios', $data);
            }
        }
        $this->index();
    }

    public function edit($id = null)
    {
        $data['usuario'] = $this->db->where('id', $id)->get('usuarios')->result_array()[0];
        $this->template->load('template/restrito', 'usuarios/edit', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('usuarios');
        $this->index();
    }

    public function search()
    {
        $text = $this->input->post('search', true);

        $data['usuarios'] = $this->db->like('id', $text)
            ->or_like('nome', $text)
            ->or_like('sobrenome', $text)
            ->or_like('cpf', $text)
            ->or_like('data_nasc', $text)
            ->or_like('regiao', $text)
            ->or_like('celular', $text)
            ->get('usuarios')
            ->result_array();

        $this->template->load('template/restrito', 'usuarios/list', $data);
    }

    public function show($id)
    {
        $rs['show'] = $this->db->where('id', $id)->get('usuarios')->result_array()[0];
        $rs['usuarios'] = $this->db->get('usuarios')->result_array();
        $this->template->load('template/restrito', 'usuarios/list', $rs);
    }
}
