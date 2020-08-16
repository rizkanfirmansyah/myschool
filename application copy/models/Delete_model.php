<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete_model extends CI_Model
{

	public function deleteRole($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
        Role telah berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
         </div>');
        redirect('admin/role');
	}

}