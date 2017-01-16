<?php
/**
 * Created by PhpStorm.
 * User: Prateek Bagrecha
 * Date: 1/15/2017
 * Time: 7:18 PM
 */

class Users_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user()
    {
        $username  = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->get('users');
        foreach ($query->result() as $user)
        {
           if($user->username == $username && $user->password == $password){
               return $user;
           }
           else{
               return $user=null;
           }
        }

    }

    public function set_user()
    {

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        return $this->db->insert('users', $data);
    }


}