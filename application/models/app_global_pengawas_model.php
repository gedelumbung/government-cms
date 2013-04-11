<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_pengawas_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_pengumuman($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.id_pengawas_pengumuman, b.unit_kerja, 
		a.stts from dlmbg_pengawas_pengumuman a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja where 
		a.id_unit_kerja='".$this->session->userdata("id_unit_kerja")."' ".$query_add."");
		$config['base_url'] = base_url() . 'pengawas/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.id_pengawas_pengumuman, b.unit_kerja, 
		a.stts from dlmbg_pengawas_pengumuman a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja where 
		a.id_unit_kerja='".$this->session->userdata("id_unit_kerja")."' ".$query_add." order by a.judul ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul</td>
					<td>Tanggal</td>
					<td>Unit Kerja</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."pengawas/pengumuman/tambah'>Tambah</a></td>
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
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."pengawas/pengumuman/edit/".$h->id_pengawas_pengumuman."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."pengawas/pengumuman/hapus/".$h->id_pengawas_pengumuman."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_agenda($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.id_pengawas_agenda, b.unit_kerja, a.tanggal,   
		a.stts from dlmbg_pengawas_agenda a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja where 
		a.id_unit_kerja='".$this->session->userdata("id_unit_kerja")."' ".$query_add."");
		$config['base_url'] = base_url() . 'pengawas/agenda/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.id_pengawas_agenda, b.unit_kerja, a.tanggal,   
		a.stts from dlmbg_pengawas_agenda a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja where 
		a.id_unit_kerja='".$this->session->userdata("id_unit_kerja")."' ".$query_add." order by a.judul ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul</td>
					<td>Tanggal</td>
					<td>Unit Kerja</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."pengawas/agenda/tambah'>Tambah</a></td>
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
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."pengawas/agenda/edit/".$h->id_pengawas_agenda."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."pengawas/agenda/hapus/".$h->id_pengawas_agenda."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_list_download($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['judul_file']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['judul_file'] = $filter['judul_file']; 
				$query_add = "and a.judul_file like '%".$where['judul_file']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul_file, a.id_dinas_download, b.bidang, a.nama_file,   
		a.stts from dlmbg_dinas_download a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang where 
		a.id_bidang='".$this->session->userdata("id_bidang")."' ".$query_add."");
		$config['base_url'] = base_url() . 'admin_dinas/list_download/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul_file, a.id_dinas_download, b.bidang, a.nama_file,   
		a.stts from dlmbg_dinas_download a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang where 
		a.id_bidang='".$this->session->userdata("id_bidang")."' ".$query_add." order by a.judul_file ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul File</td>
					<td>Nama File</td>
					<td>Bidang</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."admin_dinas/list_download/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Moderation";
			$color="#EBF8A4";
			if($h->stts==1){$st="Approve"; $color="";}
			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td>".$h->judul_file."</td>
					<td>".$h->nama_file."</td>
					<td>".$h->bidang."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."admin_dinas/list_download/edit/".$h->id_dinas_download."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."admin_dinas/list_download/hapus/".$h->id_dinas_download."/".$h->nama_file."' 
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

		$tot_hal = $this->db->query("select a.nama, a.nisn, a.id_sekolah_siswa, a.kelas, b.nama_sekolah, c.pendidikan, d.kecamatan from 
		dlmbg_sekolah_siswa a left join dlmbg_sekolah_profil b on a.id_sekolah=b.id_sekolah_profil left join dlmbg_super_jenjang_pendidikan c 
		on a.id_jenjang_pendidikan=c.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan d on a.id_kecamatan=d.id_super_kecamatan where 
		a.id_sekolah='".$this->session->userdata("id_sekolah")."' ".$query_add."");
		$config['base_url'] = base_url() . 'admin_dinas/data_siswa/index/';
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
		a.id_sekolah='".$this->session->userdata("id_sekolah")."' ".$query_add." order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>NISN</td>
					<td>Nama Peserta Didik</td>
					<td>Kelas</td>
					<td>Nama Sekolah</td>
					<td>Kecamatan Sekolah</td>
					<td>Jenjang Pendidikan</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."admin_dinas/data_siswa/tambah'>Tambah</a></td>
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
					<td bgcolor='000'><a href='".base_url()."admin_dinas/data_siswa/edit/".$h->id_sekolah_siswa."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."admin_dinas/data_siswa/hapus/".$h->id_sekolah_siswa."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita_pengawas($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.id_pengawas_berita, a.gambar, a.tanggal, b.unit_kerja, a.stts from dlmbg_pengawas_berita a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja where a.id_unit_kerja='".$this->session->userdata("id_unit_kerja")."' ".$query_add."");

		$config['base_url'] = base_url() . 'pengawas/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.id_pengawas_berita, a.gambar, a.tanggal, b.unit_kerja, a.stts from dlmbg_pengawas_berita a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja where a.id_unit_kerja='".$this->session->userdata("id_unit_kerja")."' ".$query_add." order by a.judul ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul</td>
					<td>Tanggal</td>
					<td>Unit Kerja</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."pengawas/berita/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Moderation";
			$color="#EBF8A4";
			$headline="No";
			if($h->stts==1){$st="Approve"; $color="";}

			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."pengawas/berita/edit/".$h->id_pengawas_berita."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."pengawas/berita/hapus/".$h->id_pengawas_berita."/".$h->gambar."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_artikel($limit,$offset,$filter=array())
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
				$query_add = "where a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.tanggal, a.gambar, b.unit_kerja, a.id_pengawas_artikel, a.stts from dlmbg_pengawas_artikel a left join 
		dlmbg_super_unit_kerja b on a.id_super_unit_kerja=b.id_super_unit_kerja ".$query_add."");

		$config['base_url'] = base_url() . 'pengawas/artikel/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.gambar, b.unit_kerja, a.id_pengawas_artikel, a.stts from dlmbg_pengawas_artikel a left join 
		dlmbg_super_unit_kerja b on a.id_super_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.judul ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul</td>
					<td>Tanggal</td>
					<td>Unit Kerja</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."pengawas/artikel/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Approve";
			$up="1";
			$color="#EBF8A4";
			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->unit_kerja."</td>
					<td bgcolor='000'><a href='".base_url()."pengawas/artikel/edit/".$h->id_pengawas_artikel."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."pengawas/artikel/hapus/".$h->id_pengawas_artikel."/".$h->gambar."' 
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