<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Admin_model');
        
        if (!$this->session->userdata('masuk_user')) {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id'));
        $this->load->view('profile/index', $data);
    }

    public function update_profile()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->User_model->getUserByEmail($this->session->userdata('email'));

        $nama = $this->input->post('nama', true);
        $id = $this->session->userdata('id');

        // Handle photo and KTP upload
        $upload_config = [
            'upload_path'   => './gambar/pegawai/',
            'allowed_types' => 'gif|jpg|png|PNG',
            'max_size'      => 10000,
            'max_width'     => 10000,
            'max_height'    => 10000,
        ];

        $this->load->library('upload', $upload_config);

        if ($this->upload->do_upload('userfilefoto')) {
            $new_image = $this->upload->data('file_name');

            $data_update = [
                "foto"         => $new_image,
                "nama_pegawai" => $nama,
            ];

            $this->Admin_model->updateProfile($id, $data_update);
            $this->User_model->updateProfile($id, ['image' => $new_image, 'name' => $nama]);

            $this->session->set_flashdata('flash', 'Berhasil diperbarui');
        } else {
            $this->session->set_flashdata('flash', 'Gagal upload foto');
        }

        redirect('profile/index');
    }

    public function update_password()
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->User_model->getUserByEmail($this->session->userdata('email'));
        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password_baru', true);
        $password_baru1 = $this->input->post('password_baru1', true);
        $id = $this->session->userdata('id');

        if (password_verify($password_lama, $data['user']['password'])) {
            if ($password_baru == $password_baru1) {
                $data_update = [
                    "password" => password_hash($password_baru, PASSWORD_DEFAULT),
                ];
                $this->User_model->updatePassword($id, $data_update);
                $this->session->set_flashdata('flash', 'Password Berhasil Diubah!');
            } else {
                $this->session->set_flashdata('flash', 'Konfirmasi Password Berbeda!');
            }
        } else {
            $this->session->set_flashdata('flash', 'Password Lama Salah!');
        }

        redirect('profile/index');
    }
}