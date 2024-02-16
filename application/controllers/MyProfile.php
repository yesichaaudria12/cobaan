<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk_user')) {
            redirect(base_url('auth'));
        }

        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Admin_model');
    }

    public function edit_profil($id)
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $nama = $this->input->post('nama', true);

        // File Upload Configuration
        $config['upload_path'] = './gambar/pegawai/';
        $config['allowed_types'] = 'jpeg|jpg|png|PNG';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfilefoto')) {
            $upload_data = $this->upload->data();
            $new_image = $upload_data['file_name'];

            // Update database
            $this->db->where('id_user', $id)->update('tb_pegawai', ['nama_pegawai' => $nama, 'foto' => $new_image]);
            $this->db->where('id', $id)->update('user', ['name' => $nama, 'image' => $new_image]);

            $this->session->set_flashdata('flash', 'Berhasil diperbarui');
        } else {
            // Handle upload error
            $this->session->set_flashdata('flash', $this->upload->display_errors());
        }

        redirect('MyProfile');
    }

    public function edit_password($id)
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password_baru', true);
        $password_baru1 = $this->input->post('password_baru1', true);

        if (password_verify($password_lama, $data['user']['password'])) {
            if ($password_baru == $password_baru1) {
                // Update password
                $hashed_password = password_hash($password_baru, PASSWORD_DEFAULT);
                $this->db->where('id', $id)->update('user', ['password' => $hashed_password]);

                $this->session->set_flashdata('flash', 'Password Berhasil Diubah!');
            } else {
                $this->session->set_flashdata('flash', 'Konfirmasi Password Berbeda!');
            }
        } else {
            $this->session->set_flashdata('flash', 'Password Lama Salah!');
        }

        redirect('MyProfile');
    }
}
