	<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getDataMenu()
    {
        $role_id = $this->session->userdata('role_id');
       
	    $this->db->select('user_menu.id, menu');
	    $this->db->from('user_menu');
	    $this->db->join('user_access_menu', 'user_menu.id=user_access_menu.menu_id');
	    $this->db->where('role_id', $role_id);
	    $this->db->order_by('menu', 'ASC');
	    return $this->db->get()->result_array();
    }

    public function getSubMenu()
    {
    	$this->db->select('user_sub_menu.id, menu, title, icon, url, is_active');
    	$this->db->from('user_sub_menu');
    	$this->db->join('user_menu', 'user_sub_menu.menu_id=user_menu.id');
    	return $this->db->get()->result_array();
    }
}
