<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_uptd_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	public function generate_captcha()
	{
		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'font_path' => './system/fonts/impact.ttf',
			'img_width' => '150',
			'img_height' => 40
			);
		$cap = create_captcha($vals);
		$datamasuk = array(
			'captcha_time' => $cap['time'],
			//'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);
		$expiration = time()-3600;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$query = $this->db->insert_string('captcha', $datamasuk);
		$this->db->query($query);
		return $cap['image'];
	}
	 
	public function generate_index_pegawai($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama'] = $filter['nama']; 
				$query_add = "and a.nama like '%".$where['nama']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama, a.id_uptd_pegawai, a.jk, a.status_pns, a.golongan, a.tugas, b.kecamatan,
		a.tempat_lahir, a.tanggal_lahir, a.tanggal_bertugas from dlmbg_uptd_pegawai a left join dlmbg_super_kecamatan b on 
		a.id_kecamatan=b.id_super_kecamatan where a.id_kecamatan='".$this->session->userdata("id_kecamatan")."' ".$query_add."");
		
		$config['base_url'] = base_url() . 'uptd/data_pegawai/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.id_uptd_pegawai, a.jk, a.status_pns, a.golongan, a.tugas, b.kecamatan,
		a.tempat_lahir, a.tanggal_lahir, a.tanggal_bertugas from dlmbg_uptd_pegawai a left join dlmbg_super_kecamatan b on 
		a.id_kecamatan=b.id_super_kecamatan where a.id_kecamatan='".$this->session->userdata("id_kecamatan")."' ".$query_add." order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Nama</td>
					<td>Jenis Kelamin</td>
					<td>Status PNS</td>
					<td>Golongan</td>
					<td>Tugas Sebagai</td>
					<td>Tempat Tugas</td>
					<td>Tempat Lahir</td>
					<td>Usia</td>
					<td>MK</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."uptd/data_pegawai/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->jk."</td>
					<td>".$h->status_pns."</td>
					<td>".$h->golongan."</td>
					<td>".$h->tugas."</td>
					<td>".$h->kecamatan."</td>
					<td>".$h->tempat_lahir."</td>
					<td>".selisih_tanggah($h->tanggal_lahir,date("m/d/Y"))."</td>
					<td>".selisih_tanggah($h->tanggal_bertugas,date("m/d/Y"))."</td>
					<td bgcolor='000'><a href='".base_url()."uptd/data_pegawai/edit/".$h->id_uptd_pegawai."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."uptd/data_pegawai/hapus/".$h->id_uptd_pegawai."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_siswa($limit,$offset,$filter=array())
	{
		$hasil="";

		$tot_hal = $this->db->query("select a.nama, a.nisn, a.id_sekolah_siswa, a.kelas, b.nama_sekolah, c.pendidikan, d.kecamatan from 
		dlmbg_sekolah_siswa a left join dlmbg_sekolah_profil b on a.id_sekolah=b.id_sekolah_profil left join dlmbg_super_jenjang_pendidikan c 
		on a.id_jenjang_pendidikan=c.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan d on a.id_kecamatan=d.id_super_kecamatan where 
		a.id_sekolah='".$this->session->userdata("by_id_sekolah")."' and a.id_jenjang_pendidikan='".$this->session->userdata("by_id_jenjang_pendidikan")."'");
		$config['base_url'] = base_url() . 'operator/data_siswa/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.nisn, a.id_sekolah_siswa, a.kelas, b.nama_sekolah, c.pendidikan, d.kecamatan from 
		dlmbg_sekolah_siswa a left join dlmbg_sekolah_profil b on a.id_sekolah=b.id_sekolah_profil left join dlmbg_super_jenjang_pendidikan c 
		on a.id_jenjang_pendidikan=c.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan d on a.id_kecamatan=d.id_super_kecamatan where 
		a.id_sekolah='".$this->session->userdata("by_id_sekolah")."' and a.id_jenjang_pendidikan='".$this->session->userdata("by_id_jenjang_pendidikan")."'
		 order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>NISN</td>
					<td>Nama Peserta Didik</td>
					<td>Kelas</td>
					<td>Nama Sekolah</td>
					<td>Kecamatan Sekolah</td>
					<td>Jenjang Pendidikan</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."uptd/data_siswa/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nisn."</td>
					<td>".$h->nama."</td>
					<td>".$h->kelas."</td>
					<td>".$h->nama_sekolah."</td>
					<td>".$h->kecamatan."</td>
					<td>".$h->pendidikan."</td>
					<td bgcolor='000'><a href='".base_url()."uptd/data_siswa/edit/".$h->id_sekolah_siswa."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."uptd/data_siswa/hapus/".$h->id_sekolah_siswa."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_galeri_uptd($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['judul']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['judul'] = $filter['judul']; 
				$query_add = "and a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.gambar, a.judul, b.kecamatan, a.id_uptd_galeri_uptd, a.stts from dlmbg_uptd_galeri_uptd a 
		left join dlmbg_super_kecamatan b on a.id_kecamatan=b.id_super_kecamatan where a.id_kecamatan='".$this->session->userdata("id_kecamatan")."' ".$query_add."");
		
		$config['base_url'] = base_url() . 'uptd/galeri_uptd/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.gambar, a.judul, b.kecamatan, a.id_uptd_galeri_uptd, a.stts from dlmbg_uptd_galeri_uptd a 
		left join dlmbg_super_kecamatan b on a.id_kecamatan=b.id_super_kecamatan where a.id_kecamatan='".$this->session->userdata("id_kecamatan")."' ".$query_add."
		 order by a.judul ASC LIMIT ".$offset.",".$limit."");
		
		foreach($w->result() as $h)
		{
			$color = '';
			if($h->stts==0)
			{
				$color = 'style="background-color:red;"';
			}
			$hasil .= '<div class="border-photo-gallery-index" '.$color.'><div class="hide-photo-gallery-index">
			<a href="'.base_url().'asset/images/galeri-uptd/medium/'.$h->gambar.'" rel="galeri" title="'.$h->judul.'">
			<img src="'.base_url().'asset/images/galeri-uptd/thumb/'.$h->gambar.'" title="'.$h->judul.'" /></a></div>
			<div class="cleaner_h10"></div>
			<a href="'.base_url().'uptd/galeri_uptd/edit/'.$h->id_uptd_galeri_uptd.'">Edit</a> | 
			<a href="'.base_url().'uptd/galeri_uptd/hapus/'.$h->id_uptd_galeri_uptd.'/'.$h->gambar.'" onClick=\'return confirm("Anda yakin?");\'>Hapus</a>
			</div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_artikel_uptd($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['judul']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['judul'] = $filter['judul']; 
				$query_add = "and a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.tanggal, a.gambar, b.kecamatan, a.id_uptd_artikel, a.stts from dlmbg_uptd_artikel a left join dlmbg_super_kecamatan b 
		on a.id_kecamatan=b.id_super_kecamatan where a.id_kecamatan='".$this->session->userdata("id_kecamatan")."' ".$query_add."");

		$config['base_url'] = base_url() . 'operator/artikel_uptd/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.gambar, b.kecamatan, a.id_uptd_artikel, a.stts from dlmbg_uptd_artikel a left join dlmbg_super_kecamatan b 
		on a.id_kecamatan=b.id_super_kecamatan where a.id_kecamatan='".$this->session->userdata("id_kecamatan")."' ".$query_add." order by a.judul ASC 
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul</td>
					<td>Tanggal</td>
					<td>Nama Kecamatan</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."uptd/artikel_uptd/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Moderation";
			$color="#EBF8A4";
			if($h->stts==1){$st="Approve"; $color="";}
			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->kecamatan."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."uptd/artikel_uptd/edit/".$h->id_uptd_artikel."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."uptd/artikel_uptd/hapus/".$h->id_uptd_artikel."/".$h->gambar."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	
	
}

/* End of file app_global_model.php */