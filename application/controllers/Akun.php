<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_akun');
    //Codeigniter : Write Less Do More
  }

  function loginuser()
  {
    $email        = $this->input->post('email');
    $password     = $this->input->post('password');

    $data = array(
      'email'    => $email,
      'password' => md5($password)
    );

            $cek = $this->m_akun->logincek($data);
            if($cek->num_rows() > 0 )
            {
              foreach($cek->result() as $key)
              {
                $email  = $key->email;
                $status = $key->status;
              }

              $session = array(
                'email' => $email,
                'status' => $status

              );

              $this->session->set_userdata($session);
            }
            if($status == 1){
              redirect(base_url('user/home') );
            }else{
              $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Email Belum Di Konfirmasi, Silahkan Konfirmasi Terlebih Dahulu </div>');
              redirect(base_url('home') );
            }
  }


  public function registeruser()
  {
    $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
    $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
    $this->form_validation->set_rules('email', 'Email', 'is_unique[t_user.email]');
    $this->form_validation->set_message('is_unique','this %s id Already Exist');

    if($this->form_validation->run() == FALSE)
    {
      $data['title'] = 'Registrasi Gagal | Lion Air';
      $this->load->view('user/include/header', $data);
      $this->load->view('user/v_home');
      $this->load->view('user/include/footer');
    }
    else
    {
      $nd   = $_POST['nama_depan'];
      $nb   = $_POST['nama_belakang'];
      $em   = $_POST['email'];
      $tlp  = $_POST['no_telp'];
      $pass = $_POST['password'];

      $passhash  = hash('md5', $pass);
      $emailhash = md5($em);
      $status    = 0;

      $data = array(
        'nama_Depan'    => $nd,
        'nama_belakang' => $nb,
        'email'         => $em,
        'password'      => $passhash,
        'no_telp'       => $tlp,
        'status'        => $status
      );
                  if($this->m_akun->insertuser($data) )
                  {
                            if($this->sendemail($em, $emailhash) )
                            {
                              //successfull email
                                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Silahkan Konfirmasi Di Email Kamu </div>');
                                redirect(base_url('home'));
                            }
                            else
                             {
                              //failed email
                                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Gagal Mengirim Email </div>');
                                redirect(base_url('home'));
                            }
                  }
                  else {
              //error email
                  $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Ada Kesalahan </div>');
                  redirect(base_url());
                  }

    }
  }//end functions

  public function sendemail($em, $emailhash)
  {

    $config['protocol']   = 'smtp';
    $config['smtp_host']  = 'ssl://smtp.gmail.com';
    $config['smtp_port']  = '465';
    $config['smtp_user']  = 'wahyualfarisi30@gmail.com';
    $config['smtp_pass']  = 'wahyuais@#$';
    $config['mail_type']  = 'html';
    $config['charset']     = 'iso-8859-1';
    $config['wordwrap']    = TRUE;
    $config['newline']     = "\r\n";


    $this->email->initialize($config);
    $url = base_url()."akun/confirmation/".$emailhash;
    $this->email->from('Lionair@group.com','Lion Air');

    $this->email->to($em);
    $this->email->subject('Verifikasi Akun');
    $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with CodesQuery.</p><p>Please click below link to verify your email.</p>".$url."<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";
    $this->email->message($message);
    return $this->email->send();
  }


  public function confirmation($key)
  {
    if($this->m_akun->verifyEmail($key) )
    {
      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Email Berhasil Di Konfirmasi . Silahkan Login </div>');
      redirect(base_url('home'));
    }
    else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Maaf .. Email Gagal Di Konfirmasi </div>');
      redirect(base_url('home'));
    }
  }



}
