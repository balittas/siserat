<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_varietas extends CI_Model{

	public function getJumlahVarietasDariIdSerat($id){
		$data=$this->db->query("SELECT * FROM varietas WHERE id_serat = '$id'");
		return $data->num_rows();
	}
	
	public function getJumlahAllVarietas(){
		$data=$this->db->query("SELECT * FROM varietas");
		return $data->num_rows();
	}
	
	public function getVarietasByPagination($id, $perpage, $start){
		$data=$this->db->query("SELECT n.id_serat, n.id_varietas, n.nama_varietas, n.file_gambar, n.tanggal_upload, 								n.waktu_upload, n.deskripsi_varietas, n.URLV
								FROM varietas n 
								WHERE n.id_serat = '$id' ORDER BY n.tanggal_upload DESC LIMIT $perpage OFFSET $start");
		return $data->result();
	}

	public function getAllVarietasByPagination($perpage, $start){
		$data=$this->db->query("SELECT id_varietas, nama_varietas, file_gambar, tanggal_upload, 								waktu_upload, deskripsi_varietas, URLV
								FROM varietas ORDER BY tanggal_upload DESC LIMIT $perpage OFFSET $start");
		return $data->result();
	}
	
	public function selectIdSerat($namaSerat){
		$data=$this->db->query("SELECT id_serat
								FROM serat 
								WHERE nama_serat="."'".$namaSerat."'");
		$hasil=$data->result();
		return $hasil[0]->id_serat;
	}

	public function getSerat($id){
		$data=$this->db->query("SELECT * FROM serat 
								WHERE id_serat =  "."'".$id."'");
		return $data->result();
	}

	public function selectIdVarietas($namaVarietas){
		$data=$this->db->query("SELECT n.id_varietas
								FROM varietas n 
								WHERE n.nama_varietas = "."'".$namaVarietas."'");
		$hasil=$data->result();
		return $hasil[0]->id_varietas;
	}

	public function getDeskripsiVarietas($id){
		$data=$this->db->query("SELECT n.id_serat, n.id_varietas, n.nama_varietas, n.file_gambar, n.tanggal_upload, 								n.waktu_upload, n.deskripsi_varietas, n.file_SK, n.URLV
								FROM varietas n 
								WHERE n.id_varietas = "."'".$id."'");
		return $data->result();
	}
	public function getSpesifikasiVarietas($id){
		$data=$this->db->query("SELECT v.nama_varietas, a.nama_atribut, det.detail_value 
								FROM varietas v 
								JOIN detail_varietas det ON v.id_varietas = det.id_varietas
								JOIN atribut a ON det.id_atribut = a.id_atribut
								WHERE v.id_varietas = "."'".$id."'");
		return $data->result();
	}

	public function getDeskripsiSerat($idSerat){
		$data=$this->db->query("SELECT detail_varietas.detail_value FROM varietas
								JOIN detail_varietas ON varietas.id_varietas = detail_varietas.id_varietas
								JOIN atribut on detail_varietas.id_atribut = atribut.id_atribut
								WHERE atribut.id_atribut = 'A0032' AND varietas.id_serat="."'".$idSerat."'");
		return $data->result();
	}

	 function selectVarietasOnSide(){
        	$data=$this->db->query("SELECT * From varietas ORDER BY tanggal_upload DESC  LIMIT 7");
        	return $data->result();
    }

     function selectLeafletOnSide(){
     		$data=$this->db->query("SELECT l.nama_leaflet, g.file
									FROM leaflet l 
									JOIN gambar_leaflet g ON l.id_leaflet=g.id_leaflet LIMIT 22");
     		return $data->result();
     }

     function pencarianVarietas($cari){
     		if($cari == "#varietas"){
				$cari="";
			}
			$data=$this->db->query("SELECT varietas.id_varietas, varietas.nama_varietas, varietas.deskripsi_varietas, atribut.nama_atribut, detail_varietas.detail_value 
				FROM varietas JOIN detail_varietas ON detail_varietas.id_varietas = varietas.id_varietas 
				JOIN atribut ON atribut.id_atribut = detail_varietas.id_atribut 
				WHERE varietas.nama_varietas LIKE '%$cari%' OR varietas.deskripsi_varietas LIKE '%$cari%' OR atribut.nama_atribut LIKE '%$cari%' OR detail_varietas.detail_value LIKE '%$cari%' ");
			return $data->result();
     }
  //    public function pencarianVarietas($cari){
		// 	if($cari == "#varietas"){
		// 		$cari="";
		// 	}
		// 	$query=$this->db->distinct();
		// 	$query=$this->db->select("varietas.id_varietas, varietas.nama_varietas, varietas.deskripsi_varietas, atribut.nama_atribut, detail_varietas.detail_value");
		// 	$query=$this->db->from("varietas");
		// 	$query=$this->db->join("detail_varietas", "detail_varietas.id_varietas = varietas.id_varietas");
		// 	$query=$this->db->join("atribut", "atribut.id_atribut = detail_varietas.id_atribut ");
		// 	$query=$this->db->group_start()
		// 					->where('varietas.nama_varietas like', "%$cari%")
		// 					->or_where('varietas.deskripsi_varietas like', "%$cari")
		// 					->or_where('atribut.nama_atribut like', "%$cari%")
		// 					->or_where('detail_varietas.detail_value like', "%$cari%")
		// 					->group_end();
		// 	$query=$this->db->get();
		// 	return $query->result();
		// }
}
?>