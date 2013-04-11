<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_pengawas extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("User Pengawas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_user_pengawas'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_user_pengawas($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('user_pengawas/bg_home');
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
			$this->breadcrumb->append_crumb("User Pengawas", base_url().'superadmin/user_pengawas');
			$this->breadcrumb->append_crumb("Input User Pengawas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['unit_kerja'] = $this->db->get("dlmbg_super_unit_kerja");
			
			$d['nama_user_pengawas'] = "";
			$d['username_user_pengawas'] = "";
			$d['id_unit_kerja'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('user_pengawas/bg_input');
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
			$this->breadcrumb->append_crumb("User Pengawas", base_url().'superadmin/user_pengawas');
			$this->breadcrumb->append_crumb("Update User Pengawas", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['unit_kerja'] = $this->db->get("dlmbg_super_unit_kerja");
			
			$where['id_user_pengawas'] = $id_param;
			$get = $this->db->get_where("dlmbg_user_pengawas",$where)->row();
			
			$d['nama_user_pengawas'] = $get->nama_user_pengawas;
			$d['username_user_pengawas'] = $get->username_user_pengawas;
			$d['id_unit_kerja'] = $get->id_unit_kerja;
			
			$d['id_param'] = $get->id_user_pengawas;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('user_pengawas/bg_input');
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
			$id['id_user_pengawas'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("dlmbg_user_pengawas",array("username_user_pengawas"=>$this->input->post("username_user_pengawas")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("superadmin/user_pengawas/tambah");
				}
				else
				{
					$in['nama_user_pengawas'] = $this->input->post("nama_user_pengawas");
					$in['username_user_pengawas'] = $this->input->post("username_user_pengawas");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					$in['id_unit_kerja'] = $this->input->post("id_unit_kerja");
					
					$this->db->insert("dlmbg_user_pengawas",$in);
					redirect("superadmin/user_pengawas");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_user_pengawas",array("username_user_pengawas"=>$this->input->post("username_user_pengawas")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_user_pengawas"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/user_pengawas/edit/".$id['id_user_pengawas']."");
					}
					else
					{
						$in['nama_user_pengawas'] = $this->input->post("nama_user_pengawas");
						$in['username_user_pengawas'] = $this->input->post("username_user_pengawas");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
						$in['id_unit_kerja'] = $this->input->post("id_unit_kerja");
					
						$this->db->update("dlmbg_user_pengawas",$in,$id);
						redirect("superadmin/user_pengawas");
					}
				}
				else
				{
					$cek = $this->db->get_where("dlmbg_user_pengawas",array("username_user_pengawas"=>$this->input->post("username_user_pengawas")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_user_pengawas"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/user_pengawas/edit/".$id['id_user_pengawas']."");
					}
					else
					{
						$in['nama_user_pengawas'] = $this->input->post("nama_user_pengawas");
						$in['username_user_pengawas'] = $this->input->post("username_user_pengawas");
						$in['id_unit_kerja'] = $this->input->post("id_unit_kerja");
					
						$this->db->update("dlmbg_user_pengawas",$in,$id);
						redirect("superadmin/user_pengawas");
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
			$sess['nama_user_pengawas'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/user_pengawas");
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
			$where['id_user_pengawas'] = $id_param;
			$this->db->delete("dlmbg_user_pengawas",$where);
			redirect("superadmin/user_pengawas");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
