<?php 
	class leaflet extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->model('m_leaflet');
			$this->load->model('m_varietas');
		}
		public function index(){
			// pagination
			//jumlah jp
			$row=$this->m_leaflet->getJumlahAllLeaflet();
			// var_dump($row);
			$config['base_url'] = site_url()."leaflet/index/";
			$config['total_rows'] = $row;
			$config['per_page'] = 12;
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

			$dataHeader["JudulLeaflet"]="Leaflet";
			$data['varietas'] = $this->m_varietas->selectVarietasOnSide();
			$data['leafletsemua']=$this->m_leaflet->paginationAllLeaflet($config['per_page'], $start);
			$this->load->view('Header');
			$this->load->view('DetailLeafletSerat', $data);
			$this->load->view('Footer', $counter);
			
			$dataHeader["JudulLeaflet"]="Leaflet";
			$data['varietas'] = $this->m_varietas->selectVarietasOnSide();
			$data['leafletalsin']=$this->m_leaflet->paginationAllLeaflet($config['per_page'], $start);
			$this->load->view('Header', $dataHeader);
			$this->load->view('DetailLeafletSerat', $data);
			$this->load->view('Footer', $counter);
		}
	} 
?>
