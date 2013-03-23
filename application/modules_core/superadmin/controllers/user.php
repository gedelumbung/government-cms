<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Manajemen User", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_super_admin'] = $this->session->userdata("nama_super_admin");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_user($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('user/bg_home');
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
			$this->breadcrumb->append_crumb("Manajemen User", base_url().'superadmin/user');
			$this->breadcrumb->append_crumb("Input User", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['bidang'] = $this->db->get("dlmbg_super_bidang");
			
			$d['nama_super_admin'] = "";
			$d['username_super_admin'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('user/bg_input');
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
			$this->breadcrumb->append_crumb("Manajemen User", base_url().'superadmin/user');
			$this->breadcrumb->append_crumb("Update User", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_admin_super'] = $id_param;
			$get = $this->db->get_where("dlmbg_admin_super",$where)->row();
			
			$d['nama_super_admin'] = $get->nama_super_admin;
			$d['username_super_admin'] = $get->username_super_admin;
			
			$d['id_param'] = $get->id_admin_super;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('user/bg_input');
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
			$id['id_admin_super'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("dlmbg_admin_super",array("username_super_admin"=>$this->input->post("username_super_admin")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("superadmin/user/tambah");
				}
				else
				{
					$in['nama_super_admin'] = $this->input->post("nama_super_admin");
					$in['username_super_admin'] = $this->input->post("username_super_admin");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					
					$this->db->insert("dlmbg_admin_super",$in);
					redirect("superadmin/user");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_admin_super",array("username_super_admin"=>$this->input->post("username_super_admin")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_super_admin"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/user/edit/".$id['id_admin_super']."");
					}
					else
					{
						$in['nama_super_admin'] = $this->input->post("nama_super_admin");
						$in['username_super_admin'] = $this->input->post("username_super_admin");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					
						$this->db->update("dlmbg_admin_super",$in,$id);
						redirect("superadmin/user");
					}
				}
				else
				{
					$cek = $this->db->get_where("dlmbg_admin_super",array("username_super_admin"=>$this->input->post("username_super_admin")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_super_admin"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/user/edit/".$id['id_user']."");
					}
					else
					{
						$in['nama_super_admin'] = $this->input->post("nama_super_admin");
						$in['username_super_admin'] = $this->input->post("username_super_admin");
					
						$this->db->update("dlmbg_admin_super",$in,$id);
						redirect("superadmin/user");
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
			$sess['nama_super_admin'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/user");
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
			$where['id_admin_super'] = $id_param;
			$this->db->delete("dlmbg_admin_super",$where);
			redirect("superadmin/user");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
