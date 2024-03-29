<?php 
	class admin extends CI_Controller{
		public function index(){
			$data['judul'] = "Masuk - Balai Penelitian Tanaman Pemanis dan Serat";
			$this->load->view('login', $data);
		}
		public function login(){
			$username = $this->input->post('username'); 
			$password = $this->input->post('password');			
			if ($username == "balittas" && $password == "admin") {
				$this->load->model("m_data");
				$this->session->set_userdata(array(
						'akunAktif'=>"Administrator"),
				true);
				redirect(site_url('admin/serat'));
			}else{
				$data['coba'] = "salah";
				$data['judul'] = "Admin - Balai Penelitian Tanaman Pemanis dan Serat";
				$this->load->view('login', $data);
			}					
		}
		public function logout() {
			$this->session->sess_destroy();
			redirect(site_url('admin'));
		}
		public function serat(){		
			$this->load->model("m_data");
			$data['serat'] = $this->m_data->load_serat();
			$data['varietas'] = $this->m_data->load_varietas();
			$data['detail_varietas'] = $this->m_data->get_all_detail_varietas();
			$data['listAtribut'] = $this->m_data->getAtribut();
			$data['listJenis'] = $this->m_data->get_jenisleaflet();
			$data['leaflet'] = $this->m_data->load_leaflet();
			$data['gambarleaflet'] = $this->m_data->load_gambar_leaflet();
			$data['monograf'] = $this->m_data->load_budidaya();
			$data['stokbenih'] = $this->m_data->load_stok_benih();
			$data['listBenih'] = $this->m_data->get_benih();
			$data['distribusibenih'] = $this->m_data->load_distribusibenih();
			$data['alsin'] = $this->m_data->load_alsin();
			$data['gambaralsin'] = $this->m_data->load_gambar_alsin();
			$dataHeader['judul'] = "Admin";
			$this->load->view("headerAdmin",$dataHeader);
			$this->load->view("v_admin",$data);

		}

		//serat
		public function hapusSerat($idSerat){
			$this->load->model("m_data");
			$targetpathSeratgmbr = "item_img/serat/";
			$dataserat = $this->m_data->get_serat_byId($idSerat);
			if ($dataserat[0]->gambar != "noImg.png") {
				unlink($targetpathSeratgmbr.$dataserat[0]->gambar);
			}
			$this->m_data->hapus_serat($idSerat);
			redirect(site_url('admin/serat#tabelSerat'));
		}
		public function tambahSerat(){
			$this->load->model("m_data");
			$namaSerat = $this->input->post('namaSerat');		
			$deskripsi = $this->input->post('deskripsi');		
			if (empty($_FILES['gambar']['name'])) {
				$gambar = "noImg.png";
				$this->m_data->tambah_serat($namaSerat, $deskripsi, $gambar);	
			}else{
				$targetpathSerat = $targetpathSerat.basename($_FILES['gambar']['name']);
				move_uploaded_file($_FILES['gambar']['tmp_name'],$targetpathSerat);
				$this->m_data->tambah_serat($namaSerat, $deskripsi, $_FILES['gambar']['name']);	
			}
			redirect(site_url('admin/serat#tabelSerat'));
		}
		public function editSerat(){
			$this->load->model("m_data");
			$idSerat = $this->input->post('idSerat');
			$namaSerat = $this->input->post('namaSerat');		
			$deskripsi = $this->input->post('editdeskripsi');		
			$gambar = $this->input->post('editserat');		
			$targetpathSerat = "item_img/serat/";	
			$dataserat = $this->m_data->get_serat_byId($idSerat);
			if (!empty($_FILES['editgambarserat']['name'])) {		
			 	unlink($targetpathSerat.$dataserat[0]->gambar);
				$targetpathSeratgmbr = $targetpathSerat.basename($_FILES['editgambarserat']['name']);
				move_uploaded_file($_FILES['editgambarserat']['tmp_name'],$targetpathSeratgmbr);
				$this->m_data->edit_serat($idSerat, $namaSerat, $deskripsi, $_FILES['editgambarserat']['name']);	
			} else { 
				$this->m_data->edit_serat_noimg($idSerat, $namaSerat, $deskripsi);	
			}		
			redirect(site_url('admin/serat#tabelSerat'));
		}

		//varietas
		public function filterVarietas() {
			$this->load->model("m_data");
			$komoditas = $this->input->post('serattt');
			if ($komoditas == "Semua Komoditas") {
				$data['dataVarietasFiltered'] = $this->m_data->load_varietas();
				$data['datadetail_varietasFilter'] = $this->m_data->get_all_detail_varietas();
			} else {
				$data['dataVarietasFiltered'] = $this->m_data->load_varietas_filter($komoditas);
				$data['datadetail_varietasFilter'] = $this->m_data->get_all_detail_varietas();

			}
			$this->load->view('FilterTableVarietas', $data);
		}
		public function hapusVarietas($idVarietas){
			$this->load->model("m_data");
			$datagambardansk = $this->m_data->get_imgsk_varietas_byId($idVarietas);
			if ($datagambardansk[0]->file_gambar != "noImg.jpg") {
				unlink('item_img/gambar/Edited/'.$datagambardansk[0]->file_gambar);
			}
			unlink('file/SK/'.$datagambardansk[0]->file_SK);
			$this->m_data->hapus_varietas($idVarietas);
			redirect(site_url('admin/serat#tabelVarietas'));
		}
		public function tambahVarietas(){
			$this->load->model("m_data");
			date_default_timezone_set('Asia/Jakarta');
	        $tgl = date('Y-m-d'); 
	        $wkt = date('H:i:s');		
			$namaVarietas = $this->input->post('namaVarietas');		
			$tanggalPelepasan = $this->input->post('tanggalPelepasanvar');
			$idjenisKomoditas = $this->input->post('idjenisKomoditas');
			$deskripsivar = $this->input->post('deskripsivar');
			$urlv = $this->input->post('linkurlvarietas');
			$targetpathgmbr = "item_img/gambar/Edited/";
			$targetpathsk = "file/SK/"; 
			$targetpathgmbr2 = $targetpathgmbr.basename($_FILES['gambarvar']['name']);
			$targetpathsk2 = $targetpathsk.basename($_FILES['tambahsk']['name']);
			$gambarVarietas = "";
			if (empty($_FILES['tambahsk']['name']) || empty($_FILES['gambarvar']['name'])) {
				$gambarVarietas = "noImg.jpg";
			} else {
				$gambarVarietas = $_FILES['gambarvar']['name'];
			}
			$this->m_data->add_varietas($idjenisKomoditas,$namaVarietas,$tanggalPelepasan,$tgl,$wkt,$_FILES['tambahsk']['name'],$urlv,$gambarVarietas,$deskripsivar);
			echo $this->input->post('temp')."<br>";
			for ($i=0; $i < $this->input->post('temp') ; $i++) { 
				$tesAtribut = $this->input->post('atribut'."$i");
				if (!is_null($tesAtribut)) {
					$idAtribut = $this->m_data->getIdAtribut($this->input->post('atribut'."$i"));
					// echo $idAtribut;
					if (!empty($idAtribut)) {
						// echo $idAtribut;
						$this->m_data->add_detail_varietas($idAtribut,$this->input->post('value'."$i"));
					} else {
						// echo "kosong";
						$this->m_data->addAtribut($this->input->post('atribut'."$i"));
						$idAtribut = $this->m_data->getIdAtribut($this->input->post('atribut'."$i"));
						$this->m_data->add_detail_varietas($idAtribut,$this->input->post('value'."$i"));
					}
				}
			}
			move_uploaded_file($_FILES['tambahsk']['tmp_name'],$targetpathsk2);
		    move_uploaded_file($_FILES['gambarvar']['tmp_name'],$targetpathgmbr2);
			redirect(site_url('admin/serat#tabelVarietas'));	
		}
		public function editVarietas(){
			$this->load->model("m_data");
			$idVar = $this->input->post('idVarietass');
			$namaVarietas = $this->input->post('namaVarietas');
			$tgl = $this->input->post('tanggalPelepasan');					
			$deskripsiii = $this->input->post('deskripsiv');
			$urlvarr = $this->input->post('urlvar');		
			$targetpathgmbrpath = "item_img/gambar/Edited/";
			$targetpathskpath = "file/SK/"; 
			$targetpathgmbr = $targetpathgmbrpath.basename($_FILES['gambar_v']['name']);
			$targetpathsk = $targetpathskpath.basename($_FILES['updatesk']['name']);
			$datagambardansk = $this->m_data->get_imgsk_varietas_byId($idVar);
			if (!empty($_FILES['gambar_v']['name'])&&!empty($_FILES['updatesk']['name'])) { //dengan 2 file
				unlink($targetpathgmbrpath.$datagambardansk[0]->file_gambar);
				unlink($targetpathskpath.$datagambardansk[0]->file_SK);
				move_uploaded_file($_FILES['updatesk']['tmp_name'],$targetpathsk);	
				move_uploaded_file($_FILES['gambar_v']['tmp_name'],$targetpathgmbr);
				$this->m_data->updateVarietas($idVar,$namaVarietas,$tgl,$_FILES['updatesk']['name'],$_FILES['gambar_v']['name'],$deskripsiii,$urlvarr);
			}elseif (empty($_FILES['gambar_v']['name'])&&empty($_FILES['updatesk']['name'])) { //tanpa file
				$this->m_data->updateVarietasTanpaFile($idVar,$namaVarietas,$tgl,$deskripsiii,$urlvarr);
			}elseif (empty($_FILES['updatesk']['name'])) { //update gambar aja
				unlink($targetpathgmbrpath.$datagambardansk[0]->file_gambar);
				move_uploaded_file($_FILES['gambar_v']['tmp_name'],$targetpathgmbr);
				$this->m_data->updateVarietasKecSK($idVar,$namaVarietas,$tgl,$_FILES['gambar_v']['name'],$deskripsiii,$urlvarr);
			}elseif (empty($_FILES['gambar_v']['name'])) { //update sk aja
				unlink($targetpathskpath.$datagambardansk[0]->file_SK);
				move_uploaded_file($_FILES['updatesk']['tmp_name'],$targetpathsk);
				$this->m_data->updateVarietasKecGmbr($idVar,$namaVarietas,$tgl,$_FILES['updatesk']['name'],$deskripsiii,$urlvarr);
			}
			redirect(site_url('admin/serat#tabelVarietas'));	
		}
		public function editDesVarietas(){
			$this->load->model("m_data");
			$idVar = $this->input->post('idVarietasss');		
			for ($i=0; $i < $this->input->post('jumlahAtr') ; $i++) { 
				$idAtribut = $this->m_data->getIdAtribut(substr($this->input->post('atribut'."$i"), 1));
				$this->m_data->updateDetailDeskripsi($idVar, $idAtribut, $this->input->post('value'."$i"));
			}
			redirect(site_url('admin/serat#tabelVarietas'));
		}

		//leaflet
		public function hapusLeaflet($idLeaflet){
			$this->load->model("m_data");
			$dataleaflet = $this->m_data->get_leaflet_byId($idLeaflet);
			$targetpathleaflet = "item_img/leafletgabungan/";
			unlink($targetpathleaflet.$dataleaflet[0]->file);
			unlink($targetpathleaflet.$dataleaflet[1]->file);
			$this->m_data->hapus_leaflet($idLeaflet);
			redirect(site_url('admin/serat#tabelLeaflet'));
		}
		public function tambahLeaflet(){
			$this->load->model("m_data");
		    $nama = $this->input->post('namaLeaflet'); 
		    $idJenis = $this->m_data->getIdjenisleaflet($this->input->post('jenisLeaflet'));
		    if (!empty($idJenis)) {
		        $this->m_data->add_leaflet_name($nama,$idJenis); 
		    } else {
		    	$this->m_data->add_jenis_leaflet($this->input->post('jenisLeaflet'));
		    	$idJenis = $this->m_data->getIdjenisleaflet($this->input->post('jenisLeaflet'));
		    	$this->m_data->add_leaflet_name($nama,$idJenis); 
		    }
		    $targetpathleaflet = "item_img/leafletgabungan/";  
		    $targetpathleaflet1 = $targetpathleaflet.basename($_FILES['gambar1']['name']);
		    move_uploaded_file($_FILES['gambar1']['tmp_name'],$targetpathleaflet1);
		    $this->m_data->add_leaflet_img($_FILES['gambar1']['name']); 
		    $targetpathleaflet2 = $targetpathleaflet.basename($_FILES['gambar2']['name']);
		    move_uploaded_file($_FILES['gambar2']['tmp_name'],$targetpathleaflet2);
		    $this->m_data->add_leaflet_img($_FILES['gambar2']['name']);
		    redirect(site_url('admin/serat#tabelLeaflet'));
		}
		public function editLeaflet(){
			$this->load->model("m_data");
			$idleaflet = $this->input->post('idleaflett');
			$idgmbr1 = $this->input->post('idimg1');		
			$idgmbr2 = $this->input->post('idimg2');	
			$nama = $this->input->post('namaLeaflet');	
			$idJenis = $this->m_data->getIdjenisleaflet($this->input->post('	'));
			$dataleaflet1 = $this->m_data->get_leaflet_img_byId($idgmbr1); 
			$dataleaflet2 = $this->m_data->get_leaflet_img_byId($idgmbr2); 
			$targetpathleaflet = "item_img/leafletgabungan/";		
			if (!empty($idJenis)) { //langsung update
				$this->m_data->updateLeafletNameJenis($idleaflet,$nama, $idJenis);	
			} else {
				//tambah jenis dulu
				$this->m_data->add_jenis_leaflet($this->input->post('jenisLeaflet'));
				$idJenis = $this->m_data->getIdjenisleaflet($this->input->post('jenisLeaflet'));
				//baru update
				$this->m_data->updateLeafletNameJenis($idleaflet, $nama, $idJenis);		
			}
			if (empty($_FILES['leaflet1']['name'])&&empty($_FILES['leaflet2']['name'])) {	
				//gambar1 dan gambar2 kosong
			} elseif (!empty($_FILES['leaflet1']['name'])&&!empty($_FILES['leaflet2']['name'])) {
				//gambar1 dan gambar2 tidak kosong
				unlink($targetpathleaflet.$dataleaflet1[0]->file);
				unlink($targetpathleaflet.$dataleaflet2[0]->file);
				$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['leaflet1']['name']);
				move_uploaded_file($_FILES['leaflet1']['tmp_name'],$targetpathleaflet1);
				$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['leaflet2']['name']);
				move_uploaded_file($_FILES['leaflet2']['tmp_name'],$targetpathleaflet2);
				$this->m_data->updateLeafletImg($idgmbr1,$_FILES['leaflet1']['name']); 
				$this->m_data->updateLeafletImg($idgmbr2,$_FILES['leaflet2']['name']); 
			} elseif (!empty($_FILES['leaflet1']['name'])) {
				//gambar1 kosong
				unlink($targetpathleaflet.$dataleaflet1[0]->file);
				$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['leaflet1']['name']);
				move_uploaded_file($_FILES['leaflet1']['tmp_name'],$targetpathleaflet1);
				$this->m_data->updateLeafletImg($idgmbr1,$_FILES['leaflet1']['name']); 
			} elseif (!empty($_FILES['leaflet2']['name'])) {
				// gambar2 kosong
				unlink($targetpathleaflet.$dataleaflet2[0]->file);
				$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['leaflet2']['name']);
				move_uploaded_file($_FILES['leaflet2']['tmp_name'],$targetpathleaflet2);
				$this->m_data->updateLeafletImg($idgmbr2,$_FILES['leaflet2']['name']); 
			}
			redirect(site_url('admin/serat#tabelLeaflet'));
		}
		
		//budidaya
		public function hapusBudidaya($idBudidaya){
			$this->load->model("m_data");
			$targetpathbudidaya = "file/unduhan/";
			$databudidaya = $this->m_data->get_budidaya_byId($idBudidaya);
			unlink($targetpathbudidaya.$databudidaya[0]->file);
			$this->m_data->hapus_budidaya($idBudidaya);
			redirect(site_url('admin/serat#tabelBudidaya'));
		}
		public function tambahBudidaya(){
			$this->load->model("m_data");
			$idserat = $this->input->post('selectkomoditas');
			$judul = $this->input->post('judul');
			$deskripsisingkat = $this->input->post('deskripsiSingkat');
			$penulis = $this->input->post('penulis');
			$urlbudd = $this->input->post('urlbudidaya');
			$targetpathbudidaya = "file/unduhan/";		
			$targetpathbudidayamonograf = $targetpathbudidaya.basename($_FILES['pdf']['name']);
			move_uploaded_file($_FILES['pdf']['tmp_name'],$targetpathbudidayamonograf);
			$this->m_data->add_budidaya($idserat,$deskripsisingkat,$penulis,$judul,$_FILES['pdf']['name'],$urlbudd);
			redirect(site_url('admin/serat#tabelBudidaya'));
		}
		public function filterBudidaya() {
			$this->load->model("m_data");
			$komoditas = $this->input->post('serattt');
			if ($komoditas == "Semua Komoditas") {
				$data['dataBudidayaFiltered'] = $this->m_data->load_budidaya();
			} else {
				$data['dataBudidayaFiltered'] = $this->m_data->load_budidaya_filter($komoditas);
			}
			$this->load->view('FilterTableBudidaya', $data);
		}
		public function editBudidayaaaa(){
			$this->load->model("m_data");
			$idSer = $this->input->post('idSerat');
			$idBud = $this->input->post('idBudidaya');
			$judul = $this->input->post('judul');	
			$des = $this->input->post('deskripsiSingkat');								
			$penulis = $this->input->post('penulis');
			$urleditbud = $this->input->post('editurlbud');	
			$targetpathbudidaya = "file/unduhan/";	
			$databudidaya = $this->m_data->get_budidaya_byId($idBud);
			if (empty($_FILES['editpdfbudi']['name'])) {
				$this->m_data->update_bud_nofile($idBud,$des,$penulis,$judul,$urleditbud);
			}else{
				unlink($targetpathbudidaya.$databudidaya[0]->file);
				$targetpathbudidayamonograf = $targetpathbudidaya.basename($_FILES['editpdfbudi']['name']);
				move_uploaded_file($_FILES['editpdfbudi']['tmp_name'],$targetpathbudidayamonograf);
				// echo $idgmbr1."----".$_FILES['leafletalsin1']['name']."<br>";
				// echo $_FILES['editpdfbudi']['name'];
				$this->m_data->update_bud_withfile($idBud,$des,$penulis,$judul,$_FILES['editpdfbudi']['name'],$urleditbud);
			}
			redirect(site_url('admin/serat#tabelBudidaya'));
		}
		
		//stok benih
		public function hapusStokBenih($idStokBenih){
			$this->load->model("m_data");
			$this->m_data->hapus_stok_benih($idStokBenih);
			redirect(site_url('admin/serat#tabelStokBenih'));
		}
		public function filterStokBenih() {
			$this->load->model("m_data");
			$komoditas = $this->input->post('serattt');
			if ($komoditas == "Semua Komoditas") {
				$data['dataStokBenihFiltered'] = $this->m_data->load_stok_benih();
			} else {
				$data['dataStokBenihFiltered'] = $this->m_data->load_stok_benih_filter($komoditas);
			}
			$this->load->view('FilterTableStokBenih', $data);
		}
		public function tambahStokBenihCuy(){
			$this->load->model("m_data");
			$asal = $this->input->post('asal');
			$tahunpanen = $this->input->post('tahunPanen');
			$kelas = $this->input->post('kelas');
			$stokbulanterakhir = $this->input->post('stokBulanTerakhir');
			$stoksampai = $this->input->post('stokSampai');
			$namabnh = $this->input->post('namaBenih2');
			$komoditasstok = $this->input->post('jenisKomoditasStok');
			$idBenih = $this->m_data->getIdnmBenih($namabnh);
			if (!empty($idBenih)) { //ada
				$this->m_data->edit_benih($idBenih, $komoditasstok);
				$this->m_data->add_stok_benih($idBenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai);	
			} else { //tidak ada
				$this->m_data->add_benih($komoditasstok, $this->input->post('namaBenih2'));
				$idBenih = $this->m_data->getIdnmBenih($this->input->post('namaBenih2'));
				$this->m_data->add_stok_benih($idBenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai);	
			}
			redirect(site_url('admin/serat#tabelStokBenih'));
		}
		public function editStokBenih(){
			$this->load->model('m_data');
			$idstokbenih = $this->input->post('idstokbenih');
			$asal = $this->input->post('asalbenih');
			$tahunpanen = $this->input->post('tahunpanenbenih');
			$kelas = $this->input->post('kelasbenih');
			$stokbulanterakhir = $this->input->post('stokbulanterakhirbenih');
			$stoksampai = $this->input->post('stoksampaibenih');
			// $idbenih = $this->m_data->getIdnamaBenih($this->input->post('namaBenih'));
			$idbenih = $this->input->post('idBenih');
			$namabenih = $this->input->post('namaBenih');
			$komoditaseditstok = $this->input->post('jenisKomoditasStokEdit');
			// $this->m_data->edit_nama_benih($idbenih,$namabenih);

			$idBenihedit = $this->input->post('idBenihedit');

			$this->m_data->edit_benih($idBenihedit, $komoditaseditstok);
			$this->m_data->edit_stok_benih($idstokbenih,$idbenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai);
			// if (!empty($idbenih)) { //ada
			// 	$this->m_data->edit_stok_benih($idstokbenih,$idbenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai);
			// } else { //tidak ada
			// 	$this->m_data->add_benih($this->input->post('namaBenih'));
			// 	$idbenih = $this->m_data->getIdnamaBenih($this->input->post('namaBenih'));
			// 	$this->m_data->edit_stok_benih($idstokbenih,$idbenih,$asal,$tahunpanen,$kelas,$stokbulanterakhir,$stoksampai);
			// }
			redirect(site_url('admin/serat#tabelStokBenih'));
		}
		
		//distribusi benih
		public function hapusDistribusiBenih($idDistribusi){
			$this->load->model("m_data");
			$this->m_data->hapus_distribusibenih($idDistribusi);
			redirect(site_url('admin/serat#tabelDistribusiBenih'));
		}
		public function filterDistribusi() {
			$this->load->model("m_data");
			$filtertahunbulankomoditas = $this->input->post('serattt');
			$Tahun = substr($filtertahunbulankomoditas, 0,4);	// echo $Tahun."<br>";
			$Bulan = substr($filtertahunbulankomoditas, 5,2);	// echo $Bulan."<br>";
			$Komoditas = substr($filtertahunbulankomoditas, 8,strlen($filtertahunbulankomoditas));	// echo $Komoditas;
			// echo $Tahun."-".$Bulan."-".$Komoditas;
			$if1 = "0000-00-Semua Komoditas";
			$if2 = "0000-00-".$Komoditas;	
			$if3 = "0000-".$Bulan."-Semua Komoditas";
			$if4 = "0000-".$Bulan."-".$Komoditas;  
			$if5 = $Tahun."-00-Semua Komoditas";
			$if6 = $Tahun."-00-".$Komoditas;
			$if7 = $Tahun.'-'.$Bulan."-Semua Komoditas";
			$if8 = $Tahun.'-'.$Bulan.'-'.$Komoditas;
			// echo $if1."<br>";
			// echo $if2."<br>";
			// echo $if3."<br>";
			// echo $if4."<br>";
			// echo $if5."<br>";
			// echo $if6."<br>";
			// echo $if7."<br>";
			// echo $if8;
			if ($filtertahunbulankomoditas == $if1) { //iki 000
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih();
			} 
			else if ($filtertahunbulankomoditas == $if2) { //iki 001
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_komoditas($Komoditas);
			}
			else if ($filtertahunbulankomoditas == $if3) { //iki 010
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_bulan($Bulan);
			}
			else if ($filtertahunbulankomoditas == $if4) { //iki 011
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_bulankomoditas($Bulan,$Komoditas);
			}
			else if ($filtertahunbulankomoditas == $if5) { //iki 100
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_tahun($Tahun);
			}
			else if ($filtertahunbulankomoditas == $if6) { //iki 101
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_tahunkomoditas($Tahun,$Komoditas);
			}
			else if ($filtertahunbulankomoditas == $if7) { //iki 110 //
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_tahunbulan($Tahun,$Bulan);
			}
			else { //iki 111
				$data['dataDistribusiFiltered'] = $this->m_data->load_distribusibenih_filter_all($Tahun,$Bulan,$Komoditas);
			}
			$this->load->view('FilterTableDistribusi', $data);
		}
		public function tambahDistribusiBenih(){
			$this->load->model("m_data");
			$tanggal = $this->input->post('tanggalDistribusi');
			$tahunpanen = $this->input->post('tahunPanen');
			$kelas = $this->input->post('kelas');
			$jumlahkg = $this->input->post('jumlahkg');
			$keterangan = $this->input->post('keterangan');
			$komoditasdist = $this->input->post('jenisKomoditasDistri');
			$idBenih = $this->m_data->getIdnmBenih($this->input->post('namaBenih'));
			if (!empty($idBenih)) { //ada
				$this->m_data->edit_benih($idBenih, $komoditasdist);
				$this->m_data->add_distribusi_benih($idBenih,$tanggal,$tahunpanen,$kelas,$jumlahkg,$keterangan);	
			} else { //tidak ada
				$this->m_data->add_benih($komoditasdist, $this->input->post('namaBenih'));
				$idBenih = $this->m_data->getIdnmBenih($this->input->post('namaBenih'));
				$this->m_data->add_distribusi_benih($idBenih,$tanggal,$tahunpanen,$kelas,$jumlahkg,$keterangan);	
			}
			redirect(site_url('admin/serat#tabelDistribusiBenih'));
		}
		public function editDistribusiBenih(){
			$this->load->model("m_data");
			// $idbenih=$this->input->post('namanyabenih');
			$iddistribusi=$this->input->post('iddistribusibenih');
			$tanggal=$this->input->post('tanggaldistribusibenih');
			$tahunpanen=$this->input->post('tahunpanendistribusibenih');
			$kelasbenih=$this->input->post('kelasdistribusibenih');
			$jumlahkg=$this->input->post('jumlahkgdistribusibenih');
			$keterangan=$this->input->post('keterangandistribusibenih');

			$komoditasdist = $this->input->post('jenisKomoditasDistriEdit');
			// $this->m_data->edit_nama_benih($idbenih,$namabenih);

			$idBenihedit = $this->input->post('idbenihdistribusibenih');

			$this->m_data->edit_benih($idBenihedit, $komoditasdist);


			$this->m_data->edit_distribusibenih($iddistribusi,$tanggal,$tahunpanen,$kelasbenih,$jumlahkg,$keterangan);
			redirect(site_url('admin/serat#tabelDistribusiBenih'));
		}

		//alsin
		public function hapusAlsin($idAlsin){
			$this->load->model("m_data");
			$dataleaflet = $this->m_data->get_alsin_byId($idAlsin);
			$targetpathleaflet = "item_img/leafletgabungan/";
			unlink($targetpathleaflet.$dataleaflet[0]->file);
			unlink($targetpathleaflet.$dataleaflet[1]->file);
			$this->m_data->hapus_Alsin($idAlsin);
			redirect(site_url('admin/serat#tabelAlsin'));
		}
		public function tambahAlsin(){
			$this->load->model("m_data");
			$nama = $this->input->post('namaAlsin');	
			$this->m_data->add_alsin_name($nama);	
			$targetpathleaflet = "item_img/leafletgabungan/";		
			$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['gambaralsin1']['name']);
			move_uploaded_file($_FILES['gambaralsin1']['tmp_name'],$targetpathleaflet1);
			$this->m_data->add_alsin_img($_FILES['gambaralsin1']['name']);	
			$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['gambaralsin2']['name']);
			move_uploaded_file($_FILES['gambaralsin2']['tmp_name'],$targetpathleaflet2);
			$this->m_data->add_alsin_img($_FILES['gambaralsin2']['name']);
			redirect(site_url('admin/serat#tabelAlsin'));
		}
		public function editAlsin(){
			$this->load->model("m_data");
			$idalsin = $this->input->post('idalsin');
			$idgmbralsin1 = $this->input->post('idgambaralsin1');		
			$idgmbralsin2 = $this->input->post('idgambaralsin2');	
			$namaalsin = $this->input->post('namaAlsin');	
			$dataleaflet1 = $this->m_data->get_leaflet_img_byId($idgmbralsin1); 
			$dataleaflet2 = $this->m_data->get_leaflet_img_byId($idgmbralsin2); 
			$targetpathleaflet = "item_img/leafletgabungan/";		
  			$this->m_data->updateAlsinName($idalsin,$namaalsin);	
			if (empty($_FILES['leafletalsin1']['name'])&&empty($_FILES['leafletalsin2']['name'])) {	
				//gambar1 dan gambar2 kosong
			} elseif (!empty($_FILES['leafletalsin1']['name'])&&!empty($_FILES['leafletalsin2']['name'])) {
				//gambar1 dan gambar2 tidak kosong
				unlink($targetpathleaflet.$dataleaflet1[0]->file);
				unlink($targetpathleaflet.$dataleaflet2[0]->file);
				$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['leafletalsin1']['name']);
				move_uploaded_file($_FILES['leafletalsin1']['tmp_name'],$targetpathleaflet1);
				$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['leafletalsin2']['name']);
				move_uploaded_file($_FILES['leafletalsin2']['tmp_name'],$targetpathleaflet2);
				// echo $idgmbr1."----".$_FILES['leafletalsin1']['name']."<br>";
				// echo $idgmbr2."----".$_FILES['leafletalsin2']['name'];
				$this->m_data->updateAlsinImg($idgmbralsin1,$_FILES['leafletalsin1']['name']); 
				$this->m_data->updateAlsinImg($idgmbralsin2,$_FILES['leafletalsin2']['name']); 
			} elseif (!empty($_FILES['leafletalsin1']['name'])) {
				//gambar1 kosong
				unlink($targetpathleaflet.$dataleaflet1[0]->file);
				$targetpathleaflet1 = $targetpathleaflet.basename($_FILES['leafletalsin1']['name']);
				move_uploaded_file($_FILES['leafletalsin1']['tmp_name'],$targetpathleaflet1);
				$this->m_data->updateAlsinImg($idgmbralsin1,$_FILES['leafletalsin1']['name']); 
			} elseif (!empty($_FILES['leafletalsin2']['name'])) {
				// gambar2 kosong
				unlink($targetpathleaflet.$dataleaflet2[0]->file);
				$targetpathleaflet2 = $targetpathleaflet.basename($_FILES['leafletalsin2']['name']);
				move_uploaded_file($_FILES['leafletalsin2']['tmp_name'],$targetpathleaflet2);
				$this->m_data->updateAlsinImg($idgmbralsin2,$_FILES['leafletalsin2']['name']); 
			}
			redirect(site_url('admin/serat#tabelAlsin'));
		}
	}
?>
