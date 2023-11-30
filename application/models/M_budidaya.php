<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_budidaya extends CI_Model{

	public function getMonograf(){
		$data=$this->db->query("SELECT * FROM detail_monograf");
		return $data->result();
	}

	// public function getDetailMonograf($id){
	// 	$data=$this->db->query("SELECT * FROM detail_monograf where id_serat = '$id'");
	// 	return $data->result();
	// }

	public function selectVarietasOnSide(){
        	$data=$this->db->query("SELECT * From varietas ORDER BY tanggal_upload DESC  LIMIT  7");	
        	return $data->result();
    }

     public function getJumlahDetailMonografBerdasarkanIDSerat($id){
     	$data=$this->db->query("SELECT * FROM detail_monograf where id_serat='$id'");
		return $data->num_rows();
    }
     public function getDetailMonografBerdasarkanIDSerat($id, $perpage, $start){
		$data=$this->db->query("SELECT * FROM detail_monograf WHERE id_serat='$id' ORDER BY id_detail_monograf DESC LIMIT $perpage OFFSET $start");
		return $data->result();
	}
	public function pencarianBudidaya($cari){
		if($cari == "#budidaya"){
				$cari="";
			}
			$data=$this->db->query("SELECT * from detail_monograf dm join serat s on dm.id_serat = s.id_serat WHERE cuplikan_monograf LIKE '%$cari%' OR penulis LIKE '%$cari%' OR judul LIKE '%$cari%'");
			return $data->result();
	}
}
 ?>  				 