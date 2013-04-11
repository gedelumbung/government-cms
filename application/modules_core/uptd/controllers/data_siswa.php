<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_siswa extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'uptd/dashboard');
			$this->breadcrumb->append_crumb("Data Peserta Didik", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_pendidikan_dropdown'] = $this->db->get("dlmbg_super_jenjang_pendidikan");
			$d['dt_sekolah'] = $this->db->get_where("dlmbg_sekolah_profil", array("id_kecamatan"=>$this->session->userdata("id_kecamatan"),"id_jenjang_pendidikan"=>$this->session->userdata("by_id_jenjang_pendidikan")));
			$d['dt_data_siswa'] = $this->app_global_uptd_model->generate_index_siswa($this->config->item("limit_item_medium"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/uptd/data_siswa/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'uptd/dashboard');
			$this->breadcrumb->append_crumb("Data PTK/Guru", base_url().'uptd/data_guru');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$d['nama'] = "";
			$d['nisn'] = "";
			$d['kelas'] = "";
			$d['dt_pendidikan_dropdown'] = $this->db->get("dlmbg_super_jenjang_pendidikan");
			$d['dt_sekolah'] = $this->db->get_where("dlmbg_sekolah_profil", array("id_kecamatan"=>$this->session->userdata("id_kecamatan"),"id_jenjang_pendidikan"=>$this->session->userdata("by_id_jenjang_pendidikan")));
			$d['id_sekolah'] = $this->session->userdata("by_id_sekolah");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/uptd/data_siswa/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'uptd/dashboard');
			$this->breadcrumb->append_crumb("Data Peserta Didik", base_url().'uptd/data_siswa');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$where['id_sekolah_siswa'] = $id_param;
			$get = $this->db->get_where("dlmbg_sekolah_siswa",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['nisn'] = $get->nisn;
			$d['kelas'] = $get->kelas;
			$d['dt_pendidikan_dropdown'] = $this->db->get("dlmbg_super_jenjang_pendidikan");
			$d['dt_sekolah'] = $this->db->get_where("dlmbg_sekolah_profil", array("id_kecamatan"=>$this->session->userdata("id_kecamatan"),"id_jenjang_pendidikan"=>$this->session->userdata("by_id_jenjang_pendidikan")));
			
			$d['id_sekolah'] = $get->id_sekolah;
			
			$d['id_param'] = $get->id_sekolah_siswa;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/uptd/data_siswa/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$tipe = $this->input->post("tipe");
			$id['id_sekolah_siswa'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['nisn'] = $this->input->post("nisn");
				$in['kelas'] = $this->input->post("kelas");
				$in['id_sekolah'] = $this->input->post("id_sekolah");
				$in['id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
				$in['id_kecamatan'] = $this->session->userdata("id_kecamatan");
				
				$this->db->insert("dlmbg_sekolah_siswa",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['nisn'] = $this->input->post("nisn");
				$in['kelas'] = $this->input->post("kelas");
				$in['id_sekolah'] = $this->input->post("id_sekolah");
				$in['id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
				$in['id_kecamatan'] = $this->session->userdata("id_kecamatan");
				
				$this->db->update("dlmbg_sekolah_siswa",$in,$id);
			}
			
			redirect("uptd/data_siswa");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$sess['by_id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
			$sess['by_id_sekolah'] = $this->input->post("id_sekolah");
			$this->session->set_userdata($sess);
			redirect("uptd/data_siswa");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function combo_data_kelas()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$set_sess['by_id_jenjang_pendidikan'] = $_GET['id_jenjang_pendidikan'];
			$this->session->set_userdata($set_sess);
			
			$set['id_kecamatan'] = $this->session->userdata("id_kecamatan");
			$set['id_jenjang_pendidikan'] = $this->session->userdata("by_id_jenjang_pendidikan");
			
			$dt_sekolah = $this->db->get_where("dlmbg_sekolah_profil", $set);
			?>
			<select name="id_sekolah">
			<option value="">- Pilih Sekolah -</option>
				<?php foreach($dt_sekolah->result() as $dt_s)
				{
				?>
					<option value="<?php echo $dt_s->id_sekolah_profil; ?>"><?php echo $dt_s->nama_sekolah; ?></option>
				<?php 
				} 
				?>
			</select>
			<?php
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="uptd")
		{
			$where['id_sekolah_siswa'] = $id_param;
			$where['id_kecamatan'] = $this->session->userdata("id_kecamatan");
			$this->db->delete("dlmbg_sekolah_siswa",$where);
			redirect("uptd/data_siswa");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
