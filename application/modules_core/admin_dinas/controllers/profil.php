<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dinas/dashboard');
			$this->breadcrumb->append_crumb("Profil User", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$d['nama_admin_dinas'] = $this->session->userdata("nama_user_login");
			$d['username'] = $this->session->userdata("username");
			$d['bidang'] = $this->session->userdata("bidang");
			$d['id_param'] = $this->session->userdata("id_admin_dinas");
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_dinas/profil/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$tipe = $this->input->post("tipe");
			$id['id_admin_dinas'] = $this->input->post("id_param");
			$id['username_admin_dinas'] = $this->input->post("username");
			
			$in['nama_admin_dinas'] = $this->input->post("nama_admin_dinas");
			
			$sess['nama_user_login'] = $in['nama_admin_dinas'];
			$this->session->set_userdata($sess);
			
			$this->db->update("dlmbg_admin_dinas",$in,$id);
			
			redirect("admin_dinas/profil");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
