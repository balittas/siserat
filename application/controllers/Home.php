<?php 
	class Home extends CI_Controller
	{		
		public function __construct() {
			parent::__construct();
            $this->CI = & get_instance();
            $this->load->database();
            $this->load->model('m_serat');
            $this->load->model('m_leaflet');
            $this->load->model('m_varietas');
            $this->load->model('m_budidaya');
		}
		public function index()
		{
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


			$data['subLeaflet'] = $this->m_leaflet->selectLeafletTerbaruHome();
			$data['serat'] = $this->m_serat->selectSerat();
			$data['budidaya'] = $this->m_serat->selectSerat();
			$data['monograf']= $this->m_budidaya->getMonograf();
			$this->load->view('HalamanUtamaSerat', $data);
			$this->load->view('Footer', $counter);
		}	
		public function agribisnis() {
			$this->load->view('HalamanDetailAgribisnis');
		}
	} 
?>