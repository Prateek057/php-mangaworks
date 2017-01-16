<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 1/16/2017
 * Time: 12:20 AM
 */

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url_helper');
    }

    public function login()
    {

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');


        $data['title'] = 'Login into MangaWorks';
        $data['active'] = 'login';
        $data['user_item'] = null;

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required' );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Missing! </strong>', '</div>'
        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/fixed-navbar', $data);
            $this->load->view('users/login');

        } else {
            $data['user_item'] = $this->users_model->get_user();
            $user = $data['user_item'];
            if($data['user_item'] == null){
                $this->load->view('templates/header', $data);
                $this->load->view('templates/fixed-navbar', $data);
                $this->load->view('users/login-fail');
                $this->load->view('users/login');
            }
            else{
                $this->session->set_userdata(array(
                    'username'      => $user->username
                ));
                $this->load->view('templates/header', $data);
                $this->load->view('templates/fixed-navbar', $data);
                $this->load->view('users/login-success');
            }
        }
    }

    public function register()
    {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $data['title'] = 'Register a new user';
        $data['active'] = 'register';
        $data['user_item'] = null;

            $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required' );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Missing! </strong>', '</div>'
        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/fixed-navbar', $data);
            $this->load->view('users/register');

        } else {
            $this->users_model->set_user();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/fixed-navbar', $data);
            $this->load->view('users/success');
        }
    }

    public function logout(){
        $this->load->library('session');
        $this->session->unset_userdata(array(
            'username' => $this->session->userdata('username')
        ));
        $this->session->sess_destroy();
        redirect('news/');
    }
}