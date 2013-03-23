<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_guru extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Data PTK/Guru", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_data_guru'] = $this->app_global_operator_model->generate_index_guru($this->config->item("limit_item_medium"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/data_guru/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Data PTK/Guru", base_url().'operator/data_guru');
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
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/data_guru/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Data PTK/Guru", base_url().'operator/data_guru');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$where['id_sekolah_guru'] = $id_param;
			$where['id_sekolah'] = $this->session->userdata("id_sekolah");
			$get = $this->db->get_where("dlmbg_sekolah_guru",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['jk'] = $get->jk;
			$d['status_pns'] = $get->status_pns;
			$d['golongan'] = $get->golongan;
			$d['tugas'] = $get->tugas;
			$d['tempat_lahir'] = $get->tempat_lahir;
			$d['tanggal_lahir'] = $get->tanggal_lahir;
			$d['tanggal_bertugas'] = $get->tanggal_bertugas;
			
			$d['id_param'] = $get->id_sekolah_guru;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/data_guru/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$tipe = $this->input->post("tipe");
			$id['id_sekolah_guru'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['jk'] = $this->input->post("jk");
				$in['status_pns'] = $this->input->post("status_pns");
				$in['golongan'] = $this->input->post("golongan");
				$in['tugas'] = $this->input->post("tugas");
				$in['id_sekolah'] = $this->input->post("id_sekolah");
				$in['id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				$in['tempat_lahir'] = $this->input->post("tempat_lahir");
				$in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
				$in['tanggal_bertugas'] = $this->input->post("tanggal_bertugas");
				
				$this->db->insert("dlmbg_sekolah_guru",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['jk'] = $this->input->post("jk");
				$in['status_pns'] = $this->input->post("status_pns");
				$in['golongan'] = $this->input->post("golongan");
				$in['tugas'] = $this->input->post("tugas");
				$in['id_sekolah'] = $this->input->post("id_sekolah");
				$in['id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				$in['tempat_lahir'] = $this->input->post("tempat_lahir");
				$in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
				$in['tanggal_bertugas'] = $this->input->post("tanggal_bertugas");
				
				$this->db->update("dlmbg_sekolah_guru",$in,$id);
			}
			
			redirect("operator/data_guru");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("operator/data_guru");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$where['id_sekolah_guru'] = $id_param;
			$where['id_sekolah'] = $this->session->userdata("id_sekolah");
			$this->db->delete("dlmbg_sekolah_guru",$where);
			redirect("operator/data_guru");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
