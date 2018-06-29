<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_system');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('v_systemlog');
  }

  function checklogin()
  {
    $email    = $this->input->post('email');
    $password = $this->input->post('password');
    $level    = $this->input->post('level');

    $data = array(
      'email'    => $email,
      'password' => md5($password),
      'level'    => $level
    );

    $check = $this->m_system->checkdata($data);
    if($check->num_rows() > 0 )
    {
      foreach($check->result() as $key)
      {
        $email = $key->email;
        $level = $key->level;
      }
      $session = array(
        'email' => $email,
        'level' => $status,
        'login' => 1
      );
      $this->session->set_userdata($session);

      if($level == 'admin'){
        $this->session->set_flashdata('notifadmin', 'Selamat datang '.$email);
        redirect('adm/dashboard');

      }else if($level == 'accounting'){
        redirect('accounting/dashboard');
      }else{
        redirect('admin');
      }
    }else{
      redirect('admin');
    }

  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin'));
  }


}
