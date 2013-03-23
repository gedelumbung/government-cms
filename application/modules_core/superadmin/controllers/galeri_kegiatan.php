<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri_kegiatan extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Album Galeri Kegiatan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_album'] = $this->session->userdata("by_nama_album");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_galeri_kegiatan($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_kegiatan/bg_home');
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
			$this->breadcrumb->append_crumb("Galeri Kegiatan", base_url().'superadmin/galeri_kegiatan');
			$this->breadcrumb->append_crumb("Input Galeri Kegiatan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['nama_album'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_kegiatan/bg_input');
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
			$this->breadcrumb->append_crumb("Galeri Kegiatan", base_url().'superadmin/galeri_kegiatan');
			$this->breadcrumb->append_crumb("Update Galeri Kegiatan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_abum_galeri_dinas'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_album_galeri_dinas",$where)->row();
			
			$d['nama_album'] = $get->nama_album;
			
			$d['id_param'] = $get->id_abum_galeri_dinas;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_kegiatan/bg_input');
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
			$id['id_abum_galeri_dinas'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_album'] = $this->input->post("nama_album");
				
				$this->db->insert("dlmbg_super_album_galeri_dinas",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama_album'] = $this->input->post("nama_album");
				
				$this->db->update("dlmbg_super_album_galeri_dinas",$in,$id);
			}
			
			redirect("superadmin/galeri_kegiatan");
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
			$sess['by_nama_album'] = $this->input->post("by_nama_album");
			$this->session->set_userdata($sess);
			redirect("superadmin/galeri_kegiatan");
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
			$where['id_abum_galeri_dinas'] = $id_param;
			$this->db->delete("dlmbg_super_album_galeri_dinas",$where);
			$where2['id_album'] = $id_param;
			$this->db->delete("dlmbg_super_galeri_dinas",$where2);
			redirect("superadmin/galeri_kegiatan");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
