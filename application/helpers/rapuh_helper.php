<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nama')) {
        redirect('auth/login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
} 

function function_status($id, $user){
    if($id == 1){
        return '<a href="'. base_url('edit/statususer/') . $id.'/'. $user .'" class="btn btn-sm text-white btn-success" style="cursor:pointer;">Aktif</a>';
    }else{
        return '<a href="'. base_url('edit/statususer/') . $id.'/'. $user .'" class="btn btn-sm text-white btn-danger" style="cursor:pointer;">Tidak Aktif</a>';
    }
}

function check_kepala_jabatan($id)
{
    if($id == 'ya'){
        return '<a class="btn btn-sm btn-success text-white">Wakasek</a>';
    }else{
        return '<a class="btn btn-sm btn-warning text-white">Staff</a>';
    }
}

function checked_wakasek($id)
{
    if($id == 'ya'){
        return 'checked';
    }else{
        return '';
    }
}

function staff_jabatan($id)
{
    $ci = get_instance();
    $data = $ci->db->select('*')->from('staff_jabatan')->join('guru', 'staff_jabatan.guru_id=guru.id', 'left')->where('jabatan_id', $id)->where('kepala_jabatan', 'ya')->get()->row_array();

    if($data){
        return $data['nama'];
    }else{
        return 'Posisi Kosong';
    }

    
}

function functionwarna($id)
{
    if($id == 'staff'){
        return 'warning';
    }elseif($id == 'guru'){
        return 'primary';
    }elseif($id == 'siswa'){
        return 'danger';
    }elseif($id == 'user    '){
        return 'success';
    }else{
        return 'secondary';
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function maintanance_check()
{
    $ci = get_instance();

    $class = $ci->router->fetch_class();
    $method = $ci->router->fetch_method();
    $ci->db->where('setmore', 'maintanance');
    $ci->db->where('setting', $class);
    $ci->db->where('parameter', 'all');
    $all = $ci->db->get('tb_developer')->row_array();
    $ci->db->where('setmore', 'maintanance');
    $ci->db->where('setting', $class);
    $ci->db->where('parameter', $method);
    $not_all = $ci->db->get('tb_developer')->row_array();
    $ci->db->where('setmore', 'maintanance');
    $ci->db->where('setting', 'all');
    $drop = $ci->db->get('tb_developer')->row_array();
    // $ci->db->where('role_id', 1);
    // $ci->db->or_where('role_id', 2);
    $user = $ci->db->get_where('user', ['email' => $ci->session->userdata('email')])->row_array();


    // if ($all['rule'] == 1) {
    //     if ($user['role_id'] != 1 && $user['role_id'] != 2) {
    //         redirect('auth/blocked');
    //     }
    // }elseif ($not_all['rule'] == 1 ){
    //     if ($user['role_id'] != 1 && $user['role_id'] != 2) {
    //         redirect('auth/blocked');
    //     }
    // }elseif ($drop['rule'] == 1 ){
    //     if ($user['role_id'] != 1 && $user['role_id'] != 2) {
    //         redirect('auth/blocked');
    //     }
    // }
}
    

    function memory()
    {
         function get_directory_size($path) {
            $size = 0;
            $path = realpath($path);
            if($path !== false) {
                foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
                    $size += $object->getSize();
                }
            }
            return $size; // in bytes
        }

     function fsize($file){
                                    $a = array("B", "KB", "MB", "GB", "TB", "PB");
                                    $pos = 0;
                                    $size = filesize($file);
                                    while ($size >= 1024)
                                    {
                                    $size /= 1024;
                                    $pos++;
                                    }
                                    return round ($size,2)." ".$a[$pos];
                                    }
    }


    function log_history()
    {
        $ci = get_instance();
        $class = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();

       $data = [
            'user' => $ci->session->userdata('email'),
            'class' => $class,
            'method' => $method,
            'log' => $class. '/' . $method,
            'time' => time(),
            'date' => date('Y-m-d H:i:s'),
            'status' => 1
       ];

       // $ci->db->insert('log', $data);
    }

    function lihatpost($id)
    {
        $ci = get_instance();
        $data['lihat'] = $ci->db->get_where('data_blog', ['id' => $id])->row_array();
        $lihat = $data['lihat']['lihat'];
        $ci->db->set('lihat', ++$lihat);
        $ci->db->where('id', $id);
        $ci->db->update('data_blog');

    }


    function check_materi($materi, $pengajar)
    {
        $ci = get_instance();
        $user = $ci->session->userdata('email');

        $ci->db->where('pengajar', $pengajar);
        $ci->db->where('email', $user);
        $ci->db->where('materi', $materi);
        $ci->db->where('status', 1);
        $result = $ci->db->get('materi_check');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }

    function edit_status_siswa($id){
        $ci = get_instance();
        $siswa = $ci->db->get_where('siswa', ['id' => $id, 'status' => 1])->row();

        if($siswa){
            return 'fa-user-times text-danger';
        }else{
            return 'fa-user-check text-success';
        }
    }