<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // maintanance_check();
         $this->load->model('User_model', 'user');
        $this->load->model('Insert_model', 'insert');
        $this->load->model('Data_model', 'data');
        $this->load->model('Update_model', 'update');
        $this->load->model('Delete_model', 'delete');
        $this->load->model('Member_model', 'member');
        $this->load->model('Home_model', 'home');

    }

    public function index()
    {
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['title'] = $data['footer']['judul']; 
        $data['post'] = $this->home->getDataArticle();
        $data['slider'] = $this->home->getDataHomePageSlider();
        $data['profile'] = $this->home->getDataHomePageProfile();
        $data['services'] = $this->home->getDataHomePageServices();
        $data['service_row'] = $this->home->getDataHomePageServicesRow();
        $data['newsfeed'] = $this->home->getDataHomePageNewsFeed();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $data['foto'] = $this->home->getDataGallery(4);
        $data['bigSize'] = $this->home->getDataGalleryOne();

        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/carousel');
        $this->load->view('home/templates/about');
        $this->load->view('home/templates/services');
        $this->load->view('home/templates/portfolio');
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function about()
    {
        $data['title'] = 'About Us'; 
        $data['post'] = $this->home->getDataArticle();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/navlink', $data);
        $this->load->view('home/about/index', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function divisi()
    {
        $data['title'] = 'Divisi '; 
        $data['post'] = $this->home->getDataArticle();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/navlink', $data);
        $this->load->view('home/divisi/index', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function gallery()
    {
        $data['title'] = 'Gallery '; 
        $data['foto'] = $this->home->getDataGallery(100);
        $data['bigSize'] = $this->home->getDataGalleryOne();
        $data['post'] = $this->home->getDataArticle();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/navlink', $data);
        $this->load->view('home/gallery/index', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function portfolio()
    {
        $data['title'] = 'Portfolio '; 
        $data['post'] = $this->home->getDataArticle();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/navlink', $data);
        $this->load->view('home/portfolio/index', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function contact()
    {
        $data['title'] = 'Contact '; 
        $data['post'] = $this->home->getDataArticle();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/navlink', $data);
        $this->load->view('home/contact/index', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function article($id)
    {
        lihatpost($id);
        $data['article'] = $this->home->getArticleRead($id);
        $data['substitle'] = $data['article']['judul'];
        $data['title'] = 'Article'; 
        $data['post'] = $this->home->getDataArticle();
        $data['komentar'] = $this->home->getDataKomentar($id);
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/artlink', $data);
        $this->load->view('home/article/open', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function blog()
    {
        $data['title'] = 'Article';
        $data['blog'] = $this->home->getDatablog();
        $data['post'] = $this->home->getDataArticle();
        $data['testimonial'] = $this->home->getDataHomePageTestimonials();
        $data['footer'] = $this->home->getDataHomePageFooter();
        $data['contact'] = $this->home->getDataHomePageContact();
        $data['sponsor'] = $this->home->getDataHomePageSponsorAktif();
        $data['sosmed'] = $this->home->getDataHomePageSosmedAktif();
        $this->load->view('home/templates/header', $data);
        $this->load->view('home/templates/navlink', $data);
        $this->load->view('home/article/index', $data);
        $this->load->view('home/templates/contact');
        $this->load->view('home/templates/footer');
    }

    public function event()
    {
        $this->load->view('home/templates/error');
    }


    public function team()
    {
        $this->load->view('home/templates/error');
    }


    public function services()
    {
        $this->load->view('home/templates/error');
    }


    public function forum()
    {
        $this->load->view('home/templates/error');
    }


    public function help()
    {
        $this->load->view('home/templates/error');
    }


    public function privacy()
    {
        $this->load->view('home/templates/error');
    }


    public function checkcert()
    {
        $this->load->view('home/templates/error');
    }

}