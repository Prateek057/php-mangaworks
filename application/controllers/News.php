<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 1/15/2017
 * Time: 7:22 PM
 */
class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->library('session');
        $data['user_item'] = $this->session->userdata('username');

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
        $data['active'] = 'news';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/fixed-navbar', $data);
        $this->load->view('news/index', $data);
        //$this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $this->load->library('session');
        $data['user_item'] = $this->session->userdata('username');

        $data['news_item'] = $this->news_model->get_news($slug);
        $data['active'] = 'news';

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/fixed-navbar', $data);
        $this->load->view('news/view', $data);
        //$this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->library('session');
        $data['user_item'] = $this->session->userdata('username');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        $data['active'] = 'create';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required' );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Missing! </strong>', '</div>'
        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/fixed-navbar', $data);
            //$this->load->view('news/fail');
            $this->load->view('news/create');
            //$this->load->view('templates/footer');

        } else {
            $this->news_model->set_news();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/fixed-navbar', $data);
            $this->load->view('news/success');
            $this->load->view('news/create');
        }
    }
}