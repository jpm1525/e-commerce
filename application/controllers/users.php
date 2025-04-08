<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model("User");
            if(empty($this->session->userdata('user_id')))
            {
                $this->session->set_flashdata('user_id_exist', true);
            }
        }
        public function login()
        {
            $user_data['user_id'] = $this->session->userdata('user_id');
            if(!empty($user_data['user_id']))
            {
                redirect("../");
            }
            $this->session->keep_flashdata('users');
            $this->load->view('users/login');
        }
        public function register()
        {
            $user_data['user_id'] = $this->session->userdata('user_id');
            if(!empty($user_data['user_id']))
            {
                redirect("../");
            }
            $this->session->keep_flashdata('users');
            $this->load->view('users/register');
        }
        public function register_process()
        {
            $valid = $this->User->register_validate($this->input->post(NULL, TRUE));
            if($valid == false)
            {
                $this->session->keep_flashdata('errors_register');
                redirect("../users/register");
            }
            else
            {
                $this->session->keep_flashdata('success_register');
                redirect("../users/register");
            }
        }
        public function profile_process_info()
        {
            $valid = $this->User->profile_info_validate($this->input->post(NULL, TRUE));
            if($valid == false)
            {
                $this->session->keep_flashdata('errors_profile_info');
                redirect("../users/profile");
            }
            else
            {
                $this->session->keep_flashdata('success_profile_info');
                redirect("../users/profile");
            }
        }
        public function profile_process_pass()
        {
            $valid = $this->User->profile_pass_validate($this->input->post(NULL, TRUE));
            if($valid == false)
            {
                $this->session->keep_flashdata('errors_profile_pass');
                redirect("../users/profile");
            }
            else
            {
                $this->session->keep_flashdata('success_profile_pass');
                redirect("../users/profile");
            }
        }
        public function login_process()
        {
            $valid = $this->User->login_validate($this->input->post(NULL, TRUE));
            if($valid == false)
            {
                $this->session->keep_flashdata('errors_login');
                redirect("../users/login");
            }
            else
            {
                $this->session->keep_flashdata('success_register');
                $this->session->set_flashdata('user_id_exist', false);
                redirect("../dashboards");
            }
        }
        public function profile()
        {
            if(empty($this->session->userdata('user_id')))
            {
                redirect("../");
            }
            $view_data = array( 'page_title' => 'Profile');
            $this->load->view('partials/header', $view_data);
            $this->load->view('users/profile');
            $this->load->view('partials/footer');
        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect("../users/login");
        }
    }
?>