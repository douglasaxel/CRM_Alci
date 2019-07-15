<?php defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function allclients_count()
	{
		return $this->db->get('clientes')->num_rows();
	}

	function allclients($limit, $start, $col, $dir)
	{
		$query = $this->db
			->limit($limit, $start)
			->order_by($col, $dir)
			->get('clientes');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	function clients_search($limit, $start, $search, $col, $dir)
	{
		$query = $this->db
			->like('id', $search)
			->or_like('nome', $search)
			->or_like('sobrenome', $search)
			->or_like('cpf', $search)
			->or_like('data_nasc', $search)
			->or_like('regiao', $search)
			->or_like('celular', $search)
			->limit($limit, $start)
			->order_by($col, $dir)
			->get('clientes');


		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	function clients_search_count($search)
	{
		$query = $this->db
			->like('id', $search)
			->or_like('nome', $search)
			->or_like('sobrenome', $search)
			->or_like('cpf', $search)
			->or_like('data_nasc', $search)
			->or_like('regiao', $search)
			->or_like('celular', $search)
			->get('clientes');

		return $query->num_rows();
	}
}
