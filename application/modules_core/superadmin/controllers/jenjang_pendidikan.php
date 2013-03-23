<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenjang_pendidikan extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Jenjang Pendidikan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['pendidikan'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_jenjang_pendidikan($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('jenjang_pendidikan/bg_home');
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
			$this->breadcrumb->append_crumb("Jenjang Pendidikan", base_url().'superadmin/jenjang_pendidikan');
			$this->breadcrumb->append_crumb("Input Jenjang Pendidikan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['pendidikan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('jenjang_pendidikan/bg_input');
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
			$this->breadcrumb->append_crumb("Jenjang Pendidikan", base_url().'superadmin/jenjang_pendidikan');
			$this->breadcrumb->append_crumb("Update Jenjang Pendidikan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_super_jenjang_pendidikan'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_jenjang_pendidikan",$where)->row();
			
			$d['pendidikan'] = $get->pendidikan;
			
			$d['id_param'] = $get->id_super_jenjang_pendidikan;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('jenjang_pendidikan/bg_input');
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
			$id['id_super_jenjang_pendidikan'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['pendidikan'] = $this->input->post("pendidikan");
				
				$this->db->insert("dlmbg_super_jenjang_pendidikan",$in);
			}
			else if($tipe=="edit")
			{
				$in['pendidikan'] = $this->input->post("pendidikan");
				
				$this->db->update("dlmbg_super_jenjang_pendidikan",$in,$id);
			}
			
			redirect("superadmin/jenjang_pendidikan");
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
			redirect("superadmin/jenjang_pendidikan");
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
			$where['id_super_jenjang_pendidikan'] = $id_param;
			$this->db->delete("dlmbg_super_jenjang_pendidikan",$where);
			redirect("superadmin/jenjang_pendidikan");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
