<?php 	
	class varietas extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
            $this->CI = & get_instance();
			$this->load->database();
			$this->load->model('m_varietas');
			$this->load->model('m_leaflet');
		}

		public function detail($namaSerat){
			$idSerat=$this->m_varietas->selectIdSerat(urldecode($namaSerat));
			//Menghitung Jumlah Data pada varietas
			$row=$this->m_varietas->getJumlahVarietasDariIdSerat($idSerat);
			// var_dump($row);
			//mengatur configuration pagination
			$config['base_url'] = site_url()."varietas/detail/$namaSerat";
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
	        $start = (!$this->uri->segment(4)) ? 0 : $this->uri->segment(4);
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

			$dataHeader['Judul'] =$this->m_varietas->getSerat($idSerat);
			$data['subleaflet']=$this->m_varietas->selectLeafletOnSide();
			$data['serat']=$this->m_varietas->getSerat($idSerat);
			$data['varietas']=$this->m_varietas->getVarietasByPagination($idSerat, $config['per_page'], $start);
			$data['Deskripsi']=$this->m_varietas->getDeskripsiSerat($idSerat);
			$this->load->view('Header', $dataHeader);
			$this->load->view('DetailVarietas', $data);
			$this->load->view('Footer', $counter);
		}

		public function spesifikasiVarietas($namaVarietas){
			$idVarietas=$this->m_varietas->selectIdVarietas(urldecode($namaVarietas));

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

			$dataHeader['Judul2'] = $this->m_varietas->getDeskripsiVarietas($idVarietas);
			$data['subleaflet']=$this->m_leaflet->selectLeafletTerbaruIsiVarietas();
			$data['varietas']=$this->m_varietas->getDeskripsiVarietas($idVarietas);
			$data['spesifikasi']=$this->m_varietas->getSpesifikasiVarietas($idVarietas);
			$this->load->view('Header', $dataHeader);
			$this->load->view('IsiVarietas', $data);
			$this->load->view('Footer', $counter);
		}
	}
 ?>
