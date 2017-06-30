<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('User_Model');
        $this->load->helper('form', 'url');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    public function index() {

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le nom doit faire 3 caractères minimum',
        ));
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|alpha_dash|callback_session', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le mot de passe doit faire 5 caractères minimum',
            'alpha_dash' => 'Le mot de passe ne doit contenir que des caractères alpha-numérique, des _ ou des -'
        ));

        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

    function session($password) {
        $username = $this->input->post('email');
        $result = $this->User_Model->login($email, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = $arrayName = array('email' => $row->username, 'password' => $row->fullname);
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return true;
        } else {
            $this->form_validation->set_message('Invalid email or password :/'); //'basisdata_cek',
            return false;
        }
    }

}
