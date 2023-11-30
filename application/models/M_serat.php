<?php 	
	class m_serat extends CI_Model
	{
		public function selectSerat() {
			$query = $this->db->get('serat');
   			return $query->result();
		}
		public function pencarianSerat($cari){
			if($cari == "#serat"){
				$cari="";
			}
			$data=$this->db->query("SELECT s.nama_serat, s.deskripsi_serat FROM serat s
									WHERE s.nama_serat LIKE '%$cari%' OR s.deskripsi_serat LIKE '%$cari%' ");
			return $data->result();
		}
	}
 ?>