<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Clients_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		// Set table name
		$this->table = 'clientes';
		// Set orderable column fields
		$this->column_order = array('id', 'nome', 'cpf', 'data_nasc', 'regiao', 'celular');
		// Set searchable column fields
		$this->column_search = array('id', 'nome', 'sobrenome', 'cpf', 'data_nasc', 'regiao', 'celular');
		// Set default order
		$this->order = array('id' => 'asc');
	}

	/*
* Fetch members data from the database
* @param $_POST filter data based on the posted parameters
*/
	public function getRows($postData)
	{
		$this->_get_datatables_query($postData);
		if ($postData['length'] != -1) {
			$this->db->limit($postData['length'], $postData['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	/*
* Count all records
*/
	public function countAll()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	/*
* Count records based on the filter params
* @param $_POST filter data based on the posted parameters
*/
	public function countFiltered($postData)
	{
		$this->_get_datatables_query($postData);
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*
* Perform the SQL queries needed for an server-side processing requested
* @param $_POST filter data based on the posted parameters
*/
	private function _get_datatables_query($postData)
	{

		$this->db->from($this->table);

		$i = 0;
		// loop searchable columns 
		foreach ($this->column_search as $item) {
			// if datatable send POST for search
			if ($postData['search']['value']) {
				// first loop
				if ($i === 0) {
					// open bracket
					$this->db->group_start();
					$this->db->like($item, $postData['search']['value']);
				} else {
					$this->db->or_like($item, $postData['search']['value']);
				}

				// last loop
				if (count($this->column_search) - 1 == $i) {
					// close bracket
					$this->db->group_end();
				}
			}
			$i++;
		}

		if (isset($postData['order'])) {
			$this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
}
