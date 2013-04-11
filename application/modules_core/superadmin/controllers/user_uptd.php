<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_uptd extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("User UPTD", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_operator'] = $this->session->userdata("by_judul");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_user_uptd($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('user_uptd/bg_home');
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
			$this->breadcrumb->append_crumb("User UPTD", base_url().'superadmin/user_uptd');
			$this->breadcrumb->append_crumb("Input User UPTD", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['kecamatan'] = $this->db->get("dlmbg_super_kecamatan");
			
			$d['nama_operator'] = "";
			$d['username'] = "";
			$d['id_kecamatan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('user_uptd/bg_input');
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
			$this->breadcrumb->append_crumb("User UPTD", base_url().'superadmin/user_uptd');
			$this->breadcrumb->append_crumb("Update User UPTD", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['kecamatan'] = $this->db->get("dlmbg_super_kecamatan");
			
			$where['id_admin_uptd'] = $id_param;
			$get = $this->db->get_where("dlmbg_admin_uptd",$where)->row();
			
			$d['nama_operator'] = $get->nama_operator;
			$d['username'] = $get->username;
			$d['id_kecamatan'] = $get->id_kecamatan;
			
			$d['id_param'] = $get->id_admin_uptd;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('user_uptd/bg_input');
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
			$id['id_admin_uptd'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("dlmbg_admin_uptd",array("username"=>$this->input->post("username")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("superadmin/user_uptd/tambah");
				}
				else
				{
					$in['nama_operator'] = $this->input->post("nama_operator");
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					$in['id_kecamatan'] = $this->input->post("id_kecamatan");
					
					$this->db->insert("dlmbg_admin_uptd",$in);
					redirect("superadmin/user_uptd");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_admin_uptd",array("username"=>$this->input->post("username")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/user_uptd/edit/".$id['id_admin_uptd']."");
					}
					else
					{
						$in['nama_operator'] = $this->input->post("nama_operator");
						$in['username'] = $this->input->post("username");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
						$in['id_kecamatan'] = $this->input->post("id_kecamatan");
					
						$this->db->update("dlmbg_admin_uptd",$in,$id);
						redirect("superadmin/user_uptd");
					}
				}
				else
				{
					$cek = $this->db->get_where("dlmbg_admin_uptd",array("username"=>$this->input->post("username")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/user_uptd/edit/".$id['id_admin_uptd']."");
					}
					else
					{
						$in['nama_operator'] = $this->input->post("nama_operator");
						$in['username'] = $this->input->post("username");
						$in['id_kecamatan'] = $this->input->post("id_kecamatan");
					
						$this->db->update("dlmbg_admin_uptd",$in,$id);
						redirect("superadmin/user_uptd");
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
			$sess['by_judul'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("superadmin/user_uptd");
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
			$where['id_user_uptd'] = $id_param;
			$this->db->delete("dlmbg_user_uptd",$where);
			redirect("superadmin/user_uptd");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
