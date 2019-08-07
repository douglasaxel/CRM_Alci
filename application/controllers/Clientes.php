  <?php defined('BASEPATH') or exit('No direct script access allowed');

	class Clientes extends CI_Controller
	{

		public function __construct()
		{
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
					'field' => 'regiao',
					'label' => 'Região',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'celular',
					'label' => 'Celular',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'data_nasc',
					'label' => 'Data de nascimento',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_rules($config);
		}

		public function index()
		{
			$data['list'] = $this->getList();
			$this->load->view('template/restrito', $data);
		}

		public function getList() {
			$data['clients'] = $this->db->get('clientes')->result_array();
			$data['total'] = $this->db->get('clientes')->num_rows();
			die($this->load->view('clientes/list', $data));
		}

		public function save()
		{
			$data = $this->input->post(null, true);

			if (!empty($data['id'])) {
				if ($this->form_validation->run()) $this->db->where('id', $data['id'])->update('clientes', $data);
			} else {
				$this->config[] = array(
					'field' => 'cpf',
					'label' => 'CPF',
					'rules' => 'is_unique[clientes.cpf]',
					array(
						'is_unique[clientes.cpf]' => 'Este CPF já está cadastrado.'
					)
				);
				if ($this->form_validation->run()) $this->db->insert('clientes', $data);
			}
			$this->index();
		}

		public function save_desc()
		{
			$data = $this->input->post(null, null);
			echo '<pre>';
			die(print_r($data));
			$this->db->where('id', $data['id'])->update('clientes', $data);
			echo 'success';
			$this->show($data['id']);
		}

		public function edit($id = null)
		{
			$data['cliente'] = $this->db->where('id', $id)->get('clientes')->result_array()[0];
			$this->template->load('template/restrito', 'clientes/edit', $data);
		}

		public function delete($id)
		{
			if(!is_array($id)) 	$aid = $id;
			else 								$aid = implode(',', $id);

			if(!is_array($aid)) {
				$this->db->where("id IN ({$aid})")->delete('clientes');
			}
		}

		public function show($id)
		{
			$data = $this->db->where('id', $id)->get('clientes')->result_array()[0];
			echo json_encode($data);
		}
	}
