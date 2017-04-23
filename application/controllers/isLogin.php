<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IsLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('logged_in');
        return isset($user);
    }
}
