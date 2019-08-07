  <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Clientes extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->session_control->verify_session();
			$this->load->model('Clients_model');

			$this->config_save = array(
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

			$this->config_update = array(
				array(
					'field' => 'nome',
					'label' => 'Nome',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'sobrenome',
					'label' => 'Sobrenome',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		}

		public function index()
		{
			$this->template->load('template/restrito', 'clientes/list');
		}

		public function clients()
		{
			$data = array();

			// Fetch member's records
			$clients = $this->Clients_model->getRows($this->input->post(null));

			foreach ($clients as $client) {
				$data_nasc = date('d/m/Y', strtotime($client->data_nasc));
				$btn = '<a href="javascript:void(0);" title="Enviar email" name="email" value="' . $client->id . '" class="btn-sm btn-danger btn-fill" style="margin-right: 4px"><i class="fas fa-envelope"></i></i></a>';
				$btn .= '<a href="javascript:void(0);" title="Visulizar" name="show" value="' . $client->id . '" class="btn-sm btn-warning btn-fill btn-show" style="margin-right: 4px"><i class="fas fa-search"></i></i></a>';
				$btn .= '<a href="javascript:void(0);" title="Alterar informações" name="alter" value="' . $client->id . '" class="btn-sm btn-primary btn-fill btn-alter" style="margin-right: 4px"><i class="fas fa-user-edit"></i></i></a>';
				$btn .= '<a href="javascript:void(0);" title="Deletar" name="delete" value="' . $client->id . '" class="btn-sm btn-danger btn-fill btn-delete"><i class="fas fa-trash"></i></i></a>';

				$data[] = array(
					$client->id,
					$client->nome . ' ' . $client->sobrenome,
					$client->cpf,
					$data_nasc,
					$client->regiao,
					$client->celular,
					$btn
				);
			}

			$output = array(
				"draw" => $this->input->post('draw'),
				"recordsTotal" => $this->Clients_model->countAll(),
				"recordsFiltered" => $this->Clients_model->countFiltered($_POST),
				"data" => $data,
			);

			// Output to JSON format
			echo json_encode($output);
		}

		public function save()
		{
			$data = $this->input->post(null, true);

			if($data['id'] != '') {
				$this->form_validation->set_rules($this->config_update);
			} else {
				$this->form_validation->set_rules($this->config_save);
			}

			if ($this->form_validation->run()) {
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

		public function save_desc()
		{
			$data = $this->input->post(null, null);
			$this->db->where('id', $data['id'])->update('clientes', $data);
			echo $data['descricao'];
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
