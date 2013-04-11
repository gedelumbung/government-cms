<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita_pengawas extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Berita Pengawas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['judul'] = $this->session->userdata("by_judul");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_berita_pengawas($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('berita_pengawas/bg_home');
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
			$sess['by_judul'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("superadmin/berita_pengawas");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$path = "./asset/images/berita-pengawas/thumb/".$file."";
			unlink($path);
			$where['id_pengawas_berita'] = $id_param;
			$this->db->delete("dlmbg_pengawas_berita",$where);
			redirect("superadmin/berita_pengawas");
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
			$id['id_pengawas_berita'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_pengawas_berita",$up,$id);
			redirect("superadmin/berita_pengawas");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
