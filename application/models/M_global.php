<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();	       
	}
    public function getUser($value='')
    {
        $this->db->select("*");
        $this->db->from("user");
        $data_tampil = $this->db->get();
        return $data_tampil->result_array();
    }

    public function getRole($value='')
    {
        $this->db->select("*");
        $this->db->from("role");
        $data_tampil = $this->db->get();
        return $data_tampil->result_array();
    }

    public function getModul($value='')
    {
        $this->db->select("*");
        $this->db->from("modul");
        $data_tampil = $this->db->get();
        return $data_tampil->result_array();
    }
    public function get($select,$table,$where){
    	$this->db->select($select);
		$this->db->from($table);
		if ($where != '') {
			$this->db->where($where);
		}
		$data_tampil = $this->db->get();
		return $data_tampil->result_array();
    }

    public function get_limit($select,$table,$where,$limit,$order){
    	$this->db->select($select);
		$this->db->from($table);
		if ($where != '') {
			$this->db->where($where);
        }
        $this->db->limit($limit);
        $this->db->order_by($order, 'DESC');
        $data_tampil = $this->db->get();
        
		return $data_tampil->result_array();
    }    

   /* public function getLike($select,$table,$like){
        $this->db->select($select);
        $this->db->from($table);

        // $this->db->group_start();
        $this->db->or_like('penjelasan',$like);
        $this->db->or_like('judul_publikasi',$like);
        $this->db->or_like('tagline',$like);
        // $this->db->group_end();
        $data_tampil = $this->db->get();
        return $data_tampil->result_array();
    }  */


    public function getcari($rowno,$rowperpage, $cari="" ){
        $this->db->select('*');
        $this->db->from('t_publikasi');
        
        if ($cari != '') {
            
            $this->db->where('MATCH (judul_publikasi,tagline,penjelasan) AGAINST (' . $this->db->escape($cari). ' IN BOOLEAN MODE)');            
        }
        $this->db->limit($rowperpage, $rowno);
        $data_tampil = $this->db->get();
        return $data_tampil->result_array();
        }  

        public function getrecordCount($cari ='' ){
        $this->db->select('COUNT(*) as allcount');
        $this->db->from('t_publikasi');


        if($cari !='')
        {
             $this->db->where('MATCH (judul_publikasi,tagline,penjelasan) AGAINST (' . $this->db->escape($cari). ')');
          
        }

        $data_tampil = $this->db->get();
        $result = $data_tampil->result_array();
        return $result[0]['allcount'];
    }





    public function update($data,$where,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
        return $this->db->affected_rows() > 0;
    }
    public function input($insert,$table){
        $db_biodata = $this->db->insert($table, $insert);
        return $this->db->insert_id();
    }
    public function hapus($table,$where){
        
        $this->db->delete($table,$where);
        
    }

    public function query($query){
        $data_tampil = $this->db->query($query);
        return $data_tampil->result_array();
    }
    public function queryI($query){
        $data_tampil = $this->db->query($query);
        return $this->db->affected_rows() > 0;
    }

    public function queryU($query){
        $data_tampil = $this->db->query($query);
        return $this->db->affected_rows() > 0;
    }

    public function detailPublikasi($id_publikasi='')
    {
        $this->db->select('*');
        $this->db->from('t_format_publikasi a');
        $this->db->join('t_format b','a.id_format = b.id_format','left');
        $this->db->where('a.id_publikasi',$id_publikasi);
        $data_tampil = $this->db->get();        
        return $data_tampil->result_array();
    }

    public function topikPublikasi($id='')
    {
        $this->db->select('*');
        $this->db->from('t_topik_publikasi a');
        $this->db->join('t_publikasi b','a.id_publikasi = b.id_publikasi','left');
        $this->db->where('a.id_topik',$id);
        $data_tampil = $this->db->get();        
        return $data_tampil->result_array();
    }    


}
