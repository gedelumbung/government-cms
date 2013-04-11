<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri_sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
      redirect("web/data_sekolah");
   }
 
   public function sekolah($id_param,$uri=0)
   {
      $where['id_sekolah_profil'] = $id_param;
      $get_data = $this->db->get_where("dlmbg_sekolah_profil",$where);
      $ret_data = $get_data->row();
      if($get_data->num_rows()>0)
      {
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Indexs Data Sekolah', base_url().'web/data_sekolah');
			$this->breadcrumb->append_crumb($ret_data->nama_sekolah, 
			base_url().'web/data_sekolah/profil/'.$ret_data->id_sekolah_profil.'/'.url_title(strtolower($ret_data->nama_sekolah)).'');
			$this->breadcrumb->append_crumb("Galeri Sekolah", '/');

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
	  
			  $d['dt_berita_pengawas'] = $this->app_global_model->generate_menu_berita_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
			  $d['dt_artikel_pengawas'] = $this->app_global_model->generate_menu_artikel_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
			  $d['dt_pengumuman_pengawas'] = $this->app_global_model->generate_menu_pengumuman_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
			  $d['dt_agenda_pengawas'] = $this->app_global_model->generate_menu_agenda_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);

			$d['nama_sekolah'] = $ret_data->nama_sekolah;
			$d['id_sekolah'] = $ret_data->id_sekolah_profil;
      		$d['dt_data_galeri_sekolah'] = $this->app_global_model->generate_index_galeri_sekolah($id_param,$this->config->item("limit_item_super_big"),$uri);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/bg_left');
			$this->load->view($_SESSION['site_theme'].'/data_sekolah/galeri_sekolah/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_right');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
      }
      else
      {
	      	redirect(base_url());
      }
   }
 
   public function set()
   {
      $sess['by_id_kecamatan'] = $this->input->post("id_kecamatan");
      $sess['by_id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
	  $this->session->set_userdata($sess);
	  redirect("web/data_sekolah");
   }
}
 
/* End of file berita.php */
