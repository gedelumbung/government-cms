<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class unit_kerja extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Unit Kerja", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['unit_kerja'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_unit_kerja($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('unit_kerja/bg_home');
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
			$this->breadcrumb->append_crumb("Bidang", base_url().'superadmin/bidang');
			$this->breadcrumb->append_crumb("Input Unit Kerja", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['unit_kerja'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('unit_kerja/bg_input');
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
			$this->breadcrumb->append_crumb("Bidang", base_url().'superadmin/bidang');
			$this->breadcrumb->append_crumb("Update Unit Kerja", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_super_unit_kerja'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_unit_kerja",$where)->row();
			
			$d['unit_kerja'] = $get->unit_kerja;
			
			$d['id_param'] = $get->id_super_unit_kerja;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('unit_kerja/bg_input');
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
			$id['id_super_unit_kerja'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['unit_kerja'] = $this->input->post("unit_kerja");
				
				$this->db->insert("dlmbg_super_unit_kerja",$in);
			}
			else if($tipe=="edit")
			{
				$in['unit_kerja'] = $this->input->post("unit_kerja");
				
				$this->db->update("dlmbg_super_unit_kerja",$in,$id);
			}
			
			redirect("superadmin/unit_kerja");
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
			redirect("superadmin/unit_kerja");
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
			$where['id_super_unit_kerja'] = $id_param;
			$this->db->delete("dlmbg_super_unit_kerja",$where);
			redirect("superadmin/unit_kerja");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
