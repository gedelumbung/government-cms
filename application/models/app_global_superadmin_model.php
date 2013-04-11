<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_superadmin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_artikel_sekolah($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.tanggal, a.gambar, b.nama_sekolah, a.id_sekolah_artikel, a.stts from dlmbg_sekolah_artikel a left join dlmbg_sekolah_profil b 
		on a.id_sekolah_profil=b.id_sekolah_profil ".$query_add."");

		$config['base_url'] = base_url() . 'superadmin/artikel_sekolah/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.gambar, a.id_sekolah_artikel, b.nama_sekolah, a.stts from dlmbg_sekolah_artikel a left join dlmbg_sekolah_profil b 
		on a.id_sekolah_profil=b.id_sekolah_profil ".$query_add." order by a.stts ASC 
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Nama Sekolah</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->nama_sekolah."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/artikel_sekolah/approve/".$h->id_sekolah_artikel."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/artikel_sekolah/approve/".$h->id_sekolah_artikel."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/artikel_sekolah/hapus/".$h->id_sekolah_artikel."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_artikel_pengawas($limit,$offset,$filter=array())
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

		$config['base_url'] = base_url() . 'superadmin/artikel_pengawas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.gambar, b.unit_kerja, a.id_pengawas_artikel, a.stts from dlmbg_pengawas_artikel a left join dlmbg_super_unit_kerja b 
		on a.id_super_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.stts ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Unit Kerja</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/artikel_pengawas/approve/".$h->id_pengawas_artikel."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/artikel_pengawas/approve/".$h->id_pengawas_artikel."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/artikel_pengawas/hapus/".$h->id_pengawas_artikel."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
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
				$query_add = "where a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.tanggal, a.gambar, b.kecamatan, a.id_uptd_artikel, a.stts from dlmbg_uptd_artikel a left join dlmbg_super_kecamatan b 
		on a.id_kecamatan=b.id_super_kecamatan ".$query_add."");

		$config['base_url'] = base_url() . 'superadmin/artikel_uptd/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.gambar, b.kecamatan, a.id_uptd_artikel, a.stts from dlmbg_uptd_artikel a left join dlmbg_super_kecamatan b 
		on a.id_kecamatan=b.id_super_kecamatan ".$query_add." order by a.stts ASC 
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Kecamatan</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->kecamatan."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/artikel_uptd/approve/".$h->id_uptd_artikel."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/artikel_uptd/approve/".$h->id_uptd_artikel."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/artikel_uptd/hapus/".$h->id_uptd_artikel."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
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
				$query_add = "where a.judul_file like '%".$where['judul_file']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul_file, a.nama_file, a.id_dinas_download, b.bidang, c.nama_admin_dinas from dlmbg_dinas_download a 
		left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang left join dlmbg_admin_dinas c on a.id_admin_dinas=c.id_admin_dinas 
		".$query_add."");

		$config['base_url'] = base_url() . 'superadmin/list_download/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul_file, a.stts, a.nama_file, a.id_dinas_download, b.bidang, c.nama_admin_dinas from dlmbg_dinas_download a 
		left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang left join dlmbg_admin_dinas c on a.id_admin_dinas=c.id_admin_dinas 
		".$query_add." order by a.stts ASC limit ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul File</th>
					<th>Nama File</th>
					<th>Bidang</th>
					<th>Nama User</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul_file."</td>
					<td>".$h->nama_file."</td>
					<td>".$h->bidang."</td>
					<td>".$h->nama_admin_dinas."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/list_download/approve/".$h->id_dinas_download."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/list_download/approve/".$h->id_dinas_download."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/list_download/hapus/".$h->id_dinas_download."/".$h->nama_file."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_buku_tamu($limit,$offset,$filter=array())
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
				$query_add = "where a.nama like '%".$where['nama']."%'";
			}
		}

		$tot_hal = $this->db->get("dlmbg_super_buku_tamu");

		$config['base_url'] = base_url() . 'superadmin/buku_tamu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->order_by("stts","ASC")->get("dlmbg_super_buku_tamu",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Kontak</th>
					<th>Pesan</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->kontak."</td>
					<td>".strip_tags($h->pesan)."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/buku_tamu/approve/".$h->id_super_buku_tamu."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/buku_tamu/approve/".$h->id_super_buku_tamu."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/buku_tamu/hapus/".$h->id_super_buku_tamu."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
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
				$query_add = "where a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.id_multi_agenda, b.bidang, a.tanggal,   
		a.stts from dlmbg_multi_agenda a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add."");

		$config['base_url'] = base_url() . 'superadmin/agenda/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tipe_user, a.id_multi_agenda, b.bidang, a.tanggal,   
		a.stts from dlmbg_multi_agenda a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." order by a.stts ASC
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Bidang</th>
					<th>Tipe User</th>
					<th>Status</th>
					<th><a href='".base_url()."superadmin/agenda/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->bidang."</td>
					<td>".$h->tipe_user."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/agenda/approve/".$h->id_multi_agenda."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/agenda/approve/".$h->id_multi_agenda."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/agenda/edit/".$h->id_multi_agenda."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/agenda/hapus/".$h->id_multi_agenda."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_agenda_pengawas($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.id_pengawas_agenda, b.unit_kerja, a.tanggal,   
		a.stts from dlmbg_pengawas_agenda a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add."");

		$config['base_url'] = base_url() . 'superadmin/agenda_pengawas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.id_pengawas_agenda, b.unit_kerja, a.tanggal,   
		a.stts from dlmbg_pengawas_agenda a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.stts ASC
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Unit Kerja</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/agenda_pengawas/approve/".$h->id_pengawas_agenda."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/agenda_pengawas/approve/".$h->id_pengawas_agenda."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/agenda_pengawas/hapus/".$h->id_pengawas_agenda."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
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
				$query_add = "where a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.tipe_user, a.tanggal, a.id_multi_pengumuman, b.bidang,
		a.stts from dlmbg_multi_pengumuman a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." 
		order by a.stts ASC");

		$config['base_url'] = base_url() . 'superadmin/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tipe_user, a.tanggal, a.id_multi_pengumuman, b.bidang,
		a.stts from dlmbg_multi_pengumuman a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." 
		order by a.stts ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Bidang</th>
					<th>Tipe User</th>
					<th>Status</th>
					<th><a href='".base_url()."superadmin/pengumuman/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->bidang."</td>
					<td>".$h->tipe_user."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/pengumuman/approve/".$h->id_multi_pengumuman."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/pengumuman/approve/".$h->id_multi_pengumuman."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/pengumuman/edit/".$h->id_multi_pengumuman."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/pengumuman/hapus/".$h->id_multi_pengumuman."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pengumuman_pengawas($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.tanggal, a.id_pengawas_pengumuman, b.unit_kerja,
		a.stts from dlmbg_pengawas_pengumuman a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." 
		order by a.stts ASC");

		$config['base_url'] = base_url() . 'superadmin/pengumuman_pengawas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tanggal, a.id_pengawas_pengumuman, b.unit_kerja,
		a.stts from dlmbg_pengawas_pengumuman a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." 
		order by a.stts ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Unit Kerja</th>
					<th>Status</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/pengumuman_pengawas/approve/".$h->id_pengawas_pengumuman."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/pengumuman_pengawas/approve/".$h->id_pengawas_pengumuman."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/pengumuman_pengawas/hapus/".$h->id_pengawas_pengumuman."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->query("select a.judul, a.id_multi_berita, a.gambar, a.tanggal, b.bidang, a.stts, a.headline from 
		dlmbg_multi_berita a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." order by a.stts ASC");

		$config['base_url'] = base_url() . 'superadmin/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.tipe_user, a.id_multi_berita, a.gambar, a.tanggal, b.bidang, a.stts, a.headline from 
		dlmbg_multi_berita a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." order by a.stts ASC
		 LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Bidang</th>
					<th width='80'>Tipe User</th>
					<th>Headline</th>
					<th>Status</th>
					<th width='110'><a href='".base_url()."superadmin/berita/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->bidang."</td>
					<td>".$h->tipe_user."</td>
					<td>".$h->headline."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/berita/approve/".$h->id_multi_berita."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/berita/approve/".$h->id_multi_berita."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/berita/edit/".$h->id_multi_berita."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/berita/hapus/".$h->id_multi_berita."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
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
				$query_add = "where a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.id_pengawas_berita, a.gambar, a.tanggal, b.unit_kerja, a.stts from 
		dlmbg_pengawas_berita a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.stts ASC");

		$config['base_url'] = base_url() . 'superadmin/berita_pengawas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.id_pengawas_berita, a.gambar, a.tanggal, b.unit_kerja, a.stts from 
		dlmbg_pengawas_berita a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.stts ASC
		 LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Tanggal</th>
					<th>Unit Kerja</th>
					<th>Status</th>
					<th width='110'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->unit_kerja."</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/berita_pengawas/approve/".$h->id_pengawas_berita."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/berita_pengawas/approve/".$h->id_pengawas_berita."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/berita_pengawas/hapus/".$h->id_pengawas_berita."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_admin_dinas($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_admin_dinas']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_admin_dinas'] = $filter['nama_admin_dinas']; 
				$query_add = "where a.nama_admin_dinas like '%".$where['nama_admin_dinas']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama_admin_dinas, a.username_admin_dinas, b.bidang, a.id_admin_dinas from 
		dlmbg_admin_dinas a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." order by a.nama_admin_dinas ASC");

		$config['base_url'] = base_url() . 'superadmin/admin_dinas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama_admin_dinas, a.username_admin_dinas, b.bidang, a.id_admin_dinas from 
		dlmbg_admin_dinas a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang ".$query_add." order by a.nama_admin_dinas ASC
		 LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Admin Dinas</th>
					<th>Username Admin Dinas</th>
					<th>Bidang</th>
					<th width='110'><a href='".base_url()."superadmin/admin_dinas/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_admin_dinas."</td>
					<td>".$h->username_admin_dinas."</td>
					<td>".$h->bidang."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/admin_dinas/edit/".$h->id_admin_dinas."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/admin_dinas/hapus/".$h->id_admin_dinas."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_user_pengawas($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_user_pengawas']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_user_pengawas'] = $filter['nama_user_pengawas']; 
				$query_add = "where a.nama_user_pengawas like '%".$where['nama_user_pengawas']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama_user_pengawas, a.username_user_pengawas, b.unit_kerja, a.id_user_pengawas from 
		dlmbg_user_pengawas a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.nama_user_pengawas ASC");

		$config['base_url'] = base_url() . 'superadmin/user_pengawas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama_user_pengawas, a.username_user_pengawas, b.unit_kerja, a.id_user_pengawas from 
		dlmbg_user_pengawas a left join dlmbg_super_unit_kerja b on a.id_unit_kerja=b.id_super_unit_kerja ".$query_add." order by a.nama_user_pengawas ASC
		 LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama User Pengawas</th>
					<th>Username User Pengawas</th>
					<th>Unit Kerja</th>
					<th width='110'><a href='".base_url()."superadmin/user_pengawas/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_user_pengawas."</td>
					<td>".$h->username_user_pengawas."</td>
					<td>".$h->unit_kerja."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/user_pengawas/edit/".$h->id_user_pengawas."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/user_pengawas/hapus/".$h->id_user_pengawas."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_link($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('nama_link',$filter['nama_link'])->get("dlmbg_super_link_terkait");

		$config['base_url'] = base_url() . 'superadmin/link/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('nama_link',$filter['nama_link'])->get("dlmbg_super_link_terkait",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul Link</th>
					<th>Link</th>
					<th width='110'><a href='".base_url()."superadmin/link/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_link."</td>
					<td>".$h->url."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/link/edit/".$h->id_super_link_terkait."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/link/hapus/".$h->id_super_link_terkait."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kecamatan($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('kecamatan',$filter['kecamatan'])->get("dlmbg_super_kecamatan");

		$config['base_url'] = base_url() . 'superadmin/kecamatan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('kecamatan',$filter['kecamatan'])->get("dlmbg_super_kecamatan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kecamatan</th>
					<th width='110'><a href='".base_url()."superadmin/kecamatan/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->kecamatan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/kecamatan/edit/".$h->id_super_kecamatan."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/kecamatan/hapus/".$h->id_super_kecamatan."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_bidang($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('bidang',$filter['bidang'])->get("dlmbg_super_bidang");

		$config['base_url'] = base_url() . 'superadmin/bidang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('bidang',$filter['bidang'])->get("dlmbg_super_bidang",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Bidang</th>
					<th width='110'><a href='".base_url()."superadmin/bidang/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->bidang."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/bidang/edit/".$h->id_super_bidang."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/bidang/hapus/".$h->id_super_bidang."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_unit_kerja($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('unit_kerja',$filter['unit_kerja'])->get("dlmbg_super_unit_kerja");

		$config['base_url'] = base_url() . 'superadmin/unit_kerja/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('unit_kerja',$filter['unit_kerja'])->get("dlmbg_super_unit_kerja",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Unit Kerja</th>
					<th width='110'><a href='".base_url()."superadmin/unit_kerja/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->unit_kerja."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/unit_kerja/edit/".$h->id_super_unit_kerja."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/unit_kerja/hapus/".$h->id_super_unit_kerja."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_jenjang_pendidikan($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('pendidikan',$filter['pendidikan'])->get("dlmbg_super_jenjang_pendidikan");

		$config['base_url'] = base_url() . 'superadmin/jenjang_pendidikan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('pendidikan',$filter['pendidikan'])->get("dlmbg_super_jenjang_pendidikan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Jenjang Pendidikan</th>
					<th width='110'><a href='".base_url()."superadmin/jenjang_pendidikan/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->pendidikan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/jenjang_pendidikan/edit/".$h->id_super_jenjang_pendidikan."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/jenjang_pendidikan/hapus/".$h->id_super_jenjang_pendidikan."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kepegawaian($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('nama',$filter['nama'])->get("dlmbg_super_kepegawaian");

		$config['base_url'] = base_url() . 'superadmin/kepegawaian/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('nama',$filter['nama'])->get("dlmbg_super_kepegawaian",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Kontak</th>
					<th width='110'><a href='".base_url()."superadmin/kepegawaian/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nip."</td>
					<td>".$h->nama."</td>
					<td>".$h->jabatan."</td>
					<td>".$h->kontak."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/kepegawaian/edit/".$h->id_super_kepegawaian."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/kepegawaian/hapus/".$h->id_super_kepegawaian."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pengawas_sekolah($limit,$offset,$filter)
	{
		$hasil="";

		$tot_hal = $this->db->like('nama',$filter['nama'])->get("dlmbg_super_pengawas_sekolah");

		$config['base_url'] = base_url() . 'superadmin/pengawas_sekolah/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('nama',$filter['nama'])->get("dlmbg_super_pengawas_sekolah",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Kontak</th>
					<th width='110'><a href='".base_url()."superadmin/pengawas_sekolah/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nip."</td>
					<td>".$h->nama."</td>
					<td>".$h->jabatan."</td>
					<td>".$h->kontak."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/pengawas_sekolah/edit/".$h->id_super_pengawas_sekolah."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/pengawas_sekolah/hapus/".$h->id_super_pengawas_sekolah."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sekolah($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_sekolah']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_sekolah'] = $filter['nama_sekolah']; 
				$query_add = "where a.nama_sekolah like '%".$where['nama_sekolah']."%'";
			}
		}

		$tot_hal = $this->db->like('nama_sekolah',$filter['nama_sekolah'])->get("dlmbg_sekolah_profil");

		$config['base_url'] = base_url() . 'superadmin/sekolah/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select a.nama_sekolah, b.pendidikan, c.kecamatan, a.id_sekolah_profil from dlmbg_sekolah_profil a left join 
		dlmbg_super_jenjang_pendidikan b on a.id_jenjang_pendidikan=b.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan c 
		on a.id_kecamatan=c.id_super_kecamatan '.$query_add.' LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Sekolah</th>
					<th>Jenjang Pendidikan</th>
					<th>Kecamatan</th>
					<th width='110'><a href='".base_url()."superadmin/sekolah/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_sekolah."</td>
					<td>".$h->pendidikan."</td>
					<td>".$h->kecamatan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/sekolah/edit/".$h->id_sekolah_profil."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/sekolah/hapus/".$h->id_sekolah_profil."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_operator($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_operator']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_operator'] = $filter['nama_operator']; 
				$query_add = "where a.nama_operator like '%".$where['nama_operator']."%'";
			}
		}

		$tot_hal = $this->db->like('nama_operator',$filter['nama_operator'])->get("dlmbg_admin_sekolah");

		$config['base_url'] = base_url() . 'superadmin/operator/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select b.nama_sekolah, a.nama_operator, a.username, a.email, a.id_admin_sekolah from dlmbg_admin_sekolah a left join 
		dlmbg_sekolah_profil b on a.id_sekolah=b.id_sekolah_profil '.$query_add.' LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Operator</th>
					<th>Nama Sekolah</th>
					<th>Username</th>
					<th>Email</th>
					<th width='110'><a href='".base_url()."superadmin/operator/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_operator."</td>
					<td>".$h->nama_sekolah."</td>
					<td>".$h->username."</td>
					<td>".$h->email."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/operator/edit/".$h->id_admin_sekolah."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/operator/hapus/".$h->id_admin_sekolah."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_polling($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['pertanyaan']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['pertanyaan'] = $filter['pertanyaan']; 
				$query_add = "where a.pertanyaan like '%".$where['pertanyaan']."%'";
			}
		}

		$tot_hal = $this->db->like('pertanyaan',$filter['pertanyaan'])->get("dlmbg_super_pertanyaan_poll");

		$config['base_url'] = base_url() . 'superadmin/polling/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('pertanyaan',$filter['pertanyaan'])->get("dlmbg_super_pertanyaan_poll",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Pertanyaan</th>
					<th>Status</th>
					<th width='110'><a href='".base_url()."superadmin/polling/tambah' class='btn btn'><i class='icon-plus'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st = "<span class='label label-important'>Tidak Aktif</span>";
			if($h->aktif=="1"){$st="<span class='label label-info'>Aktif</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->pertanyaan."</td>
					<td>".$st."</td>
					<td>";
			if($h->aktif==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/polling/approve/".$h->id_super_pertanyaan_poll."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/polling/approve/".$h->id_super_pertanyaan_poll."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/jawaban_polling/index/".$h->id_super_pertanyaan_poll."' class='btn btn-small'><i class='icon-share'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/polling/edit/".$h->id_super_pertanyaan_poll."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/polling/hapus/".$h->id_super_pertanyaan_poll."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_jawaban_polling($id_question,$limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['jawaban']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['jawaban'] = $filter['jawaban']; 
				$query_add = "where a.jawaban like '%".$where['jawaban']."%'";
			}
		}
		
		$where['id_pertanyaan'] = $id_question;

		$tot_hal = $this->db->like('jawaban',$filter['jawaban'])->get_where("dlmbg_super_jawaban_poll",$where);

		$config['base_url'] = base_url() . 'superadmin/jawaban_polling/index/'.$id_question.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('jawaban',$filter['jawaban'])->get_where("dlmbg_super_jawaban_poll",$where,$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Jawaban</th>
					<th>Jumlah</th>
					<th width='110'><a href='".base_url()."superadmin/jawaban_polling/tambah/".$id_question."' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->jawaban."</td>
					<td>".$h->jum."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/jawaban_polling/edit/".$id_question."/".$h->id_super_jawaban_poll."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/jawaban_polling/hapus/".$id_question."/".$h->id_super_jawaban_poll."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->like('nama_super_admin',$filter['nama_super_admin'])->get("dlmbg_admin_super");

		$config['base_url'] = base_url() . 'superadmin/admin_dinas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('nama_super_admin',$filter['nama_super_admin'])->get("dlmbg_admin_super",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Super Admin</th>
					<th>Username Super Admin</th>
					<th width='110'><a href='".base_url()."superadmin/user/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_super_admin."</td>
					<td>".$h->username_super_admin."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/user/edit/".$h->id_admin_super."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/user/hapus/".$h->id_admin_super."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'superadmin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Pengaturan</th>
					<th>Tipe</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/sistem/edit/".$h->id_setting."' class='btn'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_menu($parent=0,$hasil)
	{
		$where['id_parent']=$parent;
		$w = $this->db->get_where("dlmbg_menu",$where);
		$w_q = $this->db->get_where("dlmbg_menu",$where)->row();
		if(($w->num_rows())>0)
		{
			$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th width='110' colspan='8'></th>
					</tr>
					</thead>";
		}
		foreach($w->result() as $h)
		{
			$where_sub['id_parent']=$h->id_menu;
			$w_sub = $this->db->get_where("dlmbg_menu",$where_sub);
			if(($w_sub->num_rows())>0)
			{
				$hasil .= "<tr><td>".$h->menu." </td><td><a href='".base_url()."superadmin/routing_pages/edit/".$h->id_menu."' class='btn btn-small'><i class='icon-edit'></i> Edit</a><a href='".base_url()."superadmin/routing_pages/hapus/".$h->id_menu."' class='btn btn-small' onClick=\"return confirm('Anda yakin?');\" ><i class='icon-trash'></i> Hapus</a>";
			}
			else
			{
				if($h->id_parent==0)
				{
				$hasil .= "<tr><td>".$h->menu." </td><td><a href='".base_url()."superadmin/routing_pages/edit/".$h->id_menu."' class='btn btn-small'><i class='icon-edit'></i> Edit</a><a href='".base_url()."superadmin/routing_pages/hapus/".$h->id_menu."' class='btn btn-small' onClick=\"return confirm('Anda yakin?');\" ><i class='icon-trash'></i> Hapus</a>";
				}
				else
				{
				$hasil .= "<tr><td width='250'>&raquo; ".$h->menu." </td><td><a href='".base_url()."superadmin/routing_pages/edit/".$h->id_menu."' class='btn btn-small'><i class='icon-edit'></i> Edit</a><a href='".base_url()."superadmin/routing_pages/hapus/".$h->id_menu."' class='btn btn-small' onClick=\"return confirm('Anda yakin?');\" ><i class='icon-trash'></i> Hapus</a>";
				}
			}
			$hasil = $this->generate_menu($h->id_menu,$hasil);
			$hasil .= "</td></tr>";
		}
		if(($w->num_rows)>0)
		{
			$hasil .= "</table>";
		}
		return $hasil;
	}
	 
	public function generate_index_galeri_kegiatan($limit,$offset,$filter)
	{
		$hasil="";
		$where['nama_album'] = $filter['nama_album']; 

		$tot_hal = $this->db->like("nama_album",$where['nama_album'])->get("dlmbg_super_album_galeri_dinas");

		$config['base_url'] = base_url() . 'superadmin/galeri_kegiatan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w =  $this->db->like("nama_album",$where['nama_album'])->get("dlmbg_super_album_galeri_dinas",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Album</th>
					<th width='110'><a href='".base_url()."superadmin/galeri_kegiatan/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_album."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/foto_galeri_kegiatan/index/".$h->id_abum_galeri_dinas."' class='btn btn-small'><i class='icon-share'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/galeri_kegiatan/edit/".$h->id_abum_galeri_dinas."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/galeri_kegiatan/hapus/".$h->id_abum_galeri_dinas."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_foto_galeri_kegiatan($id_album,$limit,$offset)
	{
		$hasil="";
		$where['id_album'] = $id_album;
		$tot_hal = $this->db->get_where("dlmbg_super_galeri_dinas",$where);

		$config['base_url'] = base_url() . 'superadmin/foto_galeri_kegiatan/index/'.$id_album.'';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w =  $this->db->get_where("dlmbg_super_galeri_dinas",$where,$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Gambar</th>
					<th width='110'><a href='".base_url()."superadmin/foto_galeri_kegiatan/tambah/".$id_album."' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td><img src='".base_url()."asset/images/galeri/thumb/".$h->gambar."' width='50'></td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/foto_galeri_kegiatan/edit/".$id_album."/".$h->id_super_galeri_dinas."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/foto_galeri_kegiatan/hapus/".$id_album."/".$h->id_super_galeri_dinas."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_galeri_sekolah($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_sekolah']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_sekolah'] = $filter['nama_sekolah']; 
				$query_add = "where a.nama_sekolah like '%".$where['nama_sekolah']."%'";
			}
		}

		$tot_hal = $this->db->like('nama_sekolah',$filter['nama_sekolah'])->get("dlmbg_sekolah_profil");

		$config['base_url'] = base_url() . 'superadmin/galeri_sekolah/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select a.nama_sekolah, b.pendidikan, c.kecamatan, a.id_sekolah_profil, (select count(id_sekolah_galeri_sekolah) as jum from dlmbg_sekolah_galeri_sekolah where stts=0 and id_sekolah=a.id_sekolah_profil) jum from dlmbg_sekolah_profil a left join 
		dlmbg_super_jenjang_pendidikan b on a.id_jenjang_pendidikan=b.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan c 
		on a.id_kecamatan=c.id_super_kecamatan '.$query_add.' order by jum DESC LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Sekolah</th>
					<th>Jenjang Pendidikan</th>
					<th>Kecamatan</th>
					<th>Moderation</th>
					<th width='110'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$jum="<span class='label label-info'>".$h->jum." foto</span>";
			if($h->jum>0){$jum="<span class='label label-important'>".$h->jum." foto</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_sekolah."</td>
					<td>".$h->pendidikan."</td>
					<td>".$h->kecamatan."</td>
					<td>".$jum."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/galeri_sekolah/detail/".$h->id_sekolah_profil."' class='btn btn-small'><i class='icon-share'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}	
	 
	public function generate_index_galeri_uptd($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_kecamatan']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_kecamatan'] = $filter['nama_kecamatan']; 
				$query_add = "where a.nama_kecamatan like '%".$where['nama_kecamatan']."%'";
			}
		}

		$tot_hal = $this->db->like('kecamatan',$filter['nama_kecamatan'])->get("dlmbg_super_kecamatan");

		$config['base_url'] = base_url() . 'superadmin/galeri_uptd/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select a.kecamatan, a.id_super_kecamatan, (select count(id_uptd_galeri_uptd) as jum from dlmbg_uptd_galeri_uptd where stts=0 and 
		id_kecamatan=a.id_super_kecamatan) jum from dlmbg_super_kecamatan a '.$query_add.' order by jum DESC LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Kecamatan</th>
					<th>Moderation</th>
					<th width='110'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$jum="<span class='label label-info'>".$h->jum." foto</span>";
			if($h->jum>0){$jum="<span class='label label-important'>".$h->jum." foto</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->kecamatan."</td>
					<td>".$jum."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/galeri_uptd/detail/".$h->id_super_kecamatan."' class='btn btn-small'><i class='icon-share'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}	
	 
	public function generate_index_foto_galeri_sekolah($id_sekolah,$limit,$offset)
	{
		$hasil="";
		$where['id_sekolah'] = $id_sekolah;
		$tot_hal = $this->db->get_where("dlmbg_sekolah_galeri_sekolah",$where);

		$config['base_url'] = base_url() . 'superadmin/galeri_sekolah/detail/'.$id_sekolah.'';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w =  $this->db->order_by("stts","ASC")->get_where("dlmbg_sekolah_galeri_sekolah",$where,$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Status</th>
					<th>Gambar</th>
					<th width='110'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$st."</td>
					<td><img src='".base_url()."asset/images/galeri-sekolah/thumb/".$h->gambar."' width='50'></td>
					<td>";

			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/galeri_sekolah/approve/".$id_sekolah."/".$h->id_sekolah_galeri_sekolah."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/galeri_sekolah/approve/".$id_sekolah."/".$h->id_sekolah_galeri_sekolah."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/galeri_sekolah/hapus/".$id_sekolah."/".$h->id_sekolah_galeri_sekolah."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_foto_galeri_uptd($id_kecamatan,$limit,$offset)
	{
		$hasil="";
		$where['id_kecamatan'] = $id_kecamatan;
		$tot_hal = $this->db->get_where("dlmbg_uptd_galeri_uptd",$where);

		$config['base_url'] = base_url() . 'superadmin/galeri_uptd/detail/'.$id_kecamatan.'';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w =  $this->db->order_by("stts","ASC")->get_where("dlmbg_uptd_galeri_uptd",$where,$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Status</th>
					<th>Gambar</th>
					<th width='110'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Moderation</span>";
			if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$st."</td>
					<td><img src='".base_url()."asset/images/galeri-uptd/thumb/".$h->gambar."' width='50'></td>
					<td>";

			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/galeri_uptd/approve/".$id_kecamatan."/".$h->id_uptd_galeri_uptd."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/galeri_uptd/approve/".$id_kecamatan."/".$h->id_uptd_galeri_uptd."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/galeri_uptd/hapus/".$id_kecamatan."/".$h->id_uptd_galeri_uptd."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_user_uptd($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_operator']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_operator'] = $filter['nama_operator']; 
				$query_add = "where a.nama_operator like '%".$where['nama_operator']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama_operator, a.username, b.kecamatan, a.id_admin_uptd from 
		dlmbg_admin_uptd a left join dlmbg_super_kecamatan b on a.id_kecamatan=b.id_super_kecamatan ".$query_add." order by a.nama_operator ASC");

		$config['base_url'] = base_url() . 'superadmin/admin_dinas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama_operator, a.username, b.kecamatan, a.id_admin_uptd from 
		dlmbg_admin_uptd a left join dlmbg_super_kecamatan b on a.id_kecamatan=b.id_super_kecamatan ".$query_add." order by a.nama_operator ASC
		 LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama User UPTD</th>
					<th>Username UPTD</th>
					<th>Kecamatan</th>
					<th width='110'><a href='".base_url()."superadmin/user_uptd/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_operator."</td>
					<td>".$h->username."</td>
					<td>".$h->kecamatan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/user_uptd/edit/".$h->id_admin_uptd."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/user_uptd/hapus/".$h->id_admin_uptd."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
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