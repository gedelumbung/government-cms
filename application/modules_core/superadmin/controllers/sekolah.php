<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_sekolah'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_sekolah($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('sekolah/bg_home');
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
			$this->breadcrumb->append_crumb("Sekolah", base_url().'superadmin/sekolah');
			$this->breadcrumb->append_crumb("Input Sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['jenjang_pendidikan'] = $this->db->get("dlmbg_super_jenjang_pendidikan");
			$d['kecamatan'] = $this->db->get("dlmbg_super_kecamatan");
			
			$d['nama_sekolah'] = "";
			$d['id_jenjang_pendidikan'] = "";
			$d['id_kecamatan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('sekolah/bg_input');
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
			$this->breadcrumb->append_crumb("sekolah", base_url().'superadmin/sekolah');
			$this->breadcrumb->append_crumb("Update sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_sekolah_profil'] = $id_param;
			$get = $this->db->get_where("dlmbg_sekolah_profil",$where)->row();
			
			$d['jenjang_pendidikan'] = $this->db->get("dlmbg_super_jenjang_pendidikan");
			$d['kecamatan'] = $this->db->get("dlmbg_super_kecamatan");
			
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['id_jenjang_pendidikan'] = $get->id_jenjang_pendidikan;
			$d['id_kecamatan'] = $get->id_kecamatan;
			
			$d['id_param'] = $get->id_sekolah_profil;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('sekolah/bg_input');
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
			$id['id_sekolah_profil'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_sekolah'] = $this->input->post("nama_sekolah");
				$in['id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				
				$this->db->insert("dlmbg_sekolah_profil",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama_sekolah'] = $this->input->post("nama_sekolah");
				$in['id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
				$in['id_kecamatan'] = $this->input->post("id_kecamatan");
				
				$this->db->update("dlmbg_sekolah_profil",$in,$id);
			}
			
			redirect("superadmin/sekolah");
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
			redirect("superadmin/sekolah");
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
			$where['id_sekolah_profil'] = $id_param;
			$this->db->delete("dlmbg_sekolah_profil",$where);
			redirect("superadmin/sekolah");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
