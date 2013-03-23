<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buku_tamu extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
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

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
		
		$in['nama'] = $this->input->post("nama");
		$in['kontak'] = $this->input->post("kontak");
		$in['pesan'] = $this->input->post("pesan");
		$in['tanggal'] = time()+3600*7;
		$in['stts'] = 0;
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Buku Tamu', '/');
			
			$d['dt_index_buku_tamu'] = $this->app_global_model->generate_index_buku_tamu($this->config->item('limit_item'),$uri);
			$d['dt_captcha'] = $this->app_global_model->generate_captcha();
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/bg_left');
			$this->load->view($_SESSION['site_theme'].'/buku_tamu/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_right');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			$expiration = time()-3600;
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND captcha_time > ?";
			$binds = array($_POST['captcha'], $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			
			if ($row->count == 0)
			{
				$this->session->set_flashdata('result_insert', 'Captcha tidak valid');
				redirect("web/buku_tamu");
			}
			else
			{
				$this->db->insert("dlmbg_super_buku_tamu",$in);
				$this->session->set_flashdata('result_insert', 'Data berhasil dikirim dan akan kami moderisasi');
				redirect("web/buku_tamu");
			}
		}
	}
}
 
/* End of file berita.php */
