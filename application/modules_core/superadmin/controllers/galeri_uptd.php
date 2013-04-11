<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri_uptd extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Galeri UPTD", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_kecamatan'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_galeri_uptd($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_uptd/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function detail($id_param,$uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$where['id_super_kecamatan'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_kecamatan",$where)->row();

			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Galeri UPTD", base_url().'superadmin/galeri_uptd');
			$this->breadcrumb->append_crumb($get->kecamatan, '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_foto_galeri_uptd($id_param,$this->config->item("limit_item"),$uri);
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_uptd/bg_detail');
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
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/galeri_uptd");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_sekolah,$id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$id['id_uptd_galeri_uptd'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_uptd_galeri_uptd",$up,$id);
			redirect("superadmin/galeri_uptd/detail/".$id_sekolah."");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_sekolah,$id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$path = "./asset/images/galeri-uptd/medium/".$file."";
			$path_thumb = "./asset/images/galeri-uptd/thumb/".$file."";
			unlink($path);
			unlink($path_thumb);

			$where['id_uptd_galeri_uptd'] = $id_param;
			$this->db->delete("dlmbg_uptd_galeri_uptd",$where);
			redirect("superadmin/galeri_uptd/detail/".$id_sekolah."");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
