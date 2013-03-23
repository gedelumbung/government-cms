<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri_sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Galeri Sekolah", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_sekolah'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_galeri_sekolah($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_sekolah/bg_home');
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
			$where['id_sekolah_profil'] = $id_param;
			$get = $this->db->get_where("dlmbg_sekolah_profil",$where)->row();

			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Galeri Sekolah", base_url().'superadmin/galeri_sekolah');
			$this->breadcrumb->append_crumb($get->nama_sekolah, '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_foto_galeri_sekolah($id_param,$this->config->item("limit_item"),$uri);
			
			$this->load->view('bg_header',$d);
			$this->load->view('galeri_sekolah/bg_detail');
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
			redirect("superadmin/galeri_sekolah");
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
			$id['id_sekolah_galeri_sekolah'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_sekolah_galeri_sekolah",$up,$id);
			redirect("superadmin/galeri_sekolah/detail/".$id_sekolah."");
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
			$path = "./asset/images/galeri-sekolah/medium/".$file."";
			$path_thumb = "./asset/images/galeri-sekolah/thumb/".$file."";
			unlink($path);
			unlink($path_thumb);

			$where['id_sekolah_galeri_sekolah'] = $id_param;
			$this->db->delete("dlmbg_sekolah_galeri_sekolah",$where);
			redirect("superadmin/galeri_sekolah/detail/".$id_sekolah."");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
