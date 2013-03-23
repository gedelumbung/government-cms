<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
      $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
      $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
      $d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
      $d['dt_agenda'] = $this->app_global_model->generate_menu_agenda($_SESSION['limit_sidebar_agenda'],0);
      $d['dt_polling'] = $this->app_global_model->generate_menu_polling();
      $d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
      $d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
      $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
      $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
      $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
      $d['dt_list_berita'] = $this->app_global_model->generate_daftar_berita($_SESSION['site_limit_berita_slider'],0);

      $this->breadcrumb->append_crumb('Beranda', base_url());
      $this->breadcrumb->append_crumb('Selamat datang di Website '.$_SESSION['site_title'].'', '/');

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      $this->load->view($_SESSION['site_theme'].'/bg_slider');
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/bg_left');
      $this->load->view($_SESSION['site_theme'].'/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_right');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function pages($id_pages)
   {
      $where['id_menu'] = $id_pages;
      $get_data = $this->db->get_where("dlmbg_menu",$where);
      if($get_data->num_rows()>0)
      {
      		$h = $get_data->row();
      		if($h->url_route=="")
      		{
			      $this->breadcrumb->append_crumb('Beranda', base_url());
			      $this->breadcrumb->append_crumb($h->menu, '/');
			      $d['title'] = $h->menu;
			      $d['content'] = $h->content;

			      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			      $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
			      $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
			      $d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
			      $d['dt_agenda'] = $this->app_global_model->generate_menu_agenda($_SESSION['limit_sidebar_agenda'],0);
			      $d['dt_polling'] = $this->app_global_model->generate_menu_polling();
			      $d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
			      $d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			      $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			      $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			      $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			      $d['dt_list_berita'] = $this->app_global_model->generate_daftar_berita($_SESSION['site_limit_berita_slider'],0);


			      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			      $this->load->view($_SESSION['site_theme'].'/bg_left');
			      $this->load->view($_SESSION['site_theme'].'/pages/bg_home');
			      $this->load->view($_SESSION['site_theme'].'/bg_right');
			      $this->load->view($_SESSION['site_theme'].'/bg_footer');
      		}
      		else
      		{
				redirect($h->url_route);
      		}
      }
      else
      {
	      	redirect(base_url());
      }
   }
}
 
/* End of file web.php */
