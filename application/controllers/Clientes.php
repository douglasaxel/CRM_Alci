  <?php defined('BASEPATH') or exit('No direct script access allowed');

	class Clientes extends CI_Controller
	{

		var $validation = array(
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

		public function __construct()
		{
			parent::__construct();
			$this->session_control->verify_session();
		}

		public function index()
		{
			$data['list'] = $this->getList();
			$this->load->view('template/restrito', $data);
		}

		public function setAjax()
		{
			die($this->getList());
		}

		public function getList()
		{
			$this->load->library('pagination');
			$config['base_url'] = base_url();
			$config['total_rows'] = $this->db->get('clientes')->num_rows();
			$config['per_page'] = 100;
			$this->pagination->initialize($config);

			$data['clients'] = $this->db->select('*')->from('clientes')->limit($config['per_page'],)->order_by('id DESC')->get()->result_array();
			$data['total'] = $this->db->get('clientes')->num_rows();
			$data['pagination'] = $this->pagination->create_links();;
			return $this->load->view('clientes/list', $data, true);
		}

		public function save()
		{
			$data = $this->input->post(null, true);

			if (!empty($data['id'])) {
				$this->form_validation->set_rules($this->validation);
				if ($this->form_validation->run()) {
					$this->db->where('id', $data['id'])->update('clientes', $data);
					return $this->setAjax();
				} else {
					return 'cpf';
				}
			} else {
				$this->validation[] = array(
					'field' => 'cpf',
					'label' => 'CPF',
					'rules' => 'is_unique[clientes.cpf]',
					array(
						'is_unique[clientes.cpf]' => 'Este CPF já está cadastrado.'
					)
				);
				$this->form_validation->set_rules($this->validation);
				if ($this->form_validation->run()) {
					$this->db->insert('clientes', $data);
					return $this->setAjax();
				} else {
					return 'error';
				}
			}
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
			if (!is_array($id)) 	$aid = $id;
			else 								$aid = implode(',', $id);

			if (!is_array($aid)) {
				$this->db->where("id IN ({$aid})")->delete('clientes');
			}
		}

		public function show($id)
		{
			$data = $this->db->where('id', $id)->get('clientes')->result_array()[0];
			echo json_encode($data);
		}
	}
