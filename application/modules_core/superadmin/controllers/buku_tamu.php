<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buku_tamu extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Buku Tamu", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "active";
			$d['aktif_list_download'] = "";
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_buku_tamu($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('buku_tamu/bg_home');
			$this->load->view('bg_footer');
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
			$sess['by_nama'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("superadmin/buku_tamu");
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
			$where['id_super_buku_tamu'] = $id_param;
			$this->db->delete("dlmbg_super_buku_tamu",$where);
			redirect("superadmin/buku_tamu");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$id['id_super_buku_tamu'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_super_buku_tamu",$up,$id);
			redirect("superadmin/buku_tamu");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
