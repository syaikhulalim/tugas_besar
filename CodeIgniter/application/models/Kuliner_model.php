<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuliner_model extends CI_Model 
{
	public function getDataKuliner()
	{
		$query = $this->db->get("kuliner_malang");
		return $query->result_array();
	}
	public function insertKuliner()
	{
		$tgl=$this->input->post('tanggal');
		$tglBaru=date_format(new DateTime($tgl),"Y-m-d");
		$object = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tanggal' => $tglBaru);
		$this->db->insert('kuliner_malang', $object);

	}

	public function getKuliner($idKuliner)
	{
		$this->db->where('idKuliner', $idKuliner);
		$query = $this->db->get('kuliner_malang');
		return $query->result();
	}

	public function updateById($idKuliner)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tanggal' => $this->input->post('tanggal'),
		);
		$this->db->where('idKuliner', $idKuliner);
		$this->db->update('kuliner_malang', $data);
	}
	public function delete($idKuliner) 
	{ 
    	if ($this->db->delete("kuliner_malang", "idKuliner = ".$idKuliner)) 
     	{ 
        	return true; 
     	} 
  	}
}

/* End of file Kuliner_model.php */
/* Location: ./application/models/Kuliner_model.php */