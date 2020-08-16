<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Insert_model', 'insert');
        $this->load->model('Data_model', 'data');
        $this->load->model('Update_model', 'update');
        $this->load->model('Delete_model', 'delete');
        $this->load->model('Member_model', 'member');
        $this->load->model('Backend_model', 'backend');
        $this->load->model('Home_model', 'home');
         if ($this->session->userdata('role_id') != 1) {
                redirect('data/user/');
        }
    }

    public function homepage()
    {
        $data['title'] = 'Homepage';
        $data['user'] = $this->user->getUserSession();
        $data['homepage'] = $this->home->getDataHomePage();
        $data['dataslider'] = $this->home->getDataHomePageSlider();
        $data['dataservices'] = $this->home->getDataHomePageServices();
        $data['dataprofile'] = $this->home->getDataHomePageProfile();
        $data['datatestimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsor();
        $data['sosmed'] = $this->home->getDataHomePageSosmed();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/homepage/index', $data);
        $this->load->view('templates/footer');
    }


    public function slider($id)
    {
        $data['title'] = 'Edit Gambar Slider';
        $data['user'] = $this->user->getUserSession();
        $data['dataslider'] = $this->home->getDataHomePagePerId($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/homepage/slider', $data);
        $this->load->view('templates/footer');
    }

    public function testimonial($id)
    {
        $data['title'] = 'Edit Gambar Testimonial';
        $data['user'] = $this->user->getUserSession();
        $data['dataslider'] = $this->home->getDataHomePagePerId($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/homepage/testimonial', $data);
        $this->load->view('templates/footer');
    }

    public function footer($id)
    {
        $data['title'] = 'Edit Gambar Footer';
        $data['user'] = $this->user->getUserSession();
        $data['dataslider'] = $this->home->getDataHomePagePerId($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/homepage/footer', $data);
        $this->load->view('templates/footer');
    }

    public function insert($id)
    {
        if($id == 'slider'){
            $this->insert->dataHomePageSlider();
        }elseif($id == 'services'){
            $this->insert->dataHomePageServices();
        }elseif($id == 'testimonial'){
            $this->insert->dataHomePageTestimonial();
        }elseif($id == 'sponsor'){
            $this->insert->dataHomePageSponsor();
        }
    }

    public function update($id)
    {
        if($id == 'profile'){
            $this->update->dataHomePageProfile($id);
        }elseif($id == 'services'){
            $this->insert->dataHomePageServices();
        }
    }


}