<?php
    class User extends CI_Model {
        
        function get_user_by_id($user_id)
        {
            return $this->db->query("SELECT * FROM users WHERE user_id = ?", array($user_id))->row_array();
        }
        function get_user_by_email($user_email)
        {
            return $this->db->query("SELECT * FROM users WHERE email = ?", array($user_email))->row_array();
        }
        function login_validate()
        {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("email", "email/password is invalid, ", "trim|required|min_length[5]|max_length[45]|valid_email");
            $this->form_validation->set_rules("password", "email/password is invalid, ", "trim|required|min_length[8]|max_length[25]");
            if($this->form_validation->run() == false)
            {
                $view_data["errors_login"] = validation_errors();
                $this->session->set_flashdata('errors_login',$view_data["errors_login"]);
                return false;
            }
            else
            {
                $password = $this->input->post('password');
                $password = md5($password);
                $user_data = array("email" => $this->input->post('email'), 
                    "password" => $password,
                    );
                $check_match = $this->get_user_by_email($user_data['email']);
                if(empty($check_match))
                {
                    $view_data["errors_login"] = "<p>Account doesn't exist.</p>";
                    $this->session->set_flashdata('errors_login',$view_data["errors_login"]);
                    return false;
                }
                else if($user_data['password'] != $check_match['password'])
                {
                    $view_data["errors_login"] = "<p>Password is incorrect.</p>";
                    $this->session->set_flashdata('errors_login',$view_data["errors_login"]);
                    return false;
                }
                else
                {
                    $this->session->set_userdata('user_id', $check_match["user_id"]);
                    $this->session->set_userdata('user_level', $check_match["user_level"]);
                    return true;
                }
            }
        }
        function get_user_info($user_id)
        {
            return $this->db->query("SELECT user_id, username, first_name, last_name, contact, email FROM users WHERE user_id = ?", array($user_id))->row_array();
        }
        function register_validate()
        {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("first_name", "first name is invalid, ", "trim|required|min_length[2]|max_length[25]");
            $this->form_validation->set_rules("last_name", "last name is invalid, ", "trim|required|min_length[2]|max_length[25]");
            $this->form_validation->set_rules("email", "email is invalid, ", "trim|required|min_length[5]|max_length[45]|valid_email|is_unique[users.email]");
            $this->form_validation->set_rules("password", "password is invalid, ", "trim|required|min_length[8]|max_length[25]");
            $this->form_validation->set_rules("password2", "confirm password is invalid, ", "trim|required|min_length[8]|max_length[25]|matches[password]");
            if($this->form_validation->run() === FALSE)
            {
                $view_data["errors_register"] = validation_errors();
                $this->session->set_flashdata('errors_register',$view_data["errors_register"]);
                return false;
            }
            else
            {
                $password = $this->input->post('password');
                $password = md5($password);
                $user_data = array("first_name" => $this->input->post('first_name'), 
                    "last_name" => $this->input->post('last_name'),
                    "email" => $this->input->post('email'),
                    "password" => $password,
                    );
                $update_user = $this->add_user($user_data);
                $this->session->set_flashdata('success_register',"<p>Registration Successful</p>");
                return true;
            }
        }
        function profile_info_validate()
        {
            $this->load->library("form_validation");
            $current_user_info = $this->User->get_user_info($this->session->userdata('user_id'));
            $this->form_validation->set_rules("first_name", "first name is invalid, ", "trim|required|min_length[2]|max_length[25]");
            $this->form_validation->set_rules("last_name", "last name is invalid, ", "trim|required|min_length[2]|max_length[25]");
            if($this->input->post('email') == $current_user_info['email'])
            {
            }
            else
            {
                $this->form_validation->set_rules("email", "email is invalid, ", "trim|required|min_length[5]|max_length[45]|valid_email|is_unique[users.email]");
            }
            if($this->form_validation->run() === FALSE)
            {
                $view_data["errors_profile_info"] = validation_errors();
                $this->session->set_flashdata('errors_profile_info',$view_data["errors_profile_info"]);
                return false;
            }
            else
            {
                $user_data = array("first_name" => $this->input->post('first_name'), 
                    "last_name" => $this->input->post('last_name'),
                    "email" => $this->input->post('email')
                    );
                $edit_user = $this->edit_user($user_data);
                $this->session->set_flashdata('success_profile_info',"<p>Updated user information successfully</p>");
                return true;
            }
        }
        function profile_pass_validate()
        {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("old_password", "old password is invalid, ", "trim|required|min_length[8]|max_length[25]");
            $this->form_validation->set_rules("password", "new password is invalid, ", "trim|required|min_length[8]|max_length[25]");
            $this->form_validation->set_rules("password2", "confirm password is invalid, ", "trim|required|min_length[8]|max_length[25]|matches[password]");
            if($this->form_validation->run() === FALSE)
            {
                $view_data["errors_profile_pass"] = validation_errors();
                $this->session->set_flashdata('errors_profile_pass',$view_data["errors_profile_pass"]);
                return false;
            }
            else
            {
                $old_password = $this->input->post('old_password');
                $old_password = md5($old_password);
                $check_match = $this->User->get_user_by_id($this->session->userdata('user_id'));
                if($old_password != $check_match['password'])
                {
                    $view_data["errors_profile_pass"] = "<p>Old Password is incorrect.</p>";
                    $this->session->set_flashdata('errors_profile_pass',$view_data["errors_profile_pass"]);
                    return false;
                }
                else
                {
                    $password = $this->input->post('password');
                    $password = md5($password);
                    $user_data = array("password" => $password);
                    $edit_user = $this->edit_user_pass($user_data);
                    $this->session->set_flashdata('success_profile_pass',"<p>Updated user password successfully</p>");
                    return true;
                }
            }
        }
        function add_user($user)
        {
            $query = "INSERT INTO users(first_name, last_name, email, password) VALUES (?,?,?,?)";
            $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password']); 
            return $this->db->query($query, $values);
        }
        function edit_user($user)
        {
            $query = "UPDATE users SET first_name = ?, last_name =?, email =? where user_id = ?";
            $values = array($user['first_name'], $user['last_name'], $user['email'], $this->session->userdata['user_id']); 
            return $this->db->query($query, $values);
        }
        function edit_user_pass($password)
        {
            $query = "UPDATE users SET password = ? where user_id = ?";
            $values = array($password, $this->session->userdata['user_id']); 
            return $this->db->query($query, $values);
        }
    }
?>