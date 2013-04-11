<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		$tipe 				= $data['tipe'];
		
		if($tipe=="operator")
		{
			$cek['username'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_sekolah', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_operator;
					$sess_data['id_sekolah'] = $qad->id_sekolah;
					$sess_data['username'] = $qad->username;
					$sess_data['email'] = $qad->email;
					$sess_data['id_admin_sekolah'] = $qad->id_admin_sekolah;
					$sess_data['tipe_user'] = $tipe;
					$get_p_sekolah = $this->db->get_where("dlmbg_sekolah_profil",array("id_sekolah_profil"=>$qad->id_sekolah))->row();
					$sess_data['id_jenjang_pendidikan'] = $get_p_sekolah->id_jenjang_pendidikan;
					$sess_data['id_kecamatan'] = $get_p_sekolah->id_kecamatan;
					$sess_data['nama_sekolah'] = $get_p_sekolah->nama_sekolah;
					$this->session->set_userdata($sess_data);
				}
				redirect("operator/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}
		
		else if($tipe=="uptd")
		{
			$cek['username'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_uptd', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_operator;
					$sess_data['id_kecamatan'] = $qad->id_kecamatan;
					$sess_data['username'] = $qad->username;
					$sess_data['id_admin_uptd'] = $qad->id_admin_uptd;
					$sess_data['tipe_user'] = $tipe;
					$get_p_kecamatan = $this->db->get_where("dlmbg_super_kecamatan",array("id_super_kecamatan"=>$qad->id_kecamatan))->row();
					$sess_data['kecamatan'] = $get_p_kecamatan->kecamatan;
					$this->session->set_userdata($sess_data);
				}
				redirect("uptd/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}
		
		else if($tipe=="pengawas")
		{
			$cek['username_user_pengawas'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_user_pengawas', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_user_pengawas;
					$sess_data['id_unit_kerja'] = $qad->id_unit_kerja;
					$sess_data['username'] = $qad->username_user_pengawas;
					$sess_data['id_user_pengawas'] = $qad->id_user_pengawas;
					$sess_data['tipe_user'] = $tipe;
					$get_p_kecamatan = $this->db->get_where("dlmbg_super_unit_kerja",array("id_super_unit_kerja"=>$qad->id_unit_kerja))->row();
					$sess_data['unit_kerja'] = $get_p_kecamatan->unit_kerja;
					$this->session->set_userdata($sess_data);
				}
				redirect("pengawas/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}
		
		else if($tipe=="admin_dinas")
		{
			$cek['username_admin_dinas'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_dinas', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_admin_dinas;
					$sess_data['id_bidang'] = $qad->id_bidang;
					$sess_data['username'] = $qad->username_admin_dinas;
					$sess_data['id_admin_dinas'] = $qad->id_admin_dinas;
					$sess_data['tipe_user'] = $tipe;
					
					$get_p_bidang = $this->db->get_where("dlmbg_super_bidang",array("id_super_bidang"=>$qad->id_bidang))->row();
					$sess_data['bidang'] = $get_p_bidang->bidang;
					$this->session->set_userdata($sess_data);
				}
				redirect("admin_dinas/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}
		
		else if($tipe=="superadmin")
		{
			$cek['username_super_admin'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_super', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_super_admin;
					$sess_data['username'] = $qad->username_super_admin;
					$sess_data['id_admin_super'] = $qad->id_admin_super;
					$sess_data['tipe_user'] = $tipe;
					
					$this->session->set_userdata($sess_data);
				}
				redirect("superadmin");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */