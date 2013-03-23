<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kepegawaian extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Kepegawaian", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_kepegawaian($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('kepegawaian/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Kepegawaian", base_url().'superadmin/kepegawaian');
			$this->breadcrumb->append_crumb("Input Kepegawaian", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['bidang'] = $this->db->get("dlmbg_super_bidang");
			
			$d['nama'] = "";
			$d['nip'] = "";
			$d['jabatan'] = "";
			$d['id_bidang'] = "";
			$d['kontak'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('kepegawaian/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Kepegawaian", base_url().'superadmin/kepegawaian');
			$this->breadcrumb->append_crumb("Update Kepegawaian", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['bidang'] = $this->db->get("dlmbg_super_bidang");
			
			$where['id_super_kepegawaian'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_kepegawaian",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['nip'] = $get->nip;
			$d['jabatan'] = $get->jabatan;
			$d['id_bidang'] = $get->id_bidang;
			$d['kontak'] = $get->kontak;
			
			$d['id_param'] = $get->id_super_kepegawaian;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('kepegawaian/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_super_kepegawaian'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['nip'] = $this->input->post("nip");
				$in['jabatan'] = $this->input->post("jabatan");
				$in['id_bidang'] = $this->input->post("id_bidang");
				$in['kontak'] = $this->input->post("kontak");
				
				$this->db->insert("dlmbg_super_kepegawaian",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['nip'] = $this->input->post("nip");
				$in['jabatan'] = $this->input->post("jabatan");
				$in['id_bidang'] = $this->input->post("id_bidang");
				$in['kontak'] = $this->input->post("kontak");
				
				$this->db->update("dlmbg_super_kepegawaian",$in,$id);
			}
			
			redirect("superadmin/kepegawaian");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/kepegawaian");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$where['id_super_kepegawaian'] = $id_param;
			$this->db->delete("dlmbg_super_kepegawaian",$where);
			redirect("superadmin/kepegawaian");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
