<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Profil User", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_admin_super'] = $this->session->userdata("id_admin_super");
			$get = $this->db->get_where("dlmbg_admin_super",$where)->row();
			
			$d['nama_super_admin'] = $get->nama_super_admin;
			$d['username_super_admin'] = $get->username_super_admin;
			
			$d['id_param'] = $get->id_admin_super;
			
			$this->load->view('bg_header',$d);
			$this->load->view('profil/bg_home');
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
			$id['id_admin_super'] = $this->input->post("id_param");
			
			$cek = $this->db->get_where("dlmbg_admin_super",array("username_super_admin"=>$this->input->post("username_super_admin")))->num_rows();
			if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_super_admin"))
			{
				$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
				redirect("superadmin/profil");
			}
			else
			{
				$in['nama_super_admin'] = $this->input->post("nama_super_admin");
				$in['username_super_admin'] = $this->input->post("username_super_admin");
				
				$sess_data['nama_user_login'] = $in['nama_super_admin'];
				$sess_data['username'] = $in['username_super_admin'];
				$this->session->set_userdata($sess_data);
				
				$this->db->update("dlmbg_admin_super",$in,$id);
				redirect("superadmin/profil");
			}
	}
		else
		{
			redirect("auth/user_login");
		}
   }
}
 
/* End of file superadmin.php */
