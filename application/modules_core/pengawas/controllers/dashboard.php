<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
	if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="pengawas")
	  {
		  $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
		  $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
		  $d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
		  $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
		  $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
		  $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
		  $d['dt_list_berita'] = $this->app_global_model->generate_daftar_berita($_SESSION['site_limit_berita_slider'],0);
	
		  $this->breadcrumb->append_crumb('Beranda', base_url());
		  $this->breadcrumb->append_crumb('Dashboard', '/');
		  
		  $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
		  if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
		  $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
		  $this->load->view($_SESSION['site_theme'].'/pengawas/bg_home');
		  $this->load->view($_SESSION['site_theme'].'/bg_footer');
		  
		}
		else
		{
			redirect("web");
		}
   }
   
   function logout()
   {
   		$this->session->sess_destroy();
		redirect("web");
   }
}
 
/* End of file web.php */
