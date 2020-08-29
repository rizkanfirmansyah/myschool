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

function count_user($id)
{
    $ci = get_instance();

    return $ci->db->where('role_id', $id)->get('users')->num_rows();
}

function function_status($id, $user){
    if($id == 1){
        return '<a href="'. base_url('edit/statususer/') . $id.'/'. $user .'" class="btn btn-sm text-white btn-success" style="cursor:pointer;">Aktif</a>';
    }else{
        return '<a href="'. base_url('edit/statususer/') . $id.'/'. $user .'" class="btn btn-sm text-white btn-danger" style="cursor:pointer;">Tidak Aktif</a>';
    }
}

function absen_siswa($ket, $nis, $mapel)
{
    $rizkan = get_instance();
    $rizkan->db->where('id_siswa', $nis);
    $rizkan->db->where('id_mapel', $mapel);
    $rizkan->db->where('keterangan', $ket);
    $rizkan->db->where('date', date('d-M-Y'));
    $check = $rizkan->db->get('data_absen')->row();

    if($check){
        return 'checked';
    }
}

function count_absen_siswa($ket, $kelas)
{
    $rizkan = get_instance();
    $rizkan->db->where('keterangan', $ket);
    $rizkan->db->where('id_kelas', $kelas);
    $cek= $rizkan->db->select('*, count(keterangan) as jml')->from('data_absen')->group_by('keterangan')->get()->row();

    if($cek->jml){
        return $cek->jml;
    }else{
        return 0;
    }
}

function nama_user_check($id)
{
    $ci = get_instance();

    $siswa = $ci->db->get_where('siswa', ['nis' =>$id])->row();
    $guru = $ci->db->get_where('guru', ['nip' =>$id])->row();
    $user = $ci->db->get_where('users', ['nama' =>$id])->row();

    if($siswa != null){
        return $siswa->nama;
    }elseif($guru != null)
    {
        return $guru->nama;
    }else{
        if($user->role_id == 2){
            return 'Staff';
        }elseif($user->role_id == 5){
            return 'Kepala Sekolah';
        }else{
            return 'Guest';
        }
    }
}

function cert_guru_aktif($id)
{
    $rizkan = get_instance();
    if($id == 0){
        $idd =1 ;
    }else{
        $idd = $id;
    }

    $cert = $rizkan->db->get_where('guru', ['sertifikasi' => 'ya'])->num_rows();
    if($cert < 1){
        $value = 0;
    }else{
        $value = $cert;
    }
    return $value*100/$idd;
}

function value_cert()
{
    $rizkan = get_instance();

    $cert = $rizkan->db->get_where('guru', ['sertifikasi' => 'ya'])->num_rows();
    return $cert;
}

function guru_pns_cek()
{
    $rizkan = get_instance();

    $pns = $rizkan->db->get_where('guru', ['status' => 'pns'])->num_rows();
    return $pns;
}

function guru_honorer_cek()
{
    $rizkan = get_instance();

    $honorer = $rizkan->db->get_where('guru', ['status' => 'honorer'])->num_rows();
    return $honorer;
}

function checked_materi_siswa($id)
{
    $rizkan = get_instance();

    $cek = $rizkan->db->where('id_materi', $id)->where('id_siswa', $rizkan->session->userdata('nama'))->get('materi_siswa')->row();

    if($cek == null){
        return 'belum';
    }elseif($cek->selesai == 2){
        return '<a href="'. base_url('materi/siswa/'.$id.'/1') .'"><i class="fa fa-2x fa-square"></i></a>';
    }else{
        return '<a href="'. base_url('materi/siswa/'.$id.'/2') .'"><i class="fa fa-2x fa-check-square"></i></a>';
    }
}

function siswa_checked_download($id)
{
    $rizkan = get_instance();
    $cek = $rizkan->db->where('id_materi', $id)->where('id_siswa', $rizkan->session->userdata('nama'))->get('materi_siswa')->row();

    if($cek == null){
        $data = [
            'id_materi' => $id,
            'id_siswa' => $rizkan->session->userdata('nama'),
            'selesai' => 2,
            'tgl_pengumpulan' => date('d-m-Y'),
        ];
        $rizkan->db->insert('materi_siswa', $data);
    }else{
        return false;
    }
}

function status_jadwal($id, $user)
{
    if($id == 1){
        return ' <a href="'. base_url('akses/jadwal/0/'.$user) .'" class="btn btn-sm btn-success text-white">Aktif</a>';
    }else{
        return ' <a href="'. base_url('akses/jadwal/1/'. $user) .'" class="btn btn-sm btn-danger text-white">Tidak Aktif</a>';
    }
}

function hitung_siswa($id)
{
    $rizkan = get_instance();
    return $rizkan->db->get_where('siswa', ['kelas_id' => $id])->num_rows();
}

function hitung_absen_siswa($id, $kelas, $ket)
{
    $rizkan = get_instance();
    $total = $rizkan->db->get_where('data_absen', ['id_siswa' => $id, 'id_kelas' => $kelas])->num_rows();

    $absen = $rizkan->db->get_where('data_absen', ['id_siswa' => $id, 'id_kelas' => $kelas, 'keterangan' => $ket])->num_rows();

    if($ket == 'hadir'){
        $color = 'success';
    }elseif($ket == 'sakit'){
        $color = 'warning';
    }elseif($ket == 'izin'){
        $color = 'info';
    }elseif($ket == 'alfa'){
        $color = 'danger';
    }else{
        $color = 'secondary';
    }

    return '<button type="button" class="btn btn-'. $color .'" data-toggle="tooltip" data-placement="top" title="Sebanyak '. $absen .'x">
    '. $absen * 100 / $total .'%
    </button>';
}

function function_status_materi($status, $id){
    if ($status == 1) {
        return '<a href="'.base_url('materi/status/materi/0/'.$id).'" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Active</a>';       
    }else{
        return '<a href="'.base_url('materi/status/materi/1/'.$id).'" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Inactive</a>';
    }
}

function function_status_tugas($status, $id){
    if ($status == 1) {
        return '<a href="'.base_url('materi/status/tugas/0/'.$id).'" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Active</a>';       
    }else{
        return '<a href="'.base_url('materi/status/tugas/1/'.$id).'" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Inactive</a>';
    }
}

function function_selesai($id)
{
    if($id == 1){
        return 'Selesai';
    }else{
        return 'Belum Selesai';
    }
}

function function_selesai_warna($id)
{
    if($id == 1){
        return 'success';
    }else{
        return 'danger';
    }
}

function cek_spp_siswa($id)
{
    $rizkan = get_instance();
    $idsiswa = $rizkan->session->userdata('nama');

    $check = $rizkan->db->select_sum('nominal')->where('siswa_nis', $idsiswa)->where('bulan', $id)->get('data_spp')->row();
    $spp = $rizkan->db->get_where('setup_spp', ['tipe' => 'spp'])->row()->nominal;
    if($check->nominal >= $spp){
        return 'Lunas';
    }else{
        return 'Belum Lunas';
    }
}

function cek_spp_warna($id)
{
    $rizkan = get_instance();
    $idsiswa = $rizkan->session->userdata('nama');

    $check = $rizkan->db->select_sum('nominal')->where('siswa_nis', $idsiswa)->where('bulan', $id)->get('data_spp')->row();
    $spp = $rizkan->db->get_where('setup_spp', ['tipe' => 'spp'])->row()->nominal;
    if($check->nominal >= $spp){
        return 'success';
    }else{
        return 'danger';
    }
}

function cek_spp_logo($id)
{
    $rizkan = get_instance();
    $idsiswa = $rizkan->session->userdata('nama');

    $check = $rizkan->db->select_sum('nominal')->where('siswa_nis', $idsiswa)->where('bulan', $id)->get('data_spp')->row();
    $spp = $rizkan->db->get_where('setup_spp', ['tipe' => 'spp'])->row()->nominal;
    if($check->nominal >= $spp){
        return 'check-circle';
    }else{
        return 'ban ';
    }
}
    
function function_nilai_tugas($id, $status)
{
    if($id >= 75 && $status == 1){
        return '<a class="btn btn-sm text-white btn-success">Selesai</a>';
    }elseif($id < 75 && $status == 1){
        return '<a class="btn btn-sm text-white btn-warning">Remedial</a>';
    }else{
        return '<a class="btn btn-sm text-white btn-danger">Belum</a>';
    }
}

function function_nilai_siswa($nis, $id)
{
    $rizkan = get_instance();

    $cek = $rizkan->db->get_where('nilai_tugas', ['id_siswa' => $nis, 'id_tugas' => $id])->row();
    if($cek == null){
        return 'belum mengumpulkan';
    }elseif($cek->nilai == 0){
        return 'belum dinilai';
    }else{
        return $cek->nilai;
    }
}

function function_siswa_dpp($nis)
{
    $rizkan = get_instance();

    $nominal = $rizkan->db->select_sum('nominal')->where('siswa_nis', $nis)->get('data_dpp')->row()->nominal;
    $dpp = $rizkan->db->get_where('setup_spp', ['tipe' =>'dpp'])->row()->nominal;

    return $dpp - $nominal;
}

function get_spp_bulan($nis)
{
    $rizkan = get_instance();

    $bulan = $rizkan->db->get('bulan')->num_rows();
    $cek = $rizkan->db->get_where('data_spp', ['siswa_nis' => $nis])->num_rows();

    return $bulan-$cek;
}

function function_dsp_siswa($dsp)
{
    $rizkan = get_instance();

    $cek = $rizkan->db->get_where('setup_spp', ['tipe' => 'dpp'])->row()->nominal;
    return $cek-$dsp;
}

function input_function_soal($id)
{
    if($id){
        return false;
    }else{
        return '<input type="file" class="form-control" name="file_soal">';
    }
}

function function_status_materi_siswa($id)
{
    if ($id == 1) {
        return '<a" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Selesai</a>';       
    }elseif($id == 2){
        return '<a" class="btn btn-sm btn-warning"><i class="fas fa-hourglass"></i> Sedang mengerjakan</a>';
    }else{
        return '<a" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i>  Belum </a>';
    }
}

function hari_function($id)
{
    if($id == 'Mon'){
        return ' Senin';
    }elseif($id == 'Tue'){
        return ' Selasa';
    }elseif($id == 'Wed'){
        return ' Rabu';
    }elseif($id == 'Thu'){
        return ' Kamis';
    }elseif($id == 'Fri'){
        return ' Jumat';
    }elseif($id == 'Sat'){
        return ' Sabtu';
    }elseif($id == 'Sun'){
        return ' Minggu';
    }
        
}

function check_kepala_jabatan($id, $jabatan)
{
    if($id == 'ya' && $jabatan == 'Kepala Sekolah'){
        return '<a class="btn btn-sm btn-primary text-white">Kepsek</a>';
    }elseif($id == 'ya'){
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
        return 'warning';
    }elseif($id == 'user'){
        return 'success';
    }else{
        return 'secondary';
    }
}

function warna_absen($id)
{
    if($id == 'hadir'){
        return 'success';
    }elseif($id == 'sakit'){
        return 'warning';
    }elseif($id == 'izin'){
        return 'info';
    }elseif($id == 'alfa'){
        return 'danger';
    }else{
        return 'secondary';
    }
}

function icon_absen($id)
{
    if($id == 'hadir'){
        return 'check-square';
    }elseif($id == 'sakit'){
        return 'tired';
    }elseif($id == 'izin'){
        return 'clock';
    }elseif($id == 'alfa'){
        return 'user-times';
    }else{
        return 'times';
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
