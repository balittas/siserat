<?php 
	class pencarian extends CI_Controller{

		public function __construct(){
			parent::__construct();
            $this->CI = & get_instance();
            $this->load->model('m_leaflet');
            $this->load->model('m_produk');
            $this->load->model('m_serat');
            $this->load->model('m_varietas');
            $this->load->model('m_budidaya');
		}

		public function index(){
			$cari=$this->input->get('keyword');
			$datapencarian['keyword'] = $cari;	
			$datapencarian['pencarianKomoditas']=$this->m_serat->pencarianSerat($cari);
			$datapencarian['pencarianVarietas']=$this->m_varietas->pencarianVarietas($cari);
			$datapencarian['pencarianBudidaya']=$this->m_budidaya->pencarianBudidaya($cari);
			$datapencarian['pencarianLeaflet']=$this->m_leaflet->pencarianLeaflet($cari);

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

			$dataheader["JudulPencarian"]="Pencarian";
			$this->load->view('Header', $dataheader);	
			$this->load->view('HalamanPencarian', $datapencarian);
			$this->load->view('Footer', $counter);
		}

	}
 ?>