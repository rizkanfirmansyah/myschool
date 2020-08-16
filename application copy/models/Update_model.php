<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{

	public function updateRole($data, $id, $role)
	{
            $this->db->set('role', $role);
            $this->db->where('id', $id);
            $this->db->update('user_role', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                Role berhasil diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>');
            redirect('admin/role');
	}

    public function dataHomePageProfile($id)
    {
        // cek jika gambar diperbarui
            $upload_image = $_FILES['image-profile']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image-profile')) {
                    if ($id != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/images/' . $id);
                    }

                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                      $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }
            }

            $this->db->where('jenis', 'profile');
            $this->db->update('data_homepage');
            $this->session->set_flashdata('flash', 'slider_update');
            redirect('profile/homepage');
    }

}