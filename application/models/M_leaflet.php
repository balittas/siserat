<?php 
   class m_leaflet extends CI_Model
   {
    
    public function getleaflet($id){
           $query = $this->db->select('leaflet.nama_leaflet, gambar_leaflet.file');
           $query = $this->db->from('leaflet');
           $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
           $query = $this->db->join('jenis_leaflet', 'leaflet.id_jenis_leaflet = jenis_leaflet.id_jenis_leaflet');
           $query = $this->db->where('jenis_leaflet.id_jenis_leaflet', $id);
           $query = $this->db->get();
           return $query->result();
    }
   
    public function getIdJenis($nama) {
           $query = $this->db->select('jl.id_jenis_leaflet');
           $query = $this->db->from('jenis_leaflet jl');
           $query = $this->db->where('jl.nama_jenis', $nama);
           $query = $this->db->get();
           $hasil = $query->result();
           return $hasil[0]->id_jenis_leaflet;
    }

    public function selectLeafletTerbaruHome() {
           $query = $this->db->limit(12);
           $query = $this->db->select('leaflet.nama_leaflet, gambar_leaflet.file');
           $query = $this->db->from('leaflet');         
           $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
           $query = $this->db->get();
           return $query->result(); 
    }
   
    public function selectLeafletTerbaruIsiVarietas() {
           $query = $this->db->limit(24);
           $query = $this->db->select('leaflet.nama_leaflet, gambar_leaflet.file');
           $query = $this->db->from('leaflet');         
           $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
           $query = $this->db->get();
           return $query->result(); 
    }
   
    public function getJumlahAllLeaflet(){
           $data=$this->db->query("SELECT * from leaflet l 
           join gambar_leaflet g on l.id_leaflet =g.id_leaflet
           join jenis_leaflet j on l.id_jenis_leaflet=j.id_jenis_leaflet");
           return $data->num_rows();
    }
   
    public function paginationAllLeaflet($perpage, $start){
           $data=$this->db->query("SELECT * from leaflet l
           join gambar_leaflet g on l.id_leaflet=g.id_leaflet
           join jenis_leaflet j on j.id_jenis_leaflet=l.id_jenis_leaflet
           order by l.id_leaflet desc
           LIMIT $perpage OFFSET $start ");
           return $data->result();
    }
   
    public function getJumlahLeafletAlsin($id){
           $data=$this->db->query("SELECT * from leaflet l 
           join gambar_leaflet g on l.id_leaflet =g.id_leaflet
           join jenis_leaflet j on l.id_jenis_leaflet=j.id_jenis_leaflet
           where j.id_jenis_leaflet='$id'");
           return $data->num_rows();
    }
   
    public function getLeafletAlsinByPagination($id, $perpage, $start){
           $data=$this->db->query("SELECT * from leaflet l 
           join gambar_leaflet g on l.id_leaflet =g.id_leaflet
           join jenis_leaflet j on l.id_jenis_leaflet=j.id_jenis_leaflet
           where j.id_jenis_leaflet='$id' LIMIT $perpage OFFSET $start");
           return $data->result();
    }
          
    public function pencarianLeaflet($cari){
           if($cari == "#leaflet"){
           $cari="";
     }
           $data=$this->db->query("SELECT l.nama_leaflet, g.file from leaflet l 
           join gambar_leaflet g on l.id_leaflet =g.id_leaflet
           where l.nama_leaflet LIKE '%$cari%' OR g.file LIKE '%$cari%'");
           return $data->result();
          }
   } 
   ?>