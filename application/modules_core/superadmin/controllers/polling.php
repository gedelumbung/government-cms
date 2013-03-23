<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class polling extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Polling", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['pertanyaan'] = $this->session->userdata("by_pertanyaan");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_polling($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('polling/bg_home');
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
			$this->breadcrumb->append_crumb("Polling", base_url().'superadmin/polling');
			$this->breadcrumb->append_crumb("Input Pertanyaan Polling", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['pertanyaan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('polling/bg_input');
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
			$this->breadcrumb->append_crumb("Jenjang Pendidikan", base_url().'superadmin/polling');
			$this->breadcrumb->append_crumb("Update Jenjang Pendidikan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_super_pertanyaan_poll'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_pertanyaan_poll",$where)->row();
			
			$d['pertanyaan'] = $get->pertanyaan;
			
			$d['id_param'] = $get->id_super_pertanyaan_poll;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('polling/bg_input');
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
			$id['id_super_pertanyaan_poll'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['pertanyaan'] = $this->input->post("pertanyaan");
				$in['aktif'] = 0;
				
				$this->db->insert("dlmbg_super_pertanyaan_poll",$in);
			}
			else if($tipe=="edit")
			{
				$in['pertanyaan'] = $this->input->post("pertanyaan");
				
				$this->db->update("dlmbg_super_pertanyaan_poll",$in,$id);
			}
			
			redirect("superadmin/polling");
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
			$sess['by_pertanyaan'] = $this->input->post("by_pertanyaan");
			$this->session->set_userdata($sess);
			redirect("superadmin/polling");
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
			$where['id_super_pertanyaan_poll'] = $id_param;
			$this->db->delete("dlmbg_super_pertanyaan_poll",$where);
			$where2['id_pertanyaan'] = $id_param;
			$this->db->delete("dlmbg_super_jawaban_poll",$where2);
			redirect("superadmin/polling");
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
			$id['id_super_pertanyaan_poll'] = $id_param;
			$up['aktif'] = $value;
			$this->db->update("dlmbg_super_pertanyaan_poll",$up,$id);
			redirect("superadmin/polling");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
