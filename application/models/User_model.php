<?php


class User_model extends CI_model
{
  public function konfirmasiAbsenById($id)
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai as nampeg from tb_pegawai,tb_presents  where tb_presents.id_pegawai=tb_pegawai.id_pegawai and tb_pegawai.id_user='$id' and tb_presents.tanggal='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

  public function PegawaiById($id)
  {
    $sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai,jabatan  where tb_pegawai.jabatan=jabatan.id_jabatan and tb_pegawai.id_user='$id'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
  public function AbsenByStatusId($id_user)
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai as nampeg from tb_pegawai,tb_presents  where tb_presents.id_pegawai=tb_pegawai.id_pegawai and tb_pegawai.id_user='$id_user' and tb_presents.tanggal='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
  public function cek_lemburById($id_peg)
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT * from tb_lembur  where tb_lembur.id_pegawai='$id_peg' and tb_lembur.date='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    // Fungsi untuk memperbarui profil pengguna
    public function updateProfile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    // Fungsi untuk mengambil data pengguna berdasarkan email
    public function getUserByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    // Fungsi untuk memperbarui password pengguna
    public function updatePassword($id, $hashedPassword)
    {
        $this->db->where('id', $id);
        $this->db->update('user', ['password' => $hashedPassword]);
    }
}
