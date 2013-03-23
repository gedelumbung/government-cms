<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sistem extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Sistem", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_sistem($this->config->item("limit_item"),$uri);
			
			$this->load->view('bg_header',$d);
			$this->load->view('sistem/bg_home');
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
			$this->breadcrumb->append_crumb("Sistem", base_url().'superadmin/sistem');
			$this->breadcrumb->append_crumb("Edit", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_agenda'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_setting'] = $id_param;
			$get = $this->db->get_where("dlmbg_setting",$where)->row();
			
			$d['tipe'] = $get->tipe;
			$d['title'] = $get->title;
			$d['content_setting'] = $get->content_setting;
			
			$d['id_param'] = $get->id_setting;
			
			$this->load->view('bg_header',$d);
			$this->load->view('sistem/bg_input');
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
			$id['id_setting'] = $this->input->post("id_param");
			
			if($tipe=="site_kepala_dinas")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$in['tipe'] = $this->input->post("tipe");
					$in['title'] = $this->input->post("title");
					
					$this->db->update("dlmbg_setting",$in,$id);
					redirect("superadmin/sistem");
				}
				else
				{
					$config['upload_path'] = './asset/images/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '800';
					$config['max_width']  	= '800';
					$config['max_height']  	= '800';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/temp/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_thumb    = 640 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
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
						
						
						$in_data['tipe'] = $this->input->post("tipe");
						$in_data['title'] = $this->input->post("title");
						$in_data['content_setting'] = $data['file_name'];
						$this->db->update("dlmbg_setting",$in_data,$id);
				
						$old_thumb	= "./asset/images/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						
						redirect("superadmin/sistem");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			else
			{
				$in['tipe'] = $this->input->post("tipe");
				$in['title'] = $this->input->post("title");
				$in['content_setting'] = $this->input->post("content_setting");
				
				$this->db->update("dlmbg_setting",$in,$id);
				
				redirect("superadmin/sistem");
			}
		}
		else
		{
			redirect("auth/user_login");
		}
   }
}
 
/* End of file superadmin.php */
