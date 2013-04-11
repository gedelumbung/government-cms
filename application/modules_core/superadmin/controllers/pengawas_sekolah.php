<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengawas_sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Pengawas Sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_pengawas_sekolah($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('pengawas_sekolah/bg_home');
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
			$this->breadcrumb->append_crumb("pengawas_sekolah", base_url().'superadmin/pengawas_sekolah');
			$this->breadcrumb->append_crumb("Input pengawas_sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['unit_kerja'] = $this->db->get("dlmbg_super_unit_kerja");
			
			$d['nama'] = "";
			$d['nip'] = "";
			$d['jabatan'] = "";
			$d['id_unit_kerja'] = "";
			$d['kontak'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('pengawas_sekolah/bg_input');
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
			$this->breadcrumb->append_crumb("pengawas_sekolah", base_url().'superadmin/pengawas_sekolah');
			$this->breadcrumb->append_crumb("Update pengawas_sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['unit_kerja'] = $this->db->get("dlmbg_super_unit_kerja");
			
			$where['id_super_pengawas_sekolah'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_pengawas_sekolah",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['nip'] = $get->nip;
			$d['jabatan'] = $get->jabatan;
			$d['id_unit_kerja'] = $get->id_unit_kerja;
			$d['kontak'] = $get->kontak;
			
			$d['id_param'] = $get->id_super_pengawas_sekolah;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('pengawas_sekolah/bg_input');
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
			$id['id_super_pengawas_sekolah'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['nip'] = $this->input->post("nip");
				$in['jabatan'] = $this->input->post("jabatan");
				$in['id_unit_kerja'] = $this->input->post("id_unit_kerja");
				$in['kontak'] = $this->input->post("kontak");
				
				$this->db->insert("dlmbg_super_pengawas_sekolah",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['nip'] = $this->input->post("nip");
				$in['jabatan'] = $this->input->post("jabatan");
				$in['id_unit_kerja'] = $this->input->post("id_unit_kerja");
				$in['kontak'] = $this->input->post("kontak");
				
				$this->db->update("dlmbg_super_pengawas_sekolah",$in,$id);
			}
			
			redirect("superadmin/pengawas_sekolah");
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
			redirect("superadmin/pengawas_sekolah");
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
			$where['id_super_pengawas_sekolah'] = $id_param;
			$this->db->delete("dlmbg_super_pengawas_sekolah",$where);
			redirect("superadmin/pengawas_sekolah");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
