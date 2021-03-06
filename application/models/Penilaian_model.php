<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_penilaian_perusahaan()
	{
		$post = $this->input->post();
		$data = array("nilai_pkl" => $post['tnp'],
			"detail_nilai_pkl" => $post['dnp'],
			"id_dosen_bimbingan_mhs" => $post['idbm']);
		return $this->db->insert('tb_perusahaan_penilaian', $data);
	}

	public function update_penilaian_perusahaan()
	{
		$post = $this->input->post();
		if($post['id']){
			$data = array("nilai_pkl" => $post['tnp'],
				"detail_nilai_pkl" => $post['dnp'],
				"id_dosen_bimbingan_mhs" => $post['idbm']);
			$this->db->set($data);
			$this->db->where("id = '$post[id]'");
			return $this->db->update('tb_perusahaan_penilaian');
		}
	}

	public function delete_penilaian_perusahaan()
	{

	}

	public function get_penilaian_perusahaan($id = null,$detail = false)
	{
		if($id){
			$this->db->where($id);
		}
		if($detail){
			return $this->db->query('SELECT
				tm.nim,
				tm.nama_mahasiswa,
				tp.nama_pegawai nama_pembimbing,
				tpp.nilai_pkl,
				tpp.detail_nilai_pkl
			FROM
				tb_perusahaan_penilaian tpp
				INNER JOIN tb_dosen_bimbingan_mhs tdbm ON tdbm.id_dosen_bimbingan_mhs = tpp.id_dosen_bimbingan_mhs
				INNER JOIN tb_pegawai tp ON tdbm.nip_nik = tp.nip_nik
				INNER JOIN tb_mahasiswa tm ON tm.nim = tdbm.nim')->result();
		}
		return $this->db->select('id,nilai_pkl,detail_nilai_pkl,id_dosen_bimbingan_mhs idbm')->from('tb_perusahaan_penilaian')->get()->result();
	}

	public function get_penilaian_seminar($id = null)
	{
		$where = "";
		if ($id != null) {
			$where .= "WHERE tm.nim = '$id'";
		}
		$where .= "AND tsj.id IN (SELECT id_seminar_jadwal FROM tb_seminar_penilaian)";
		return $this->db->query("
		SELECT
			tsj.id ij,
			tp3.nama_pegawai p3,
			tp1.nama_pegawai p1,
			tp2.nama_pegawai p2,
			tdbm.judul_laporan_mhs laporan,
			tst.nama nama_tempat,
			tm.nama_mahasiswa,
			tsp.nilai_seminar,
			tsp.detail_nilai_seminar,
		    tsp.status_dosen,
			thsp.nilai_seminar nilai_seminar_past,
			thsp.detail_nilai_seminar detail_nilai_seminar_past,
			tps.nama_program_studi,
			tm.nim,
			tsj.mulai START,
			tsj.berakhir END
		FROM
			tb_seminar_jadwal tsj
			INNER JOIN tb_seminar_tempat tst ON tst.id = tsj.id_seminar_ruangan
			INNER JOIN tb_seminar_penilaian tsp ON tsp.id_seminar_jadwal = tsj.id
			LEFT OUTER JOIN tb_history_seminar_penilaian thsp ON thsp.id_seminar_penilaian = tsp.id
			INNER JOIN tb_dosen_bimbingan_mhs tdbm ON tsj.id_dosen_bimbingan_mhs = tdbm.id_dosen_bimbingan_mhs
			INNER JOIN tb_pegawai tp3 ON tp3.nip_nik = tdbm.nip_nik
			INNER JOIN tb_mahasiswa tm ON tm.nim = tdbm.nim
			INNER JOIN tb_program_studi tps ON tm.id_program_studi = tps.id_program_studi
			INNER JOIN tb_seminar_penguji penguji_1 ON penguji_1.id = tsj.id_penguji_1
			INNER JOIN tb_seminar_penguji penguji_2 ON penguji_2.id = tsj.id_penguji_2
			INNER JOIN tb_dosen td1 ON td1.id = penguji_1.id_dosen
			INNER JOIN tb_dosen td2 ON td2.id = penguji_2.id_dosen
			INNER JOIN tb_pegawai tp1 ON tp1.nip_nik = td1.nip_nik
			INNER JOIN tb_pegawai tp2 ON tp2.nip_nik = td2.nip_nik
		$where
			ORDER BY status_dosen")->result();
	}
}
