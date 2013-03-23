<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil_sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Profil Sekolah", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$id['id_sekolah_profil'] = $this->session->userdata("id_sekolah");
			$get = $this->db->get_where("dlmbg_sekolah_profil",$id)->row();
			$d['id_param'] = $get->id_sekolah_profil;
			$d['npsn'] = $get->npsn;
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['status_sekolah'] = $get->status_sekolah;
			$d['id_jenjang_pendidikan'] = $get->id_jenjang_pendidikan;
			$d['visi_misi'] = $get->visi_misi;
			$d['alamat'] = $get->alamat;
			$d['id_kecamatan'] = $this->session->userdata("id_kecamatan");
			$d['email'] = $get->email;
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/profil_sekolah/bg_home');
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
			$this->form_validation->set_rules('npsn', 'NPSN', 'trim|required');
			$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'trim|required');
			$this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'trim|required');
			$this->form_validation->set_rules('visi_misi', 'Visi Misi', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$id['id_sekolah_profil'] = $this->input->post("id_param");
				
				$up['npsn'] = $this->input->post("npsn");
				$up['nama_sekolah'] = $this->input->post("nama_sekolah");
				$up['status_sekolah'] = $this->input->post("status_sekolah");
				$up['id_jenjang_pendidikan'] = $this->session->userdata("id_jenjang_pendidikan");
				$up['visi_misi'] = $this->input->post("visi_misi");
				$up['alamat'] = $this->input->post("alamat");
				$up['id_kecamatan'] = $this->session->userdata("id_kecamatan");
				$up['email'] = $this->input->post("email");
				
				$this->db->update("dlmbg_sekolah_profil",$up,$id);
				$this->session->set_flashdata("result_login","Data berhasil diperbaharui");
				redirect("operator/profil_sekolah");
				
			}
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
