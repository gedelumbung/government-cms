<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class foto_galeri_kegiatan extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($id_album,$uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Album Galeri Kegiatan", base_url().'superadmin/galeri_kegiatan');
			$this->breadcrumb->append_crumb("Galeri Kegiatan", base_url().'superadmin/foto_galeri_kegiatan/index/'.$id_album.'');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_foto_galeri_kegiatan($id_album,$this->config->item("limit_item"),$uri);
			
			$this->load->view('bg_header',$d);
			$this->load->view('foto_galeri_kegiatan/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah($id_album)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Album Galeri Kegiatan", base_url().'superadmin/galeri_kegiatan');
			$this->breadcrumb->append_crumb("Galeri Kegiatan", base_url().'superadmin/foto_galeri_kegiatan/index/'.$id_album.'');
			$this->breadcrumb->append_crumb("Input Galeri Kegiatan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['id_user'] = "";
			$d['id_album'] = $id_album;
			$d['judul'] = "";
			$d['gambar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('foto_galeri_kegiatan/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_album,$id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Album Galeri Kegiatan", base_url().'superadmin/galeri_kegiatan');
			$this->breadcrumb->append_crumb("Galeri Kegiatan", base_url().'superadmin/foto_galeri_kegiatan/index/'.$id_album.'');
			$this->breadcrumb->append_crumb("Update Galeri Kegiatan", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_super_galeri_dinas'] = $id_param;
			$get = $this->db->get_where("dlmbg_super_galeri_dinas",$where)->row();
			
			$d['id_album'] = $get->id_album;
			$d['gambar'] = $get->gambar;
			$d['judul'] = $get->judul;
			$d['id_user'] = $get->id_user;
			
			$d['id_param'] = $get->id_super_galeri_dinas;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('foto_galeri_kegiatan/bg_input');
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
			$id['id_super_galeri_dinas'] = $this->input->post("id_param");
			$id['id_album'] = $this->input->post("id_album");

			if($tipe=="tambah")
			{
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->tambah($id['id_album']);
				}
				else
				{
					$config['upload_path'] = './asset/images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/galeri/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/galeri/thumb/" ;
						$destination_medium	= "./asset/images/galeri/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 200 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['judul'] = $this->input->post("judul");
						$in_data['id_album'] = $this->input->post("id_album");
						$in_data['id_user'] = $this->session->userdata("id_admin_super");
						$this->db->insert("dlmbg_super_galeri_dinas",$in_data);
				
						unlink($source);
						
						redirect("superadmin/foto_galeri_kegiatan/index/".$this->input->post("id_album")."");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$in_data['judul'] = $this->input->post("judul");
					$in_data['id_album'] = $this->input->post("id_album");
					$in_data['id_user'] = $this->session->userdata("id_admin_super");
					$this->db->update("dlmbg_super_galeri_dinas",$in_data,$id);
					redirect("superadmin/foto_galeri_kegiatan/index/".$this->input->post("id_album")."");
				}
				else
				{
					$config['upload_path'] = './asset/images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/galeri/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/galeri/thumb/" ;
						$destination_medium	= "./asset/images/galeri/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 200 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['judul'] = $this->input->post("judul");
						$in_data['id_album'] = $this->input->post("id_album");
						$in_data['id_user'] = $this->session->userdata("id_admin_super");
						$this->db->update("dlmbg_super_galeri_dinas",$in_data,$id);
				
						$old_thumb	= "./asset/images/galeri/thumb/".$this->input->post("gambar")."" ;
						$old_medium	= "./asset/images/galeri/medium/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						unlink($old_medium);
						
						redirect("superadmin/foto_galeri_kegiatan/index/".$this->input->post("id_album")."");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
	public function hapus($id_album,$id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$path = "./asset/images/galeri/medium/".$file."";
			$path_thumb = "./asset/images/galeri/thumb/".$file."";
			unlink($path);
			unlink($path_thumb);

			$where['id_super_galeri_dinas'] = $id_param;
			$where['id_album'] = $id_album;
			$this->db->delete("dlmbg_super_galeri_dinas",$where);
			redirect("superadmin/foto_galeri_kegiatan/index/".$id_album."");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
