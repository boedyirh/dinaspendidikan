<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
	}                                       
	
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}

		 

		$a['page']	= "d_amain";
		
		$this->load->view('admin/aaa', $a);
	}
  

 //================================================================================================================
 	public function import_excel() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		
	
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		 $rand       = substr(md5(microtime()),rand(0,26),17);
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
	
		//upload config 
		$config['upload_path'] 		= './upload/import_excel';
		$config['allowed_types'] 	= 'xlsx';
		$config['max_size']			= '10000';
		$config['max_width']  		= '13000';
		$config['max_height'] 		= '13000';

		$this->load->library('upload', $config);
	 	
		if ($mau_ke == "import") {
	   
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
        
        //Load Library
		    require_once(APPPATH.'libraries/simplexlsx.class.php');
    		error_reporting(0);        
       
         if ( $xlsx = SimpleXLSX::parse( $up_data['full_path'] ) ) {
      	 list( $cols, ) = $xlsx->dimension();
         $data_excel = array();
  
    $jumlahrow=0;
		foreach ( $xlsx->rows() as $k => $r ) {
				if ($k == 0) continue; // skip first row
        //Isi Data dari masing masing field  
		   	$data_excel[$i]['Periode'] = $r[1];
        $LogPeriode =  $r[1];
       	$data_excel[$i]['Jenjang'] = $r[2];
        $LogJenjang =  $r[2];
       	$data_excel[$i]['Kecamatan'] = $r[3];
        $LogKecamatan = 	 $r[3];
       	$data_excel[$i]['NPSN'] = $r[4];
       	$data_excel[$i]['NamaSekolah'] = $r[5];
        $LogSekolah = 	 $r[5];
       	$data_excel[$i]['NamaSiswa'] = $r[6];
       	$data_excel[$i]['TanggalLahir'] = $r[7];
        $data_excel[$i]['AlamatSiswa'] = $r[8];
       	$data_excel[$i]['NamaIbu'] = $r[9];
       	$data_excel[$i]['NIK'] = $r[10];
       	$data_excel[$i]['NISN'] = $r[11];
       	$data_excel[$i]['Kelas'] = $r[12];
       	$data_excel[$i]['BatchCode'] = $rand;
        $LogBatchCode = 	$rand;
        $data_excel[$i]['Status'] = 'OK';
        
       	//Insert ke Database
        $this->db->insert_batch('uploadsiswa', $data_excel); 
        $jumlahrow++;
			
		}
   
    
		echo '</table>';
	} else {
		echo SimpleXLSX::parse_error();
	}
  
  $sekarang = date("Y-m-d H:i:s");
      
 	$this->db->query("INSERT INTO daftar_upload VALUES (NULL, '$LogPeriode', '$LogJenjang', '$LogKecamatan', '$LogSekolah','".$up_data['file_name']."','$jumlahrow', '".$this->session->userdata('admin_id')."', '$sekarang','Ada', '$LogBatchCode')");    
      
				
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupload </div>");
			}
			
				
			redirect('index.php/admin/import_excel');
		} else if ($mau_ke == "export") {
//			$a['data']		= $this->db->query("SELECT * FROM t_import_excel WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_import_excel";
		}   else {
	//		$a['data']		= $this->db->query("SELECT * FROM t_import_excel WHERE YEAR(tgl_diterima) = '$ta' ORDER BY id DESC LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_import_excel";
		}
		
		$this->load->view('admin/aaa', $a);
	} 
  
  //===================================================
  
 //================================================================================================================
 	public function import_npsn() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		
	
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		 $rand       = substr(md5(microtime()),rand(0,26),17);
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
	
		//upload config 
		$config['upload_path'] 		= './upload/import_excel';
		$config['allowed_types'] 	= 'xlsx';
		$config['max_size']			= '8000';
		$config['max_width']  		= '5000';
		$config['max_height'] 		= '5000';

		$this->load->library('upload', $config);
	 	
		if ($mau_ke == "import") {
	   
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
        
        //Load Library
		    require_once(APPPATH.'libraries/simplexlsx.class.php');
    		error_reporting(0);        
       
         if ( $xlsx = SimpleXLSX::parse( $up_data['full_path'] ) ) {
      	 list( $cols, ) = $xlsx->dimension();
         $data_excel = array();
  
    $jumlahrow=0;
		foreach ( $xlsx->rows() as $k => $r ) {
				if ($k == 0) continue; // skip first row
        //Isi Data dari masing masing field  
		   	$data_excel[$i]['Kecamatan'] = $r[1];
       	$data_excel[$i]['NPSN'] = $r[2];
       	$data_excel[$i]['Nama'] = $r[3];
       	$data_excel[$i]['Alamat'] = $r[4];
       	$data_excel[$i]['Kelurahan'] = $r[5];
       	$data_excel[$i]['Status'] = $r[6];
       	$data_excel[$i]['Jenjang'] = $r[7];
       	$data_excel[$i]['Kategori'] = $r[8];
        
       	//Insert ke Database
        $this->db->insert_batch('data_sekolah', $data_excel); 
        $jumlahrow++;
			
		}
   
    
		echo '</table>';
	} else {
		echo SimpleXLSX::parse_error();
	}
  
       
				
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupload </div>");
			}
			
				
			redirect('admin/import_npsn');
		} else if ($mau_ke == "export") {
//			$a['data']		= $this->db->query("SELECT * FROM t_import_excel WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_import_npsn";
		}   else {
	//		$a['data']		= $this->db->query("SELECT * FROM t_import_excel WHERE YEAR(tgl_diterima) = '$ta' ORDER BY id DESC LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_import_npsn";
		}
		
		$this->load->view('admin/aaa', $a);
	} 
  
  
  //===================================================
  
  public function daftar_upload() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM daftar_upload order by id desc ")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/daftar_upload/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
	  if ($mau_ke == "batal") {
      $BatchCode	= gval("daftar_upload", "id", "BatchCode", $idu);
      $this->db->query("UPDATE uploadsiswa set IsDeleted='Y' where BatchCode='$BatchCode' ");
      $this->db->query("UPDATE daftar_upload set Status='Batal' where BatchCode='$BatchCode' ");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Upload Telah dibatalkan </div>");
			redirect('admin/daftar_upload');
		} else 	if ($mau_ke == "jadi") {
      $BatchCode	= gval("daftar_upload", "id", "BatchCode", $idu);
		  $this->db->query("UPDATE uploadsiswa set IsDeleted='N' where BatchCode='$BatchCode' ");
     	$this->db->query("UPDATE daftar_upload set Status='Ada' where BatchCode='$BatchCode' ");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Upload Telah dikembalikan </div>");
			redirect('admin/daftar_upload');
		}
     else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_inter_office WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_daftar_upload";
		} else if ($mau_ke == "add") {
			$q_nomer_terakhir = $this->db->query("SELECT (MAX(no_agenda)) AS last FROM t_inter_office WHERE YEAR(tgl_diterima) = '".$this->session->userdata('admin_ta')."'")->row_array();
			$last	= str_pad(intval($q_nomer_terakhir['last']+1), 4, '0', STR_PAD_LEFT);
    	$a['nomer_terakhir'] = $last;
    	$a['page']		= "f_daftar_upload";
		}  else {
			$a['data']		= $this->db->query("SELECT * FROM daftar_upload ORDER BY id DESC  ")->result();
			$a['page']		= "l_daftar_upload";
		}
		
		$this->load->view('admin/aaa', $a);
	}
 //=======================================================
  //---------------------------------------------------------------------------------------------------------------

 
//==============================================================================  
    	public function hasil_seleksi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_paket_kirim WHERE YEAR(tgl_catat) = '$ta'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/hasil_seleksi/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
    $tgl_surat     = date('Y-m-d' , strtotime($tgl_surat));
   
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/paket_kirim';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_paket_kirim WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('admin/hasil_seleksi');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_paket_kirim WHERE isi_ringkas LIKE '%$cari%' OR tujuan LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_hasil_seleksi";
		} else if ($mau_ke == "add") {
			$q_nomer_terakhir = $this->db->query("SELECT (MAX(no_agenda)) AS last FROM t_paket_kirim WHERE YEAR(tgl_catat) = '".$this->session->userdata('admin_ta')."'")->row_array();
			$last	= str_pad(intval($q_nomer_terakhir['last']+1), 4, '0', STR_PAD_LEFT);

			$a['nomer_terakhir'] = $last;

			$a['page']		= "f_hasil_seleksi";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_paket_kirim WHERE id = '$idu'")->row();	
			$a['page']		= "f_hasil_seleksi";
		} else if ($mau_ke == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_paket_kirim VALUES (NULL, '$kode', '$no_agenda', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_paket_kirim VALUES (NULL, '$kode', '$no_agenda', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}		
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('admin/hasil_seleksi');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE t_paket_kirim SET no_agenda = '$no_agenda', kode = '$kode', isi_ringkas = '$uraian', tujuan = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_paket_kirim SET no_agenda = '$no_agenda', kode = '$kode', isi_ringkas = '$uraian', tujuan = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated ".$this->upload->display_errors()."</div>");			
			redirect('admin/hasil_seleksi');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_paket_kirim WHERE YEAR(tgl_catat) = '$ta' ORDER BY id DESC LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_hasil_seleksi";
		}
		
		$this->load->view('admin/aaa', $a);
	}
 
//==============================================================  
  	public function ref_sekolah() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM data_kecamatan ")->num_rows();
		$per_page		= 30;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/ref_sekolah/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
    $tgl_surat     = date('Y-m-d' , strtotime($tgl_surat));
   
     
    
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/paket_datang';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_paket_datang WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('admin/ref_sekolah');
		} else if ($mau_ke == "cari") {
	 			$a['data']		= $this->db->query("SELECT * FROM data_kecamatan  WHERE nama LIKE '%$cari%'  ORDER BY kode")->result();
	
    	$a['page']		= "l_upload_sekolah";
		} else if ($mau_ke == "add") {
			$q_nomer_terakhir = $this->db->query("SELECT (MAX(no_agenda)) AS last FROM t_paket_datang WHERE YEAR(tgl_diterima) = '".$this->session->userdata('admin_ta')."'")->row_array();
			$last	= str_pad(intval($q_nomer_terakhir['last']+1), 4, '0', STR_PAD_LEFT);

			$a['nomer_terakhir'] = $last;

			$a['page']		= "f_ref_sekolah";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_paket_datang WHERE id = '$idu'")->row();	
			$a['page']		= "f_ref_sekolah";
		} else if ($mau_ke == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_paket_datang VALUES (NULL, '$kode', '	$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_paket_datang VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect('admin/ref_sekolah');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE t_paket_datang SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_paket_datang SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. ".$this->upload->display_errors()."</div>");			
			redirect('admin/ref_sekolah');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM data_kecamatan ORDER BY kode")->result();
			$a['page']		= "l_upload_sekolah";
		}
		
		$this->load->view('admin/aaa', $a);
	}
  
//=====================================
//==============================================================  
  	public function daftar_sekolah() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM data_kecamatan ")->num_rows();
		$per_page		= 30;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/daftar_sekolah/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
    $tgl_surat     = date('Y-m-d' , strtotime($tgl_surat));
   
     
    
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/paket_datang';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_paket_datang WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('admin/daftar_sekolah');
		} else if ($mau_ke == "cari") {
		//	$a['data']		= $this->db->query("SELECT * FROM t_paket_datang WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['data']		= $this->db->query("SELECT * FROM data_kecamatan where nama like '%$cari%' ORDER BY kode")->result();
		
    	$a['page']		= "l_daftar_sekolah";
		} else if ($mau_ke == "add") {
			$q_nomer_terakhir = $this->db->query("SELECT (MAX(no_agenda)) AS last FROM t_paket_datang WHERE YEAR(tgl_diterima) = '".$this->session->userdata('admin_ta')."'")->row_array();
			$last	= str_pad(intval($q_nomer_terakhir['last']+1), 4, '0', STR_PAD_LEFT);

			$a['nomer_terakhir'] = $last;

			$a['page']		= "f_daftar_sekolah";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_paket_datang WHERE id = '$idu'")->row();	
			$a['page']		= "f_daftar_sekolah";
		} else if ($mau_ke == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_paket_datang VALUES (NULL, '$kode', '	$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_paket_datang VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect('admin/daftar_sekolah');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE t_paket_datang SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_paket_datang SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. ".$this->upload->display_errors()."</div>");			
			redirect('admin/ref_sekolah');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM data_kecamatan ORDER BY kode")->result();
			$a['page']		= "l_daftar_sekolah";
		}
		
		$this->load->view('admin/aaa', $a);
	}
    
 
//------------------------------------
//==============================================================  
  	public function daftar_siswa() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ta = $this->session->userdata('admin_ta');
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * from uploadsiswa")->num_rows();
		$per_page		= 30;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/daftar_siswa/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel post
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
    $tgl_surat     = date('Y-m-d' , strtotime($tgl_surat));
   
     
    
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/paket_datang';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_paket_datang WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('admin/daftar_siswa');
		} else if ($mau_ke == "cari") {
		//	$a['data']		= $this->db->query("SELECT * FROM t_paket_datang WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['data']		= $this->db->query("SELECT * FROM uploadsiswa where NamaSiswa like '%$cari%' or NamaSekolah  like '%$cari%' ORDER BY NamaSekolah,NamaSiswa")->result();
		
    	$a['page']		= "l_daftar_siswa";
		} else if ($mau_ke == "add") {
			$q_nomer_terakhir = $this->db->query("SELECT (MAX(no_agenda)) AS last FROM t_paket_datang WHERE YEAR(tgl_diterima) = '".$this->session->userdata('admin_ta')."'")->row_array();
			$last	= str_pad(intval($q_nomer_terakhir['last']+1), 4, '0', STR_PAD_LEFT);

			$a['nomer_terakhir'] = $last;

			$a['page']		= "f_daftar_siswa";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_paket_datang WHERE id = '$idu'")->row();	
			$a['page']		= "f_daftar_siswa";
		} else if ($mau_ke == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_paket_datang VALUES (NULL, '$kode', '	$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_paket_datang VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect('admin/daftar_siswa');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE t_paket_datang SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_paket_datang SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. ".$this->upload->display_errors()."</div>");			
			redirect('admin/daftar_siswa');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM uploadsiswa where Kecamatan='Sukosewu' ORDER BY NamaSekolah LIMIT $awal, $akhir")->result();
			$a['page']		= "l_daftar_siswa";
		}
		
		$this->load->view('admin/aaa', $a);
	}
    
 
//------------------------------------

public function export_excel() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		 	
		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$cari					= addslashes($this->input->post('q'));
		
		
		
if ($mau_ke == "cari") {
		
/* pagination */	
	
$this->load->library('ExcelSimple');  
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$filename = "example.xlsx";
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');
//Ini header Excel
$header = array(
	'NPM'=>'string',//0
	'KDPTI'=>'string',//1
	'JENIS_BEASISWA'=>'string',//2
	'COUNTER'=>'string',//3
	'NAMA_MHS'=>'string',//4
	'JK'=>'string',//5
	'KODE_PRODI'=>'string',//6
	'ID_JENJANG'=>'string',//7
	'SMT'=>'string',//8
	'IPK'=>'string',//9
	'KODE_PEKERJAAN'=>'string',//10
	'JML_TANGGUNGAN'=>'string',//11
	'PENGHASILAN'=>'integer',//12
	'PRESTASI'=>'string',//13
	'MULAI_BULAN'=>'YYYY-MM-DD',//14
	'SELESAI_BULAN'=>'YYYY-MM-DD',//15
	'TAHUN'=>'string',//16
	'KETERANGAN'=>'string',//17
	'ALAMAT'=>'string',//18
	'TELEPON'=>'string',//19
  );
 
$no=1;
//Styles untuk isi ada 20 field
$styles8 = array( ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'left','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'center','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'left','border'=>'left,right,top,bottom','border-style'=>'thin'],
                  ['halign'=>'left','border'=>'left,right,top,bottom','border-style'=>'thin']);






$writer = new XLSXWriter();
$writer->setAuthor('Beasiswa IKIP PGRI Bojonegoro'); 
//TulisHeader
$writer->writeSheetHeader('Sheet1', $header);
//Tulis Isi
$rows = $this->db->query(" select * from bsw_pemohon where IsDeleted='N' order by ProdiID asc; ")->result();
foreach($rows as $row)
{	
	$data=array();
	//Data data manas saja yg mau dimasukkan ke excel, diurutkan sesuai kolom di excel
	$data[0]=$row->MhswID;
	$data[1]=$row->KodePT;
	$data[2]=$row->JenisBeasiswa;
	$data[3]=$no;
	$data[4]=$row->Nama;
	$data[5]=$row->JenisKelamin;
  $data[6]=$row->ProdiID;
	$data[7]='5';
	$data[8]=$row->Semester;
	$data[9]=$row->IPK;
	$data[10]=$row->PekerjaanOrtu;
	$data[11]=$row->TanggunganOrtu;

	$data[12]=$row->PenghasilanOrtu; //Integer
	$data[13]=$row->Prestasi;
	$data[14]='2018-11-01';  //Tanggal
	$data[15]='2018-12-12';  //Tanggal
	$data[16]=$row->Periode;
	$data[17]=$row->Keterangan;
	$data[18]=$row->Alamat;
	$data[19]=$row->NoHP;
	
	
	$no++;
	//$writer->writeSheetRow('Sheet1', $row);
	$writer->writeSheetRow('Sheet1', $data,$styles8);
}
$writer->writeToStdOut();
//$writer->writeToFile('example.xlsx');
//echo $writer->writeToString();
exit(0);
			
		
		
		} else {
			//$a['data']		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1' LIMIT $awal, $akhir ")->result();
			$a['data']		= '';
		
			$a['page']		= "l_export_excel";
		}
		
		$this->load->view('admin/aaa', $a);	
	}	  

//--------------------------------------	
   

	public function surat_disposisi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(4);
		$idu1					= $this->uri->segment(3);
		$idu2					= $this->uri->segment(5);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$id_surat				= addslashes($this->input->post('id_surat'));
		$kpd_yth				= addslashes($this->input->post('kpd_yth'));
		$isi_disposisi			= addslashes($this->input->post('isi_disposisi'));
		$sifat					= addslashes($this->input->post('sifat'));
		$batas_waktu			= addslashes($this->input->post('batas_waktu'));
		$catatan				= addslashes($this->input->post('catatan'));
		
		$cari					= addslashes($this->input->post('q'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/surat_disposisi/".$idu1."/p");
		
		$a['judul_surat']	= gval("t_surat_masuk", "id", "isi_ringkas", $idu1);
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_disposisi WHERE id = '$idu2'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/surat_disposisi/'.$idu1);
		} else if ($mau_ke == "add") {
			$a['page']		= "f_surat_disposisi";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_disposisi WHERE id = '$idu2'")->row();	
			$a['page']		= "f_surat_disposisi";
		} else if ($mau_ke == "act_add") {	
			$this->db->query("INSERT INTO t_disposisi VALUES (NULL, '$id_surat', '$kpd_yth', '$isi_disposisi', '$sifat', '$batas_waktu', '$catatan')");
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/surat_disposisi/'.$id_surat);
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_disposisi SET kpd_yth = '$kpd_yth', isi_disposisi = '$isi_disposisi', sifat = '$sifat', batas_waktu = '$batas_waktu', catatan = '$catatan' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/surat_disposisi/'.$id_surat);
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1' LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_surat_disposisi";
		}
		
		$this->load->view('admin/aaa', $a);	
	}
	
	public function pengguna() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}		
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		
		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$alamat					= addslashes($this->input->post('alamat'));
		$kepsek					= addslashes($this->input->post('kepsek'));
		$nip_kepsek				= addslashes($this->input->post('nip_kepsek'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('logo')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek', logo = '".$up_data['file_name']."' WHERE id = '$idp'");

			} else {
				$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', kepsek = '$kepsek', nip_kepsek = '$nip_kepsek' WHERE id = '$idp'");
			}		

			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
			$a['page']		= "f_pengguna";
		}
		
		$this->load->view('admin/aaa', $a);	
	}
	

	
	public function manage_admin() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_admin")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/manage_admin/p");
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$username				= addslashes($this->input->post('username'));
		$pass_raw1				= addslashes($this->input->post('password'));
		$pass_raw2				= addslashes($this->input->post('password2'));
		$password				= md5(addslashes($this->input->post('password')));
		$nama					= addslashes($this->input->post('nama'));
		$nip					= addslashes($this->input->post('nip'));
		$level					= addslashes($this->input->post('level'));
		
		$cari					= addslashes($this->input->post('q'));

		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_admin WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_admin WHERE nama LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_manage_admin";
		} else if ($mau_ke == "add") {
			$a['page']		= "f_manage_admin";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_admin WHERE id = '$idu'")->row();	
			$a['page']		= "f_manage_admin";
		} else if ($mau_ke == "del") {
			$a['datpil']	= $this->db->query("DELETE FROM t_admin WHERE id = '$idu'")->row();	
			
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "act_add") {	
			$cek_user_exist = $this->db->query("SELECT username FROM t_admin WHERE username = '$username'")->num_rows();

			if (strlen($username) < 4) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username minimal 4 huruf</div>");
			} else if (strlen($pass_raw1) < 4) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Password minimal 4 huruf</div>");
			} else if ($pass_raw1 != $pass_raw2) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Password konfirmasi tidak sama..</div>");
			} else if ($cek_user_exist > 0) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username telah dipakai. Ganti yang lain..!</div>");
			} else {
				$this->db->query("INSERT INTO t_admin VALUES (NULL, '$username', '$password', '$nama', '$nip', '$level')");
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			redirect('index.php/admin/manage_admin');
		} else if ($mau_ke == "act_edt") {
			if (strlen($username) < 4) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username minimal 4 huruf</div>");
			} else if (strlen($pass_raw1) < 4) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Password minimal 4 huruf</div>");
			} else if ($pass_raw1 != $pass_raw2) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Password konfirmasi tidak sama..</div>");
			} else if ($cek_user_exist > 0) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">Username telah dipakai. Ganti yang lain..!</div>");
			} else {
				
				if ($pass_raw1 == "") {
					$this->db->query("UPDATE t_admin SET username = '$username', nama = '$nama', nip = '$nip', level = '$level' WHERE id = '$idp'");
				} else {
					$this->db->query("UPDATE t_admin SET username = '$username', password = '$password', nama = '$nama', nip = '$nip', level = '$level' WHERE id = '$idp'");
				}

				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			}
			
			redirect('index.php/admin/manage_admin');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_admin LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_manage_admin";
		}
		
		$this->load->view('admin/aaa', $a);
	}

	public function get_mhsw() {
		$kode 				= $this->input->post('kode',TRUE);
    if (strlen($kode)<3) {
            //do nothing;
          }
      else {
    	$data 				=  $this->db->query("SELECT * from mhsw WHERE  Nama LIKE '%$kode%' or MhswID like '%$kode%' ORDER BY Nama asc")->result();
	 	  $datamhsw	=  array();
        foreach ($data as $d) {
			$json_array				= array();
      $json_array['label']	= $d->MhswID.'-'.$d->Nama;
      $json_array['value']	= $d->Nama;
      $json_array['Nama']	= $d->Nama;
      $json_array['MhswID']	= $d->MhswID;
      $json_array['ProdiID']	= $d->ProdiID;
      $json_array['TempatLahir']	= $d->TempatLahir;
      $json_array['TanggalLahir']	= $d->TanggalLahir;
      $json_array['JenjangStudi']	= '5'; // Untuk Sarjan S-1 nilai adalah 5
      $json_array['KodePT']	= '072011'; // Untuk IKIP kode= 072011
      $json_array['JenisKelamin']	= $d->Kelamin;
        
     
      $datamhsw[] 			= $json_array;
  		}
		echo json_encode($datamhsw);
     }
    
    
	}    
 
	
	public function get_instansi_lain() {
		$kode 				= $this->input->post('dari',TRUE);
		
		$data 				=  $this->db->query("SELECT dari FROM t_surat_masuk WHERE dari LIKE '%$kode%' GROUP BY dari")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$klasifikasi[] 	= $d->dari;
		}
		
		echo json_encode($klasifikasi);
	}
	
	public function disposisi_cetak() {
		$idu = $this->uri->segment(3);
		$a['datpil1']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
		$a['datpil2']	= $this->db->query("SELECT kpd_yth FROM t_disposisi WHERE id_surat = '$idu'")->result();	
		$a['datpil3']	= $this->db->query("SELECT isi_disposisi, sifat, batas_waktu FROM t_disposisi WHERE id_surat = '$idu'")->result();	
		$this->load->view('admin/f_disposisi', $a);
	}
	
	public function passwod() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("admin/login");
		}
		
		$ke				= $this->uri->segment(3);
		$id_user		= $this->session->userdata('admin_id');
		
		//var post
		$p1				= md5($this->input->post('p1'));
		$p2				= md5($this->input->post('p2'));
		$p3				= md5($this->input->post('p3'));
		
		if ($ke == "simpan") {
			$cek_password_lama	= $this->db->query("SELECT password FROM t_admin WHERE id = $id_user")->row();
			//echo 
			
			if ($cek_password_lama->password != $p1) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Lama tidak sama</div>');
				redirect('index.php/admin/passwod');
			} else if ($p2 != $p3) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Baru 1 dan 2 tidak cocok</div>');
				redirect('index.php/admin/passwod');
			} else {
				$this->db->query("UPDATE t_admin SET password = '$p3' WHERE id = ".$id_user."");
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-success">Password berhasil diperbaharui</div>');
				redirect('index.php/admin/passwod');
			}
		} else {
			$a['page']	= "f_passwod";
		}
		
		$this->load->view('admin/aaa', $a);
	}
	
	//login
	public function login() {
		$this->load->view('admin/login');
	}
	
	public function do_login() {
		$u 		= $this->security->xss_clean($this->input->post('u'));
		$ta 	= $this->security->xss_clean($this->input->post('ta'));
        $p 		= md5($this->security->xss_clean($this->input->post('p')));
         
		$q_cek	= $this->db->query("SELECT * FROM t_admin WHERE username = '".$u."' AND password = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
            $data = array(
                    'admin_id' => $d_cek->id,
                    'admin_user' => $d_cek->username,
                    'admin_nama' => $d_cek->nama,
                    'admin_ta' => $ta,
                    'admin_level' => $d_cek->level,
					'admin_valid' => true
                    );
            $this->session->set_userdata($data);
            redirect('index.php/admin');
        } else {	
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect('index.php/admin/login');
		}
	}
	
	public function logout(){
        $this->session->sess_destroy();
		redirect('index.php/admin/login');
    }
}
