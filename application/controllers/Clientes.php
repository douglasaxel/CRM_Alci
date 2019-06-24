  <?php defined('BASEPATH') or exit('No direct script access allowed');

  class Clientes extends CI_Controller {

      public function __construct() {
          parent::__construct();
          $this->session_control->verify_session();

          $config = array(
              array(
                  'field' => 'nome',
                  'label' => 'Nome',
                  'rules' => 'trim|required'
              ),
              array(
                  'field' => 'sobrenome',
                  'label' => 'Sobrenome',
                  'rules' => 'trim|required'
              ),
              array(
                  'field' => 'cpf',
                  'label' => 'CPF',
                  'rules' => 'is_unique[clientes.cpf]',
                  array(
                      'is_unique[clientes.cpf]' => 'Este CPF já está cadastrado.'
                  )
              )
          );

          $this->form_validation->set_rules($config);
          $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
      }

      public function index() {
          $data['clientes'] = $this->db->get('clientes')->result_array();
          $this->template->load('template/restrito', 'clientes/list', $data);
      }

      public function save() {
          $data = $this->input->post(null, true);
          unset($data['site_url']);

          if($this->form_validation->run()){
              if (!empty($data['id'])) {
                  $this->db->where('id', $data['id'])->update('clientes', $data);
              } else {
                  if ($this->form_validation->run() == true) {
                      $this->db->insert('clientes', $data);
                  }
              }
          } else {
              unset($data);
              $data['error'] = validation_errors();
          }
          echo json_encode($data);
      }

      public function save_desc() {
          $data = $this->input->post(null, null);
          $this->db->where('id', $data['id'])->update('clientes', $data);
          echo $data['descricao'];
      }

      public function edit($id = null) {
          $data['cliente'] = $this->db->where('id', $id)->get('clientes')->result_array()[0];
          $this->template->load('template/restrito', 'clientes/edit', $data);
      }

      public function delete($id) {
          $this->db->where('id', $id)->delete('clientes');
      }

      public function show($id) {
          echo json_encode($data = $this->db->where('id', $id)->get('clientes')->result_array()[0]);
      }
  }
