<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    $this->load->helper('user');
  }

  function index()
  {
    $data['title'] = 'Home | Lion Air';
    $this->load->view('user/v_home', $data);
  }

  function term_condition()
  {
    $this->load->view('user/v_term_condition');
  }

  function cari_booking($kd_booking)
  {
    $where = array(
			'tb_booking.kd_booking' => strtoupper($kd_booking)
		);

    $where2 = array(
      'tb_booking.status' => 'Confirmed'
    );

    $where3 = array(
      'tb_refund.refund_status' => 'onproses'
    );

    $data['booking'] = strtoupper($kd_booking);
    $data['pessenger'] = $this->m_user->cariPessenger($where, $where2)->result();
    $data['penerbangan'] = $this->m_user->cariPenerbangan($where, $where2)->result();
    $data['refund'] = $this->m_user->cariRefund($where, $where3)->num_rows();
    $data['jumlah'] = $this->m_user->cariPessenger($where, $where2)->num_rows();
    $data['verifikasi'] = sprintf("%03s", kodeVerifikasi(6));

    echo json_encode($data);
  }

  function form_refund($kd_booking)
  {
    $data['booking'] = $kd_booking;
    $this->load->view('user/v_form_refund', $data);
  }

  function proses_refund()
  {
    $post = $this->input->post();
    $tiket = array();
    $penerbangan = array();
    // $total_post = count($post['no_tiket']);

    $kode = 'RF'.sprintf("%03s", buatKode(4));

    $data = array(
      'no_refund' => $kode,
      'kd_booking' => $this->input->post('kd_booking'),
      'refund_name' => $this->input->post('refund_gelar').' '.$this->input->post('refund_first').' '.$this->input->post('refund_last'),
      'refund_alamat' => $this->input->post('refund_alamat'),
      'refund_telepon' => $this->input->post('refund_telepon'),
      'refund_email' => $this->input->post('refund_email'),
      'total_refund' => $this->input->post('total_refund'),
      'refund_status' => 'onproses',
      'nama_bank' => $this->input->post('nama_bank'),
      'cabang' => $this->input->post('cabang'),
      'no_rekening' => $this->input->post('no_rekening'),
      'nama_rekening' => $this->input->post('nama_rekening')
    );

    foreach($post['no_tiket'] AS $key => $val)
    {
      $tiket[] = array(
        'no_refund' => $kode,
        'no_tiket' => $post['no_tiket'][$key]
      );
    }

    foreach($post['no_penerbangan'] AS $key => $val)
    {
      $penerbangan[] = array(
        'no_refund' => $kode,
        'no_penerbangan' => $post['no_penerbangan'][$key]
      );
    }

    $cek = $this->m_user->saveRefund($data);
    if($cek) {
      $cek2 = $this->m_user->saveRefundPessenger($tiket);
      if($cek2) {
        $cek3 = $this->m_user->saveRefundDetail($penerbangan);
        if($cek3) {
          echo "berhasil";
        } else {
          echo "gagal";
        }
      } else {
        echo "gagal";
      }
    } else {
      echo "gagal";
    }
  }

  function form_reschedule($kd_booking)
  {
    $data['booking'] = $kd_booking;
    $this->load->view('user/v_form_reschedule', $data);
  }

  function mailKode()
  {

    $kode = sprintf("%03s", kodeVerifikasi(6));
    $email_pic = $this->input->post('email_pic');

    $config = array();
    $config['protocol']   = 'smtp';
    $config['smtp_host']  = 'ssl://smtp.gmail.com';
    $config['smtp_port']  = '465';
    $config['smtp_timeout'] = '5';
    $config['smtp_user']  = 'viz.ndinq@gmail.com';
    $config['smtp_pass']  = 'haviz06142';
    $config['mail_type']  = 'html';
    $config['charset']     = 'iso-8859-1';
    // $config['charset']     = 'utf-8';
    $config['wordwrap']    = TRUE;
    // $config['newline']     = "\r\n";

    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $this->email->from('Lionair@group.com','Lion Air');
    $this->email->to($email_pic);
    $this->email->subject('Refund Verification Kode');
    $message = '<p>Hi, Your Code Verification is <b>'.$kode.'</b></p>';
    $this->email->message($message);

    $cek = $this->email->send();

    if($cek)
    {
      echo $kode;
    } else {
      echo "gagal";
      // show_error($this->email->print_debugger());
    }
  }

}
