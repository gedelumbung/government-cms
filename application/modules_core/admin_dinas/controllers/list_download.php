<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class list_download extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dinas/dashboard');
			$this->breadcrumb->append_crumb("List Download", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$filter['judul_file'] = $this->session->userdata("by_judul");
			$d['dt_list_download'] = $this->app_global_admin_dinas_model->generate_index_list_download($this->config->item("limit_item_medium"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_dinas/list_download/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dinas/dashboard');
			$this->breadcrumb->append_crumb("List Download", base_url().'admin_dinas/list_download');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$d['judul_file'] = "";
			$d['nama_file'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_dinas/list_download/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_dinas/dashboard');
			$this->breadcrumb->append_crumb("List Download", base_url().'admin_dinas/list_download');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$where['id_dinas_download'] = $id_param;
			$where['id_bidang'] = $this->session->userdata("id_bidang");
			$get = $this->db->get_where("dlmbg_dinas_download",$where)->row();
			
			$d['judul_file'] = $get->judul_file;
			$d['nama_file'] = $get->nama_file;
			
			$d['id_param'] = $get->id_dinas_download;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_dinas/list_download/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$tipe = $this->input->post("tipe");
			$id['id_dinas_download'] = $this->input->post("id_param");
			$id['id_bidang'] = $this->session->userdata("id_bidang");
			
			if($tipe=="tambah")
			{
				$this->form_validation->set_rules('judul_file', 'Judul File', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->tambah();
				}
				else
				{
					$config['upload_path'] = './asset/file/';
					$allowed_types = 'pdf|zip';
					$config['allowed_types'] = substr($allowed_types, strpos($allowed_types, substr($_FILES['userfile']['name'], -3)), 3);
					$config['max_size']	= '10000';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;		
					$this->load->library('upload', $config);
			 
					$this->load->library('upload', $config);
			 
					if ( ! $this->upload->do_upload())
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
					else
					{
		            	$upload_data = $this->upload->data();
						
						$in['judul_file'] = $this->input->post("judul_file");
						$in['nama_file'] = $upload_data['file_name'];
						$in['id_admin_dinas'] = $this->session->userdata("id_admin_dinas");
						$in['id_bidang'] = $this->session->userdata("id_bidang");
						$in['stts'] = "0";
						
						$this->db->insert("dlmbg_dinas_download",$in);
						redirect("admin_dinas/list_download");
					}
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$up['judul_file'] = $this->input->post("judul_file");
					$this->db->update("dlmbg_dinas_download",$up,$id);
					redirect("admin_dinas/list_download");
				}
				else
				{
					$config['upload_path'] = './asset/file/';
					$allowed_types = 'pdf|zip';
					$config['allowed_types'] = substr($allowed_types, strpos($allowed_types, substr($_FILES['userfile']['name'], -3)), 3);
					$config['max_size']	= '10000';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;		
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload())
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
					else
					{
						$path = "./asset/file/".$this->input->post('nama_file')."";
						if (file_exists($path))
						{
							unlink($path);
						}
						$upload_data = $this->upload->data();
						
						$in['judul_file'] = $this->input->post("judul_file");
						$in['nama_file'] = $upload_data['file_name'];
						$in['id_admin_dinas'] = $this->session->userdata("id_admin_dinas");
						$in['id_bidang'] = $this->session->userdata("id_bidang");
						
						$this->db->update("dlmbg_dinas_download",$in,$id);
						redirect("admin_dinas/list_download");
					}
				}
			}
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$sess['by_judul'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("admin_dinas/list_download");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_dinas")
		{
			$path = "./asset/file/".$file."";
			if (file_exists($path))
			{
				unlink($path);
			}
			$where['id_dinas_download'] = $id_param;
			$where['id_bidang'] = $this->session->userdata("id_bidang");
			$this->db->delete("dlmbg_dinas_download",$where);
			redirect("admin_dinas/list_download");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
