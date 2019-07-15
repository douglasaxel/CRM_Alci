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
					'field' => 'cpf',
					'label' => 'CPF',
					'rules' => 'is_unique[clientes.cpf]',
					array(
						'is_unique[clientes.cpf]' => 'Este CPF já está cadastrado.'
					)
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
			$this->form_validation->set_error_delimiters('', '');
		}

		public function index()
		{
			$columns = array(
				0 => 'id',
				1 => 'nome',
				2 => 'cpf',
				3 => 'data_nasc',
				4 => 'regiao',
				5 => 'celular'
			);

			$limit = $this->input->post('length');
			$start = $this->input->post('start');
			$order = $columns[$this->input->post('order')[0]['column']];
			$dir = $this->input->post('order')[0]['dir'];

			$totalData = $this->Clientes_Model->allclients_count();

			$totalFiltered = $totalData;

			if (empty($this->input->post('search')['value'])) {
				$clients = $this->Clientes_Model->allclients($limit, $start, $order, $dir);
			} else {
				$search = $this->input->post('search')['value'];

				$clients =  $this->Clientes_Model->clients_search($limit, $start, $search, $order, $dir);

				$totalFiltered = $this->Clientes_Model->clients_search_count($search);
			}

			$data = array();
			if (!empty($clients)) {
				foreach ($clients as $client) {

					$nestedData['id'] = $client->id;
					$nestedData['title'] = $client->title;
					$nestedData['body'] = substr(strip_tags($client->body), 0, 50) . "...";
					$nestedData['created_at'] = date('j M Y h:i a', strtotime($client->created_at));

					$data[] = $nestedData;
				}
			}

			$json_data = array(
				"draw"            => intval($this->input->post('draw')),
				"recordsTotal"    => intval($totalData),
				"recordsFiltered" => intval($totalFiltered),
				"data"            => $data
			);

			echo json_encode($json_data);
		}
	}
