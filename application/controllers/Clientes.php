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

      public function index($limit = 1000) {
          $data['clientes'] = $this->db->limit($limit)->get('clientes')->result_array();
          $this->template->load('template/restrito', 'clientes/list', $data);
      }

      public function save() {
          $data = $this->input->post(null, true);
          unset($data['site_url']);

          if($this->form_validation->run() || !empty($data['id'])){
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

      public function search() {
				$data = $this->input->post('search', true);
				// echo '<pre>'; die(print_r($data));
				$data = $this->db->select("* from clientes where nome like '%{$data}%' or sobrenome like '%{$data}%' or cpf like '%{$data}%' or data_nasc like '%{$data}%' or regiao like '%{$data}%' or celular like '%{$data}%'", false)
												// ->from('clientes')
												// ->like('nome', '%'.$data.'%')
												// ->or_like('sobrenome', '%'.$data.'%')
												// ->or_like('cpf', '%'.$data.'%')
												// ->or_like('data_nasc', '%'.$data.'%')
												// ->or_like('regiao', '%'.$data.'%')
												// ->or_like('celular', '%'.$data.'%')
												->get()
												->result_array();

				if(isset($_POST['order'])) {
					// $or = $this->db->
				}
				// echo '<pre>'; die(print_r($data));
        echo json_encode($data);
			}
			
			public function output($draw, numFilterRow, $data) {
				return $output = array(
									"draw"       =>  intval($_POST["draw"]),
									"recordsTotal"   =>  $this->db->from('clientes')->count_all_results(),
									"recordsFiltered"  =>  $number_filter_row,
									"data"       =>  $data
								);
			}

    //   public function develop() {
    //     echo '<pre>';
    //     for($i = 30000; $i < 30001; $i++) {
    //         $data['nome'] = $i;
    //         $data['sobrenome'] = $i;
    //         $data['cpf'] = $i;
    //         $data['data_nasc'] = Date('Y-m-d');
    //         $data['endereco'] = "Rua {$i}, {$i}";
    //         $data['bairro'] = $i;
    //         $x = rand(0, 6);
    //         switch($x) {
    //             case 0:
    //                 $data['regiao'] = 'Zona Norte';
    //                 break;
    //             case 1:
    //                 $data['regiao'] = "Zona Leste";
    //                 break;
    //             case 2:
    //                 $data['regiao'] = "Região do Glória e do Cristal";
    //                 break;
    //             case 3:
    //                 $data['regiao'] = "Zona Sul";
    //                 break;
    //             case 4:
    //                 $data['regiao'] = "Região do Partenon";
    //                 break;
    //             case 5:
    //                 $data['regiao'] = "Zona Extremo Sul";
    //                 break;
    //             case 6:
    //                 $data['regiao'] = "Zona Sul";
    //                 break;
    //         }
    //         $data['telefone'] = $i;
    //         $data['celular'] = $i;
    //         $data['email'] = "{$i}{$i}@{$i}{$i}.com";
    //         $data['descricao'] = "teste descrição $i";
    //         $this->db->insert('clientes', $data);
    //         print_r($data);
    //         unset($data);
    //     }
    //     echo '</pre>';
    //   }
  }
