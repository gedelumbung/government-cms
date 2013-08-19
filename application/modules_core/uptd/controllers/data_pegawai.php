<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_pegawai extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'uptd/dashboard');
			$this->breadcrumb->append_crumb("Data Pegawai", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_data_pegawai'] = $this->app_global_uptd_model->generate_index_pegawai($this->config->item("limit_item_medium"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/uptd/data_pegawai/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'uptd/dashboard');
			$this->breadcrumb->append_crumb("Data Pegawai", base_url().'uptd/data_pegawai');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$d['nama'] = "";
			$d['jk'] = "";
			$d['status_pns'] = "";
			$d['golongan'] = "";
			$d['tugas'] = "";
			$d['tempat_lahir'] = "";
			$d['tanggal_lahir'] = "";
			$d['tanggal_bertugas'] = "";
			$d['nip'] = "";
			$d['kontak'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/uptd/data_pegawai/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'uptd/dashboard');
			$this->breadcrumb->append_crumb("Data PTK/Guru", base_url().'uptd/data_guru');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$where['id_uptd_pegawai'] = $id_param;
			$where['id_kecamatan'] = $this->session->userdata("id_kecamatan");
			$get = $this->db->get_where("dlmbg_uptd_pegawai",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['jk'] = $get->jk;
			$d['status_pns'] = $get->status_pns;
			$d['golongan'] = $get->golongan;
			$d['tugas'] = $get->tugas;
			$d['tempat_lahir'] = $get->tempat_lahir;
			$d['tanggal_lahir'] = $get->tanggal_lahir;
			$d['tanggal_bertugas'] = $get->tanggal_bertugas;
			$d['nip'] = $get->nip;
			$d['kontak'] = $get->kontak;
			
			$d['id_param'] = $get->id_uptd_pegawai;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/uptd/data_pegawai/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$tipe = $this->input->post("tipe");
			$id['id_uptd_pegawai'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['jk'] = $this->input->post("jk");
				$in['status_pns'] = $this->input->post("status_pns");
				$in['golongan'] = $this->input->post("golongan");
				$in['tugas'] = $this->input->post("tugas");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				$in['tempat_lahir'] = $this->input->post("tempat_lahir");
				$in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
				$in['tanggal_bertugas'] = $this->input->post("tanggal_bertugas");
				$in['nip'] = $this->input->post("nip");
				$in['kontak'] = $this->input->post("kontak");
				
				$this->db->insert("dlmbg_uptd_pegawai",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['jk'] = $this->input->post("jk");
				$in['status_pns'] = $this->input->post("status_pns");
				$in['golongan'] = $this->input->post("golongan");
				$in['tugas'] = $this->input->post("tugas");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				$in['tempat_lahir'] = $this->input->post("tempat_lahir");
				$in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
				$in['tanggal_bertugas'] = $this->input->post("tanggal_bertugas");
				$in['nip'] = $this->input->post("nip");
				$in['kontak'] = $this->input->post("kontak");
				
				$this->db->update("dlmbg_uptd_pegawai",$in,$id);
			}
			
			redirect("uptd/data_pegawai");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("uptd/data_pegawai");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$where['id_uptd_pegawai'] = $id_param;
			$where['id_kecamatan'] = $this->session->userdata("id_kecamatan");
			$this->db->delete("dlmbg_uptd_pegawai",$where);
			redirect("uptd/data_pegawai");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
