 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Memori_model extends CI_Model
{

    public function getMemoriAll()
    {
    // http://stackoverflow.com/a/21409562/1163000
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

       return $size= number_format((get_directory_size('') / 1024 / 1024),2);
       return $sizeApp= number_format((get_directory_size('application') / 1024 / 1024),2);
       return $sizeAss= number_format((get_directory_size('assets') / 1024 / 1024),2);
       return $sizeCss= number_format((get_directory_size('assets/css') / 1024 / 1024),2);
       return $sizeImg= number_format((get_directory_size('assets/img') / 1024 / 1024),2);
       return $sizeImgProfil= number_format((get_directory_size('assets/img/profile') / 1024 / 1024),2);
       return $sizeImgMember= number_format((get_directory_size('assets/img/member') / 1024 / 1024),2);
       return $sizeImgArtikel= number_format((get_directory_size('assets/img/artikel') / 1024 / 1024),2);
       return $sizeImgPost= number_format((get_directory_size('assets/img/data_post') / 1024 / 1024),2);
       return $sizeImgOrder= number_format((get_directory_size('assets/img/img-logo') / 1024 / 1024),2);
       return $sizeAssMore= number_format((get_directory_size('assets') / 1024 / 1024) - (get_directory_size('assets/css') / 1024 / 1024) - (get_directory_size('assets/img') / 1024 / 1024) - (get_directory_size('assets/js') / 1024 / 1024) ,2);
       return $data['sizeJs'] = number_format((get_directory_size('assets/js') / 1024 / 1024),2);
       return $data['sizeMore'] = number_format((get_directory_size('') / 1024 / 1024) - (get_directory_size('assets') / 1024 / 1024) - (get_directory_size('application') / 1024 / 1024) ,2);

    }

}