<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class agenda extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'pengawas/dashboard');
			$this->breadcrumb->append_crumb("Agenda", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$filter['judul'] = $this->session->userdata("by_judul");
			$d['dt_agenda'] = $this->app_global_pengawas_model->generate_index_agenda($this->config->item("limit_item_medium"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/pengawas/agenda/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'pengawas/dashboard');
			$this->breadcrumb->append_crumb("Agenda Pengawas", base_url().'pengawas/agenda');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$d['judul'] = "";
			$d['isi'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/pengawas/agenda/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'pengawas/dashboard');
			$this->breadcrumb->append_crumb("Agenda Pengawas", base_url().'pengawas/agenda');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$where['id_pengawas_agenda'] = $id_param;
			$where['id_unit_kerja'] = $this->session->userdata("id_unit_kerja");
			$get = $this->db->get_where("dlmbg_pengawas_agenda",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['isi'] = $get->isi;
			
			$d['id_param'] = $get->id_pengawas_agenda;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/pengawas/agenda/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
		{
			$tipe = $this->input->post("tipe");
			$id['id_pengawas_agenda'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['judul'] = $this->input->post("judul");
				$in['isi'] = $this->input->post("isi");
				$in['tanggal'] = time()+3600*7;
				$in['id_user_pengawas'] = $this->session->userdata("id_user_pengawas");
				$in['id_unit_kerja'] = $this->session->userdata("id_unit_kerja");
				$in['stts'] = "0";
				
				$this->db->insert("dlmbg_pengawas_agenda",$in);
			}
			else if($tipe=="edit")
			{
				$in['judul'] = $this->input->post("judul");
				$in['isi'] = $this->input->post("isi");
				
				$this->db->update("dlmbg_pengawas_agenda",$in,$id);
			}
			
			redirect("pengawas/agenda");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
		{
			$sess['by_judul'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("pengawas/agenda");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
		{
			$where['id_pengawas_agenda'] = $id_param;
			$where['id_unit_kerja'] = $this->session->userdata("id_unit_kerja");
			$this->db->delete("dlmbg_pengawas_agenda",$where);
			redirect("pengawas/agenda");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
