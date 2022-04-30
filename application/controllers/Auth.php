<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        check_already_login();
        $this->load->view('utilities/login');
    }


    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'user_id' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                redirect('/dashboard');
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Password Salah, Coba Lagi");';
                echo 'window.location.href = "/toko_bunda/auth/login";';
                echo '</script>';
            }
        }
    }

    public function logout()
    {
        $params = array('user_id', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}


/* End of file Auth.php */
