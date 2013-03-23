<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jawaban_polling extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($id_question,$uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Polling", base_url().'superadmin/polling');
			$this->breadcrumb->append_crumb("Jawaban Polling", base_url().'superadmin/jawaban_polling/index/'.$id_question.'');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['id_pertanyaan'] = $id_question;
			
			$filter['jawaban'] = $this->session->userdata("by_jawaban");
			
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_jawaban_polling($id_question,$this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('jawaban_polling/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah($id_question)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Polling", base_url().'superadmin/polling');
			$this->breadcrumb->append_crumb("Jawaban Polling", base_url().'superadmin/jawaban_polling/index/'.$id_question.'');
			$this->breadcrumb->append_crumb("Input Jawaban Polling", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['jawaban'] = "";
			$d['jum'] = "";
			$d['id_pertanyaan'] = $id_question;
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('jawaban_polling/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_question,$id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Polling", base_url().'superadmin/polling');
			$this->breadcrumb->append_crumb("Jawaban Polling", base_url().'superadmin/jawaban_polling/index/'.$id_question.'');
			$this->breadcrumb->append_crumb("Update Jawaban Polling", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_super_jawaban_poll'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_jawaban_poll",$where)->row();
			
			$d['id_pertanyaan'] = $get->id_pertanyaan;
			$d['jawaban'] = $get->jawaban;
			$d['jum'] = $get->jum;
			
			$d['id_param'] = $get->id_super_jawaban_poll;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('jawaban_polling/bg_input');
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
			$id['id_super_jawaban_poll'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_pertanyaan'] = $this->input->post("id_pertanyaan");
				$in['jawaban'] = $this->input->post("jawaban");
				$in['jum'] = $this->input->post("jum");
				
				$this->db->insert("dlmbg_super_jawaban_poll",$in);
			}
			else if($tipe=="edit")
			{
				$in['id_pertanyaan'] = $this->input->post("id_pertanyaan");
				$in['jawaban'] = $this->input->post("jawaban");
				$in['jum'] = $this->input->post("jum");
				
				$this->db->update("dlmbg_super_jawaban_poll",$in,$id);
			}
			
			redirect("superadmin/jawaban_polling/index/".$this->input->post("id_pertanyaan")."");
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
			$sess['by_jawaban'] = $this->input->post("by_jawaban");
			$this->session->set_userdata($sess);
			redirect("superadmin/jawaban_polling/index/".$this->input->post("id_pertanyaan")."");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_question,$id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$where['id_super_jawaban_poll'] = $id_param;
			$this->db->delete("dlmbg_super_jawaban_poll",$where);
			redirect("superadmin/jawaban_polling/index/".$id_question."");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
