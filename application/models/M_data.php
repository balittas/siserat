<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	Class M_data extends CI_Model{
		
		//Serat
		public function load_serat(){
			$sql = $this->db->query("SELECT `id_serat`,`nama_serat`, `deskripsi_serat`, `gambar` FROM `serat` ORDER BY `id_serat` desc");
			return $sql->result_array();
		}
		public function tambah_serat($namaSerat, $deskripsi, $gambar){
			$sql = $this->db->query("INSERT INTO `serat`(`id_serat`, `nama_serat`, `deskripsi_serat`, `gambar`) VALUES (\"\",\"$namaSerat\",\"$deskripsi\",\"$gambar\")");		
		}
		public function hapus_serat($idSerat){
			$sql = $this->db->query("DELETE FROM `serat` WHERE `id_serat` = \"$idSerat\"");		
		}
		public function get_serat_byId($idSerat){ 
			$sql = $this->db->query("SELECT * FROM `serat` WHERE `id_serat` = \"$idSerat\"");
			return $sql->result();
		}
		public function edit_serat($idSerat,$namaSerat, $deskripsi, $gambar){ //with image
			$sql = $this->db->query("UPDATE `serat` SET `nama_serat`=\"$namaSerat\",`deskripsi_serat`=\"$deskripsi\",`gambar`=\"$gambar\" WHERE `id_serat`=\"$idSerat\"");		
		}
		public function edit_serat_noimg($idSerat,$namaSerat, $deskripsi){ //with no image
			$sql = $this->db->query("UPDATE `serat` SET `nama_serat`=\"$namaSerat\",`deskripsi_serat`=\"$deskripsi\" WHERE `id_serat`=\"$idSerat\"");		
		}

		//Varietas
		public function load_varietas(){
			$sql = $this->db ->query("SELECT * FROM `varietas` JOIN `serat` ON `varietas`.`id_serat` = `serat`.`id_serat` ORDER BY `varietas`.`id_varietas` desc");
			return $sql->result_array();
		}
		public function load_varietas_filter($komoditas) {
			$sql = $this->db ->query("SELECT * FROM `varietas` JOIN `serat` ON `varietas`.`id_serat` = `serat`.`id_serat` WHERE `serat`.`nama_serat` = \"$komoditas\" ORDER BY `varietas`.`id_varietas` desc");
	        return $sql->result_array();
		}
		public function get_imgsk_varietas_byId($idVarietas){
			$sql = $this->db->query("SELECT file_SK, file_gambar FROM varietas WHERE id_varietas = \"$idVarietas\"");
			return $sql->result();
		}
		public function hapus_varietas($idVarietas){
			$sql = $this->db->query("DELETE FROM `varietas` WHERE `id_varietas` = \"$idVarietas\"");		
		}
		public function getAtribut() {			
			$sql = $this->db->query("SELECT `nama_atribut` FROM `atribut` order by `id_atribut` asc");
			return $sql->result();
		}
		public function add_varietas($idjenisKomoditas,$namaVarietas,$tglPelepasan,$tgl,$wkt,$sk,$url,$gmbr,$deskripsivar){		
			$this->db->query("INSERT INTO `varietas`(`id_serat`, `id_varietas`, `nama_varietas`, `tanggal_pelepasan`, `tanggal_upload`, `waktu_upload`, `file_SK`, `URLV`, `file_gambar`, `deskripsi_varietas`) 
				VALUES (\"$idjenisKomoditas\",\"\",\"$namaVarietas\",\"$tglPelepasan\",\"$tgl\",\"$wkt\",\"$sk\",\"$url\",\"$gmbr\",\"$deskripsivar\")");
		}
		public function updateVarietas($id,$namaVar,$tgl,$sk,$gmbr,$desk,$url){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\",`file_SK`=\"$sk\",`file_gambar`= \"$gmbr\" ,`deskripsi_varietas`=\"$desk\",`URLV`=\"$url\" WHERE `id_varietas` = \"$id\"");
		}
		// alternatif
		public function updateVarietasKecGmbr($id,$namaVar,$tgl,$sk,$desk,$url){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\",`file_SK`=\"$sk\",`deskripsi_varietas`=\"$desk\",`URLV`=\"$url\" WHERE `id_varietas` = \"$id\"");
		}
		public function updateVarietasKecSK($id,$namaVar,$tgl,$gmbr,$desk,$url){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\",`file_gambar`= \"$gmbr\",`deskripsi_varietas`=\"$desk\",`URLV`=\"$url\" WHERE `id_varietas` = \"$id\"");
		}
		public function updateVarietasTanpaFile($id,$namaVar,$tgl,$desk,$url){			
			$this->db->query("UPDATE varietas SET `nama_varietas`= \"$namaVar\",`tanggal_pelepasan`= \"$tgl\" ,`deskripsi_varietas`=\"$desk\",`URLV`=\"$url\" WHERE `id_varietas` = \"$id\"");
		}
		public function get_all_detail_varietas(){			
			$sql = $this->db->query("SELECT v.id_varietas,v.nama_varietas,a.id_atribut, a.nama_atribut,dv.detail_value
				FROM varietas v 
				JOIN detail_varietas dv ON v.id_varietas = dv.id_varietas 
				JOIN atribut a ON dv.id_atribut = a.id_atribut
				ORDER by v.id_varietas");
			return $sql->result_array();	
		}
		public function getIdAtribut($namaAtribut) {			
			$sql = $this->db->query("SELECT id_atribut FROM atribut WHERE nama_atribut = \"$namaAtribut\"");
			$hasil = $sql->result();
			return $hasil[0]->id_atribut;
		}
		public function add_detail_varietas($atribut,$value){					
			$this->db->query("INSERT INTO `detail_varietas`(`id_varietas`, `id_atribut`, `detail_value`) VALUES ((SELECT id_varietas FROM varietas ORDER BY id_varietas DESC LIMIT 1),\"$atribut\",\"$value\")");		
		}
		public function addAtribut($namaAtribut) {			
			$this->db->query("INSERT INTO atribut (id_atribut, nama_atribut) VALUES (\"\",\"$namaAtribut\")");
		}
		public function updateDetailDeskripsi($idvar, $idAtr, $value) {			
			$this->db->query("UPDATE `detail_varietas` SET `detail_value`= \"$value\" WHERE `id_varietas` = \"$idvar\" AND `id_atribut` = \"$idAtr\"");
		}

		//Leaflet	
		public function load_leaflet(){
			$sql = $this->db ->query("SELECT * FROM `leaflet` JOIN `jenis_leaflet` ON `leaflet`.`id_jenis_leaflet` = `jenis_leaflet`.`id_jenis_leaflet` ORDER BY `leaflet`.`id_leaflet` desc");
			return $sql->result_array();
		}
		public function load_gambar_leaflet(){
			$sql = $this->db ->query("SELECT * FROM `gambar_leaflet` order by id_leaflet desc");
			return $sql->result();
		}
		public function get_leaflet_byId($idLeaflet){
			$sql = $this->db->query("SELECT * FROM gambar_leaflet WHERE id_leaflet = \"$idLeaflet\"");
			return $sql->result();
		}
		public function get_leaflet_img_byId($id){			
			$sql = $this->db->query("SELECT * FROM gambar_leaflet WHERE id_gambar = \"$id\"");
			return $sql->result();
		}
		public function hapus_leaflet($idLeaflet){
			$sql = $this->db->query("DELETE FROM `leaflet` WHERE `id_leaflet` = \"$idLeaflet\"");		
		}
		public function add_leaflet_name($nama,$jenisLeaflet){		
			$sql = $this->db->query("INSERT INTO leaflet (id_leaflet, nama_leaflet, id_jenis_leaflet) 
				VALUES (\"\",\"$nama\",\"$jenisLeaflet\")");			
		}
		public function add_leaflet_img($img){			
			$this->db->query("INSERT INTO gambar_leaflet(id_leaflet, id_gambar, file) VALUES ((SELECT id_leaflet FROM leaflet ORDER BY id_leaflet DESC LIMIT 1),\"\",\"$img\")");
		}
		public function get_jenisleaflet(){
			$sql = $this->db ->query("SELECT `nama_jenis` FROM `jenis_leaflet`");
			return $sql->result();
		}
		public function getIdjenisleaflet($namaJenis) {
			$sql = $this->db->query("SELECT id_jenis_leaflet FROM jenis_leaflet WHERE nama_jenis = \"$namaJenis\"");
			$hasil = $sql->result();
			return $hasil[0]->id_jenis_leaflet;
		}
		public function add_jenis_leaflet($namaJenis) { 
			$this->db->query("INSERT INTO `jenis_leaflet`(`id_jenis_leaflet`, `nama_jenis`) VALUES (\"\",\"$namaJenis\")");
		}
		public function updateLeafletNameJenis($id,$nama, $idjenis){			
			$this->db->query("UPDATE `leaflet` SET `nama_leaflet`=\"$nama\",`id_jenis_leaflet`=\"$idjenis\" WHERE `id_leaflet` = \"$id\"");
		}
		public function updateLeafletImg($idgambar,$file){			
			$this->db->query("UPDATE `gambar_leaflet` SET `file`=\"$file\" WHERE `id_gambar` = \"$idgambar\"");
		}

		//Budidaya
		public function load_budidaya(){
			$sql = $this->db ->query("SELECT * FROM `detail_monograf` JOIN `serat` ON `detail_monograf`.`id_serat` = `serat`.`id_serat` ORDER BY `detail_monograf`.`id_detail_monograf` desc");
			return $sql->result_array();
		}
		public function load_budidaya_filter($komoditas) {
			$sql = $this->db ->query("SELECT * FROM `detail_monograf` JOIN `Serat` ON `detail_monograf`.`id_serat` = `serat`.`id_serat` WHERE `detail_monograf`.`id_serat` = (SELECT `serat`.`id_serat` FROM `serat` WHERE `serat`.`nama_serat` = \"$komoditas\") ORDER BY `detail_monograf`.`id_detail_monograf` desc");
	        return $sql->result_array();
		}
		public function hapus_budidaya($idBudidaya){
			$sql = $this->db->query("DELETE FROM `detail_monograf` WHERE `id_detail_monograf` = \"$idBudidaya\"");		
		}
		public function get_budidaya_byId($idBudidaya){						
			$sql = $this->db->query("SELECT `file` FROM `detail_monograf` WHERE `id_detail_monograf` = \"$idBudidaya\"");
			return $sql->result();
		}
		public function add_budidaya($idserat,$deskripsisingkat,$penulis,$judul,$file,$urll) { 	
			$this->db->query("
				INSERT INTO `detail_monograf`(`id_serat`, `id_detail_monograf`, `cuplikan_monograf`, `penulis`, `judul`, `file`, `URL`) VALUES (\"$idserat\",\"\",\"$deskripsisingkat\",\"$penulis\",\"$judul\",\"$file\",\"$urll\")");
		}
		public function update_bud_nofile($idBud,$des,$penulis,$judul,$url){	
			$sql = $this->db->query("UPDATE `detail_monograf` SET `cuplikan_monograf`=\"$des\",`penulis`=\"$penulis\",`judul`=\"$judul\", `URL`=\"$url\" WHERE `id_detail_monograf`=\"$idBud\"");	
		}	
		public function update_bud_withfile($idBud,$des,$penulis,$judul,$file,$url){					
			$sql = $this->db->query("UPDATE `detail_monograf` SET `cuplikan_monograf`=\"$des\",`penulis`=\"$penulis\",`judul`=\"$judul\", `file`=\"$file\", `URL`=\"$url\" WHERE `id_detail_monograf`=\"$idBud\"");	
		}	

		//Stok Benih
		public function load_stok_benih(){
			$sql = $this->db ->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih` order by `stok_benih`.`id_stok_benih` desc");
			return $sql->result_array();
		}
		public function load_stok_benih_filter($komoditas) {
			$sql = $this->db ->query("SELECT * FROM `benih` JOIN `stok_benih`on `benih`.`id_benih` = `stok_benih`.`id_benih` WHERE `benih`.`id_serat` = (SELECT `serat`.`id_serat` FROM `serat` WHERE `serat`.`nama_serat` = \"$komoditas\") order by `stok_benih`.`id_stok_benih` desc");
	        return $sql->result_array();
		}
		public function hapus_stok_benih($idStokBenih){
			$sql = $this->db->query("DELETE FROM `stok_benih` WHERE `id_stok_benih` = \"$idStokBenih\"");		
		}
		public function get_benih(){
			$sql = $this->db ->query("SELECT * FROM `benih`");
			return $sql->result();
		}
		public function add_stok_benih($idBenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai){		
			$sql = $this->db->query("INSERT INTO `stok_benih`(`id_stok_benih`, `id_benih`, `asal`, `tahun_panen`, `kelas`, `stok_bulan_terakhir`, `stok_sampai`) VALUES (\"\",\"$idBenih\",\"$asal\",\"$tahunpanen\",\"$kelas\",\"$stokbulanterakhir\",\"$stoksampai\");");			
		}
		public function edit_stok_benih($idstokbenih,$idbenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai){
			$sql = $this->db->query("UPDATE `stok_benih` SET `asal`=\"$asal\",`tahun_panen`=\"$tahunpanen\",`kelas`=\"$kelas\",`stok_bulan_terakhir`=\"$stokbulanterakhir\",`stok_sampai`=\"$stoksampai\" WHERE `id_stok_benih`=\"$idstokbenih\" ");
		}

		//untuk stok benih dan distribusi
		public function getIdnmBenih($namaBenih) { 
			$sql = $this->db->query("SELECT id_benih FROM benih WHERE nama_benih = \"$namaBenih\"");
			$hasil = $sql->result();
			return $hasil[0]->id_benih;
		}

		//untuk stok benih dan distribusi
		public function add_benih($komo,$namabenih) { 	
			$this->db->query("INSERT INTO `benih`(`id_serat`,`nama_benih`, `id_benih`) VALUES (\"$komo\",\"$namabenih\",\"\")");
		}
		public function edit_benih($idBenih, $komo) { 	
			$this->db->query("UPDATE `benih` SET `id_serat`=\"$komo\" WHERE `id_benih`=\"$idBenih\"");
		}

		//Distribusi Benih
		public function load_distribusibenih(){
			$sql = $this->db ->query("SELECT * FROM `benih` JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` ORDER BY `distribusi_benih`.`id_distribusi` desc");
			return $sql->result_array();
		}
		public function add_distribusi_benih($idBenih,$tanggal,$tahunpanen,$kelas,$jumlahkg,$keterangan){		
			$sql = $this->db->query("INSERT INTO `distribusi_benih`(`id_benih`, `id_distribusi`, `tanggal`, `tahun_panen`, `kelas_benih`, `jumlah_kg`, `keterangan`) VALUES (\"$idBenih\",\"\",\"$tanggal\",\"$tahunpanen\",\"$kelas\",\"$jumlahkg\",\"$keterangan\")");			
		}
		// public function load_distribusibenih_filter_bulan($bulan) {
		// 	$like = "_%_%_%_%-".$bulan."-_%_%";
		// 	$sql = $this->db ->query("
		// 		SELECT * FROM `benih` 
		// 		JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
		// 		WHERE `distribusi_benih`.`tanggal` 
		// 		LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	 //        return $sql->result_array();
		// }
		// public function load_distribusibenih_filter_tahun($tahun) {
		// 	$like = $tahun."-_%_%-_%_%";
		// 	$sql = $this->db ->query("
		// 		SELECT * FROM `benih` 
		// 		JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
		// 		WHERE `distribusi_benih`.`tanggal` 
		// 		LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	 //        return $sql->result_array();
		// }
		// public function load_distribusibenih_filter_tahunbulan($tahun,$bulan) { 
		// 	$like = $tahun."-".$bulan."-_%_%";
		// 	$sql = $this->db ->query("
		// 		SELECT * FROM `benih` 
		// 		JOIN `distribusi_benih` ON `benih`.`id_benih` = `distribusi_benih`.`id_benih` 
		// 		WHERE `distribusi_benih`.`tanggal` 
		// 		LIKE \"$like\" ORDER BY `distribusi_benih`.`tanggal` ASC ");
	 //        return $sql->result_array();
		// }
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
		public function hapus_distribusibenih($idDistribusi){
			$sql = $this->db->query("DELETE FROM `distribusi_benih` WHERE `id_distribusi` = \"$idDistribusi\"");		
		}
		public function edit_distribusibenih($iddistribusi,$tanggal,$tahunpanen,$kelasbenih,$jumlahkg,$keterangan){
			$sql=$this->db->query("UPDATE `distribusi_benih` SET `tanggal`=\"$tanggal\",`tahun_panen`=\"$tahunpanen\",`kelas_benih`=\"$kelasbenih\",`jumlah_kg`=\"$jumlahkg\",`keterangan`=\"$keterangan\" WHERE `id_distribusi`=\"$iddistribusi\" ");
		}

		//Alat dan Mesin
		public function load_alsin(){
			$sql = $this->db ->query("SELECT * FROM `leaflet` JOIN `jenis_leaflet` ON `leaflet`.`id_jenis_leaflet` = `jenis_leaflet`.`id_jenis_leaflet` WHERE `jenis_leaflet`.`nama_jenis` = \"Alat dan Mesin\" order by `leaflet`.`id_leaflet` desc");
			return $sql->result_array();
		}
		public function load_gambar_alsin(){
			$sql = $this->db ->query("SELECT `gambar_leaflet`.`id_leaflet`, `gambar_leaflet`.`id_gambar`, `gambar_leaflet`.`file` FROM `leaflet` JOIN `jenis_leaflet` ON `leaflet`.`id_jenis_leaflet` = `jenis_leaflet`.`id_jenis_leaflet` JOIN `gambar_leaflet` ON `leaflet`.`id_leaflet` = `gambar_leaflet`.`id_leaflet` WHERE `jenis_leaflet`.`nama_jenis` = \"Alat dan Mesin\" order by `leaflet`.`id_leaflet` desc");
			return $sql->result();
		}
		public function get_alsin_byId($idAlsin){				
			$sql = $this->db->query("SELECT * FROM gambar_leaflet WHERE id_leaflet = \"$idAlsin\"");
			return $sql->result();
		}
		public function hapus_alsin($idAlsin){
			$sql = $this->db->query("DELETE FROM `leaflet` WHERE `id_leaflet` = \"$idAlsin\"");		

		}
		public function add_alsin_name($nama){		
			$sql = $this->db->query("INSERT INTO leaflet (id_leaflet, nama_leaflet, id_jenis_leaflet) VALUES (\"\",\"$nama\",\"JL006\")");	
		}
		public function add_alsin_img($img){			
			$this->db->query("INSERT INTO gambar_leaflet(id_leaflet, id_gambar, file) VALUES ((SELECT id_leaflet FROM leaflet ORDER BY id_leaflet DESC LIMIT 1),\"\",\"$img\")");
		}
		public function updateAlsinName($id,$nama){			
			$this->db->query("UPDATE `leaflet` SET `nama_leaflet`=\"$nama\" WHERE `id_leaflet` = \"$id\"");
		}
		public function updateAlsinImg($id,$img){			
			$this->db->query("UPDATE `gambar_leaflet` SET `file`= \"$img\" WHERE `id_gambar` = \"$id\"");
		}

		// PENGUNJUNG
		public function getTotalVisitor(){
			$sql = $this->db->query("SELECT SUM(hits) as total FROM statistik_pengunjung");
			return $sql->result();
		}
		public function getTotalToday($tanggal){
			$sql = $this->db->query("SELECT SUM(hits) as totalHariIni FROM statistik_pengunjung WHERE tanggal = \"$tanggal\"");
			return $sql->result();		
		}	
		public function getTotalByMonth($tanggal){
			$sql = $this->db->query("SELECT SUM(hits) as totalBulanIni FROM statistik_pengunjung WHERE month(tanggal) = \"$tanggal\"");
			return $sql->result();		
		}
		public function addUser($ip,$tanggal,$online){
			$sql = $this->db->query("INSERT INTO statistik_pengunjung (id_pengunjung, tanggal, hits, online) VALUES(\"$ip\",\"$tanggal\",'1',\"$online\")");			
		}
	}
?>
