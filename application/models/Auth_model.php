<?php


class Auth_model extends CI_model
{
    public function getKUGuru()
    {
        return $this->db->get('user');
    }

    public function getKGuru()
    {
        return $this->db->get('guru');
    }
}
