<?php 
	class produk extends CI_Controller{

		public function __construct(){
			parent::__construct();
            $this->CI = & get_instance();
			$this->load->database();
			$this->load->model('m_produk');
			$this->load->model('m_varietas');
			$this->load->model('m_leaflet');
		}
		
		public function varietas(){
			//Menghitung Jumlah Data pada varietas
			$row=$this->m_varietas->getJumlahAllVarietas();
			// var_dump($row);
			//mengatur configuration pagination
			$config['base_url'] = site_url()."produk/varietas/";
			$config['total_rows'] = $row;
			$config['per_page'] = 9;
			$config['num_links'] = $row;
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '&nbsp<a class="current">';
	        $config['cur_tag_close'] = '</a>';
	        $config['next_tag_open'] = "<li>";
	        $config['next_tagl_close'] = "</li>";
	        $config['prev_tag_open'] = "<li>";
	        $config['prev_tagl_close'] = "</li>";
	        $config['first_tag_open'] = "<li>";
	        $config['first_tagl_close'] = "</li>";
	        $config['last_tag_open'] = "<li>";
	        $config['last_tagl_close'] = "</li>";
	        $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
            $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';
	        //mengatur uri segment
	        $start = (!$this->uri->segment(3)) ? 0 : $this->uri->segment(3);
	        $this->pagination->initialize($config);
			$link=$this->pagination->create_links();
			$data['link']= explode('&nbsp', $link);

			// //counter pengunjung 
            date_default_timezone_set('Asia/Jakarta');
            $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Y-m-d");
            $bulanIni = date("m");
            $waktu   = date('H:i');
            $this->load->model("m_data");
                        
            if(empty($this->session->userdata('pengunjung'))){
                  $this->m_data->addUser($ip,$tanggal,$waktu);
                  $this->session->set_userdata('pengunjung','aktif');                  
            }
            $counter['pengunjungTotal'] = $this->m_data->getTotalVisitor();
            $counter['pengunjungHariIni'] = $this->m_data->getTotalToday($tanggal); 
            $counter['pengunjungBulanIni'] = $this->m_data->getTotalByMonth($bulanIni); 

			$dataHeader['JudulVarietas'] ="Varietas";
			$data['subleaflet']=$this->m_varietas->selectLeafletOnSide();
			$data['allvarietas']=$this->m_varietas->getAllVarietasByPagination($config['per_page'], $start);
			$this->load->view('Header', $dataHeader);
			$this->load->view('DetailAllVarietas', $data);
			$this->load->view('Footer', $counter);
		}

	public function benih(){

			// //counter pengunjung 
            date_default_timezone_set('Asia/Jakarta');
            $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Y-m-d");
            $bulanIni = date("m");
            $waktu   = date('H:i');
            $this->load->model("m_data");
                        
            if(empty($this->session->userdata('pengunjung'))){
                  $this->m_data->addUser($ip,$tanggal,$waktu);
                  $this->session->set_userdata('pengunjung','aktif');                  
            }
            $counter['pengunjungTotal'] = $this->m_data->getTotalVisitor();
            $counter['pengunjungHariIni'] = $this->m_data->getTotalToday($tanggal); 
            $counter['pengunjungBulanIni'] = $this->m_data->getTotalByMonth($bulanIni); 

			$dataheader['JudulBenih']="Benih";
			$data['leaflet']=$this->m_produk->selectLeafletTerbaru();
			// //dedik
			// $data['stokbenih']=$this->m_produk->load_stok_benih();
			$data['stokbenih']=$this->m_produk->getBenih();
			// $data['stokbenih']=$this->m_produk->selectStokBenihFiltered('S0002');
			//tidak di pake
			// $data['distribusi']=$this->m_produk->getDistribusiBenih();
			//test filter
			// $data['distribusi']=$this->m_produk->selectDistribusiBenih();
			$data['distribusi']=$this->m_produk->load_distribusibenih();
			// var_dump($data);
			$this->load->view('Header', $dataheader);
			$this->load->view('ProdukSerat', $data);
			$this->load->view('Footer', $counter);
		}

		// public function filterBenih(){
		// 	// Versi 2
			
		// 	$komoditas = $this->input->post('benih');
		// 	// echo $komoditas;
		// 	if ($komoditas == "Semua Komoditas") {
		// 		$data['dataStokBenihFiltered'] = $this->m_produk->getBenih();
		// 	} else {
		// 		$data['dataStokBenihFiltered'] = $this->m_produk->selectStokBenihFiltered($komoditas);
		// 	}
		// 	$this->load->view('FilterTableClientBenih', $data);
		// }
		//dedik
		// public function filterStokBenih() {
		// 	$komoditas = $this->input->post('benih');
		// 	// echo $komoditas;
		// 	if ($komoditas == "Semua Komoditas") {
		// 		$data['dataStokBenihFiltered'] = $this->m_produk->load_stok_benih();
		// 	} else {
		// 		$data['dataStokBenihFiltered'] = $this->m_produk->load_stok_benih_filter($komoditas);
		// 	}
		// 	$this->load->view('FilterTableClientBenih', $data);
		// }

		// public function filterDistribusi() {
		// 	$tahun_bulan = $this->input->post('tahun_bulan');
		// 	// echo $tahun_bulan;
		// 	$data['dataDistribusiFiltered'] = $this->m_produk->selectDistribusiFiltered(substr($tahun_bulan, 0, 4) , substr($tahun_bulan, 5, 2));
		// 	// var_dump($data);
		// 	$this->load->view('FilterTableClientDistribusiBenih', $data);
		// }

		public function filterDistribusi() {
			$this->load->model("m_produk");
			$filtertahunbulankomoditas = $this->input->post('serattt');
			$Tahun = substr($filtertahunbulankomoditas, 0,4);	// echo $Tahun."<br>";
			$Bulan = substr($filtertahunbulankomoditas, 5,2);	// echo $Bulan."<br>";
			// $Komoditas = substr($filtertahunbulankomoditas, 8,strlen($filtertahunbulankomoditas));	// echo $Komoditas;
			// echo $Tahun."-".$Bulan."-".$Komoditas;
			$if1 = "0000-00";
			$if3 = "0000-".$Bulan;
			$if5 = $Tahun."-00";
			$if7 = $Tahun.'-'.$Bulan;
			// echo $if1."<br>";
			// echo $if2."<br>";
			// echo $if3."<br>";
			// echo $if4."<br>";
			// echo $if5."<br>";
			// echo $if6."<br>";
			// echo $if7."<br>";
			// echo $if8;
			if ($filtertahunbulankomoditas == $if1) { //iki 000
				$data['dataDistribusiFiltered'] = $this->m_produk->load_distribusibenih();
			} 
			else if ($filtertahunbulankomoditas == $if3) { //iki 010
				$data['dataDistribusiFiltered'] = $this->m_produk->load_distribusibenih_filter_bulan($Bulan);
			}
			else if ($filtertahunbulankomoditas == $if5) { //iki 100
				$data['dataDistribusiFiltered'] = $this->m_produk->load_distribusibenih_filter_tahun($Tahun);
			}
			else if ($filtertahunbulankomoditas == $if7) { //iki 110 //
				$data['dataDistribusiFiltered'] = $this->m_produk->load_distribusibenih_filter_tahunbulan($Tahun,$Bulan);
			}
			// else { //iki 111
			// 	$data['dataDistribusiFiltered'] = $this->m_produk->load_distribusibenih_filter_all($Tahun,$Bulan,$Komoditas);
			// }
			$this->load->view('FilterTableClientDistribusiBenih', $data);
		}



		public function alsin(){
			// pagination
			$row=$this->m_leaflet->getJumlahLeafletAlsin('JL006');
			// var_dump($row);
			$config['base_url'] = base_url('produk/alsin');
			$config['total_rows'] = $row;
			$config['per_page'] = 8;
			$config['num_links'] = $row;
		    $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '&nbsp<a class="current">';
	        $config['cur_tag_close'] = '</a>';
	        $config['next_tag_open'] = "<li>";
	        $config['next_tagl_close'] = "</li>";
	        $config['prev_tag_open'] = "<li>";
	        $config['prev_tagl_close'] = "</li>";
	        $config['first_tag_open'] = "<li>";
	        $config['first_tagl_close'] = "</li>";
	        $config['last_tag_open'] = "<li>";
	        $config['last_tagl_close'] = "</li>";
	        $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
            $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';
	        $start = (!$this->uri->segment(3)) ? 0 : $this->uri->segment(3);
	       	$this->pagination->initialize($config);
			$link=$this->pagination->create_links();
			$data['link']= explode('&nbsp', $link);

			// //counter pengunjung 
            date_default_timezone_set('Asia/Jakarta');
            $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Y-m-d");
            $bulanIni = date("m");
            $waktu   = date('H:i');
            $this->load->model("m_data");
                        
            if(empty($this->session->userdata('pengunjung'))){
                  $this->m_data->addUser($ip,$tanggal,$waktu);
                  $this->session->set_userdata('pengunjung','aktif');                  
            }
            $counter['pengunjungTotal'] = $this->m_data->getTotalVisitor();
            $counter['pengunjungHariIni'] = $this->m_data->getTotalToday($tanggal); 
            $counter['pengunjungBulanIni'] = $this->m_data->getTotalByMonth($bulanIni); 

			$data['varietas'] = $this->m_varietas->selectVarietasOnSide();
			$data['leafletalsin'] = $this->m_leaflet->getLeafletAlsinByPagination('JL006', $config['per_page'], $start);
			$this->load->view('Header');
			$this->load->view('ProdukSerat2', $data);
			$this->load->view('Footer', $counter);
		}

		public function olahan(){
		// //counter pengunjung 
            date_default_timezone_set('Asia/Jakarta');
            $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Y-m-d");
            $bulanIni = date("m");
            $waktu   = date('H:i');
            $this->load->model("m_data");
                        
            if(empty($this->session->userdata('pengunjung'))){
                  $this->m_data->addUser($ip,$tanggal,$waktu);
                  $this->session->set_userdata('pengunjung','aktif');                  
            }
            $counter['pengunjungTotal'] = $this->m_data->getTotalVisitor();
            $counter['pengunjungHariIni'] = $this->m_data->getTotalToday($tanggal); 
            $counter['pengunjungBulanIni'] = $this->m_data->getTotalByMonth($bulanIni); 
			
			$dataheader['JudulOlahan']="Produk Olahan";			
			$data['subleaflet']=$this->m_varietas->selectLeafletOnSide();
			$this->load->view('Header', $dataheader);
			$this->load->view('ProdukSerat3');
			$this->load->view('Footer', $counter);
		}
		public function produk4(){
			$this->load->view('ProdukSerat4');
		}
	}
 ?>
