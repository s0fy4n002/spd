<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spd_model extends CI_Model
{
	
	private static $_table = 'spd';
    private static $_pk = 'id_spd';
    
    // public function is_exist($where)
	// {
	// 	return $this->db->where($where)->get(self::$_table)->row_array();
	// }

	public function data($where)
	{
		return $this->db->where($where)->where('penerima',$this->session->userdata('usr_id'))->get(self::$_table)->row_array();
	}

	public function insert($data)
	{
		return $this->db->insert(self::$_table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->set($data)->where(self::$_pk, $id)->update(self::$_table);
	}

	public function delete($id)
	{
		return $this->db->delete(self::$_table, array('id_spd' => $id));
	}

	 public function get_user()
    {
    	$this->db->select('*');
        $this->db->where('usr_level','Admin');
        return $this->db->get('user')->result_array();
    }

     public function get_data($bulan)
    {
        $this->db->select('*,usr_nama as nama_pem,usr_username as username');
        $this->db->join('user u', 'j.pemberi = u.usr_id');
        $this->db->where('penerima',  $this->session->userdata('usr_id'));
        $this->db->like('tanggal', $bulan);
        return $this->db->get('spd j')->result_array();
    }
}