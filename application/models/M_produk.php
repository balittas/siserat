<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model{
	public function getBenih(){
		$data=$this->db->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih`");
		return $data->result();

		// // versi 2
		// 	$sql = $this->db ->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih`");
		// 	return $sql->result();
	}
	//masih belum bisa
	// public function selectStokBenihFiltered($komoditas){
	// 	$data=$this->db->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih` WHERE `id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") ");
	// 	return $data->result();

		// // versi 2
		// $sql = $this->db ->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih` WHERE `id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") ");
	 //        return $sql->result();
	// }
	// dedik
		public function load_stok_benih(){
			$sql = $this->db ->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih`");
			return $sql->result_array();
		}
		public function load_stok_benih_filter($komoditas) {
			$sql = $this->db ->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih` WHERE `id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") ");
	        return $sql->result_array();
		}
	//without query builder
	// public function FilterDistribusiBenih($tahun, $bulan){
	// 	$data=$this->db->query("SELECT s.id_distribusi, b.nama_benih, s.tanggal, s.tahun_panen, s.kelas_benih, s.jumlah_kg, s.keterangan
	// 							FROM distribusi_benih s
	// 							JOIN benih b on b.id_benih=s.id_benih
	// 							WHERE tanggal like '%2015-02%'
	// 							ORDER by s.id_distribusi ");
	// }
	//tidak di pake
	// public function getDistribusiBenih(){
	// 	$data=$this->db->query("SELECT b.nama_benih, s.tanggal, s.tahun_panen, s.kelas_benih, s.jumlah_kg, s.keterangan
	// 							FROM distribusi_benih s
	// 							JOIN benih b on b.id_benih=s.id_benih");
	// 	return $data->result();
	// }
	
	// public function selectDistribusiBenih(){
	// 	$query = $this->db->select("s.id_distribusi, b.nama_benih, s.tanggal, s.tahun_panen, s.kelas_benih, s.jumlah_kg, s.keterangan");
	//         $query = $this->db->from("distribusi_benih s");
	//         $query = $this->db->join("benih b", "b.id_benih=s.id_benih");
	// 		$query = $this->db->where("s.tanggal like","2011-01-_%_%");
	// 		$query = $this->db->order_by("s.id_distribusi", "asc");
	//         $query = $this->db->get();
	//         return $query->result();
	// }

		public function load_distribusibenih(){
			$sql = $this->db ->query("SELECT * FROM `benih` JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` ORDER BY `distribusi_benih`.`id_distribusi` desc");
			return $sql->result_array();
		}
	// public function selectDistribusiFiltered($tahun, $bulan) {
	// 		$query = $this->db->select("s.id_distribusi, b.nama_benih, s.tanggal, s.tahun_panen, s.kelas_benih, s.jumlah_kg, s.keterangan");
	//         $query = $this->db->from("distribusi_benih s");
	//         $query = $this->db->join("benih b", "b.id_benih=s.id_benih");
	// 		$query = $this->db->where("s.tanggal like",$tahun."-".$bulan."-_%_%");
	// 		$query = $this->db->order_by("s.id_distribusi", "asc");
	//         $query = $this->db->get();
	//         return $query->result();
	// 	}

		public function load_distribusibenih_filter_komoditas($komoditas) {
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `benih`.`id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") 
				AND `distribusi_benih`.`tanggal` 
				LIKE \"_%_%_%_%-_%_%-_%_%\" ORDER BY `distribusi_benih`.`id_distribusi` ASC ");
	        return $sql->result_array();
		}
		public function load_distribusibenih_filter_bulan($bulan) {
			$like = "_%_%_%_%-".$bulan."-_%_%";
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `distribusi_benih`.`tanggal` 
				LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	        return $sql->result_array();
		}
		public function load_distribusibenih_filter_bulankomoditas($bulan,$komoditas) {
			$like = "_%_%_%_%-".$bulan."-_%_%";
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `benih`.`id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") 
				AND `distribusi_benih`.`tanggal` 
				LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	        return $sql->result_array();
		}
		public function load_distribusibenih_filter_tahun($tahun) {
			$like = $tahun."-_%_%-_%_%";
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `distribusi_benih`.`tanggal` 
				LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	        return $sql->result_array();
		}
		public function load_distribusibenih_filter_tahunkomoditas($tahun,$komoditas) {
			$like = $tahun."-_%_%-_%_%";
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `benih`.`id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") 
				AND `distribusi_benih`.`tanggal` 
				LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	        return $sql->result_array();
		}
		public function load_distribusibenih_filter_tahunbulan($tahun,$bulan) { 
			$like = $tahun."-".$bulan."-_%_%";
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `distribusi_benih`.`tanggal` 
				LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	        return $sql->result_array();
		}
		public function load_distribusibenih_filter_all($tahun,$bulan,$komoditas) {
			$like = $tahun."-".$bulan."-_%_%";
			$sql = $this->db ->query("
				SELECT * FROM `benih` 
				JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
				WHERE `benih`.`id_serat` = (SELECT `id_serat` FROM `serat` WHERE `nama_serat` = \"$komoditas\") 
				AND `distribusi_benih`.`tanggal` 
				LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	        return $sql->result_array();
		}

	function selectLeafletTerbaru() {
        	$query = $this->db->limit(12);
	        $query = $this->db->select('leaflet.nama_leaflet, gambar_leaflet.file');
	        $query = $this->db->from('leaflet');        	
        	$query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
	        $query = $this->db->get();
	        return $query->result();	
        }
	}
 ?>