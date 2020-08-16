<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{

	public function changeAccess($menu_id, $role_id)
	{
        $data = [
            'menu_id' => $menu_id,
            'role_id' => $role_id
        ];

        $access = $this->db->get_where('user_access_menu', $data);

        if ($access->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
        Akses telah berhasil diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
         </div>');
	}

}