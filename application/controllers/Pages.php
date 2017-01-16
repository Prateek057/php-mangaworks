<?php
/**
 * Created by PhpStorm.
 * User: Prateek Bagrecha
 * Date: 1/15/2017
 * Time: 7:01 PM
 */

class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->library('session');
        $data['user_item'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/fixed-navbar', $data);
        $this->load->view('pages/'.$page, $data);
        //$this->load->view('templates/footer', $data);
    }
}