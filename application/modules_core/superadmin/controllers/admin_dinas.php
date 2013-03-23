<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_dinas extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Admin Dinas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_admin_dinas'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_admin_dinas($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_dinas/bg_home');
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
			$this->breadcrumb->append_crumb("Admin Dinas", base_url().'superadmin/admin_dinas');
			$this->breadcrumb->append_crumb("Input Admin Dinas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['bidang'] = $this->db->get("dlmbg_super_bidang");
			
			$d['nama_admin_dinas'] = "";
			$d['username_admin_dinas'] = "";
			$d['id_bidang'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_dinas/bg_input');
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
			$this->breadcrumb->append_crumb("Admin Dinas", base_url().'superadmin/admin_dinas');
			$this->breadcrumb->append_crumb("Update Admin Dinas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['bidang'] = $this->db->get("dlmbg_super_bidang");
			
			$where['id_admin_dinas'] = $id_param;
			$get = $this->db->get_where("dlmbg_admin_dinas",$where)->row();
			
			$d['nama_admin_dinas'] = $get->nama_admin_dinas;
			$d['username_admin_dinas'] = $get->username_admin_dinas;
			$d['id_bidang'] = $get->id_bidang;
			
			$d['id_param'] = $get->id_admin_dinas;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_dinas/bg_input');
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
			$id['id_admin_dinas'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("dlmbg_admin_dinas",array("username_admin_dinas"=>$this->input->post("username_admin_dinas")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("superadmin/admin_dinas/tambah");
				}
				else
				{
					$in['nama_admin_dinas'] = $this->input->post("nama_admin_dinas");
					$in['username_admin_dinas'] = $this->input->post("username_admin_dinas");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					$in['id_bidang'] = $this->input->post("id_bidang");
					
					$this->db->insert("dlmbg_admin_dinas",$in);
					redirect("superadmin/admin_dinas");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_admin_dinas",array("username_admin_dinas"=>$this->input->post("username_admin_dinas")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_admin_dinas"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/admin_dinas/edit/".$id['id_admin_dinas']."");
					}
					else
					{
						$in['nama_admin_dinas'] = $this->input->post("nama_admin_dinas");
						$in['username_admin_dinas'] = $this->input->post("username_admin_dinas");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
						$in['id_bidang'] = $this->input->post("id_bidang");
					
						$this->db->update("dlmbg_admin_dinas",$in,$id);
						redirect("superadmin/admin_dinas");
					}
				}
				else
				{
					$cek = $this->db->get_where("dlmbg_admin_dinas",array("username_admin_dinas"=>$this->input->post("username_admin_dinas")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_admin_dinas"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/admin_dinas/edit/".$id['id_admin_dinas']."");
					}
					else
					{
						$in['nama_admin_dinas'] = $this->input->post("nama_admin_dinas");
						$in['username_admin_dinas'] = $this->input->post("username_admin_dinas");
						$in['id_bidang'] = $this->input->post("id_bidang");
					
						$this->db->update("dlmbg_admin_dinas",$in,$id);
						redirect("superadmin/admin_dinas");
					}
				}
			}
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
			$sess['nama_admin_dinas'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/admin_dinas");
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
			$where['id_admin_dinas'] = $id_param;
			$this->db->delete("dlmbg_admin_dinas",$where);
			redirect("superadmin/admin_dinas");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
