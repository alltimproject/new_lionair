<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_refund extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('acakhuruf');
  }
  // function get_refund()
  // {
  //   //parsing json encode
  //   $this->db->select('*');
  //   $this->db->from('tb_refund');
  //   $this->db->where('refund_status', 'onproses');
  //   return $this->db->get();
  // }
  function get_refund_verify()
  {
    //parsing json encode
    $this->db->select('*');
    $this->db->from('tb_refund');
    $this->db->where('refund_status','verify');
    return $this->db->get();
  }
  function get_refund_today()
  {
    $query = $this->db->query("SELECT NOW(), no_refund FROM tb_refund WHERE refund_status = 'onproses' ");
    return $query;
  }


  function get_refund()
  {
    $this->db->select('*');
    $this->db->from('tb_refund');
    $this->db->join('tb_pessenger','tb_pessenger.no_tiket = tb_refund.no_tiket');
    $this->db->where('refund_status', 'onproses');

    return $this->db->get()->result();
  }

  //num rows ----
  function getwhererefund($where)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_pessenger');
    $this->db->where('no_refund',$where);
    return $this->db->get();
  }
  function getwhererefund_pessenger($where)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_pessenger');
    $this->db->join('tb_refund', 'tb_refund.no_refund = tb_refund_pessenger.no_refund');
    $this->db->where($where);
    return $this->db->get();
  }
  function getrefunddetail($norefund)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_detail');
    $this->db->where('no_refund', $norefund);
    return $this->db->get();
  }
  function getpessenger($dataKODE)
  {
    $this->db->select('*');
    $this->db->from('tb_pessenger');
    $this->db->where($dataKODE);

    return $this->db->get();
  }
  function getdetailpener($kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_detail');
    $this->db->where('kd_booking', $kd_booking);

    return $this->db->get();
  }
  function getpenerbanganRefund($norefund,$wherekdbooking)
  {
    $this->db->select('*');
    $this->db->from('tb_penerbangan');
    $this->db->join('tb_refund_detail','tb_refund_detail.no_penerbangan = tb_penerbangan.no_penerbangan');
    $this->db->join('tb_detail','tb_detail.no_penerbangan = tb_penerbangan.no_penerbangan');
    $this->db->where('tb_refund_detail.no_refund', $norefund);
    $this->db->where($wherekdbooking);
    return $this->db->get();
  }
  //not Penerbangan
  function notPenerbangan($kd_booking, $no_penerbangan)
  {
  $query = "SELECT * FROM tb_detail WHERE kd_booking = '$kd_booking' AND NOT no_penerbangan = '$no_penerbangan' ";
  return $this->db->query($query);
  }
  function getTiketRefund($norefund)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_pessenger');
    $this->db->join('tb_pessenger','tb_pessenger.no_tiket = tb_refund_pessenger.no_tiket');
    $this->db->where('tb_refund_pessenger.no_refund', $norefund);

    return $this->db->get();
  }
  function getrefundall()
  {
    return $this->db->get('tb_refund')->result();
  }
  function getdetailRefund($where)
  {
    $this->db->select('*');
    $this->db->from('tb_refund');
    $this->db->where($where);
    return $this->db->get()->result();
  }


  function check_refund_tiket($where)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_pessenger');
    $this->db->join('tb_refund','tb_refund.no_refund = tb_refund_pessenger.no_refund');
    $this->db->join('tb_pessenger','tb_pessenger.no_tiket = tb_refund_pessenger.no_tiket');
    $this->db->where($where);
    $this->db->where('refund_status','onproses');


    return $this->db->get();
  }


  function check_penerbangan_kdbooking($where)
  {
    $this->db->select('*');
    $this->db->from('tb_detail');
    $this->db->join('tb_penerbangan', 'tb_penerbangan.no_penerbangan = tb_detail.no_penerbangan');
  }
  function chek_penerbagan_refund($where)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_detail');
    $this->db->join('tb_penerbangan', 'tb_penerbangan.no_penerbangan = tb_refund_detail.no_penerbangan');

    $this->db->where($where);

    return $this->db->get()->result();
  }

  function get_booking_kd($kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_booking');
    $this->db->where($kd_booking);
    return $this->db->get()->result();
  }

  function get_refund_tiket_byBooking($where)
  {
    $this->db->select('*');
    $this->db->from('tb_pessenger');
    $this->db->join('tb_booking','tb_booking.kd_booking = tb_pessenger.kd_booking');
    $this->db->join('tb_refund', 'tb_refund.no_tiket = tb_pessenger.no_tiket');
    $this->db->where($where);
    $this->db->where('tb_refund.refund_status','onproses');

    return $this->db->get()->result();
  }


  function deleterefund()
  {
    if(isset($_POST['cancelrefund'])){
      $keyrefund = $this->input->post('id_refund');
      for($i=0; $i<count($keyrefund); $i++)
      {
        $this->db->where('no_refund', $keyrefund[$i]);
        $this->db->delete('tb_refund');
      }
    }
  }


  function cancelrefund()
  {
    if(isset($_POST['cancelrefund'])){
      $data = array(
        'refund_status' => 'notverify'
      );
      $keyrefund = $this->input->post('no_refund');
      $this->db->where('no_refund', $keyrefund);
      $this->db->update('tb_refund', $data );
    }
  }

  function update_confirm_match_updatebooking()
  {
    $kd_booking = $this->input->post('kd_booking');
    $no_refund  = $this->input->post('no_refund');
    //---------------data 1 -----------------------
    $data = array( 'status' => 'RFN');
    $where = array('kd_booking' => $kd_booking);
    //-------------- data 2 -----------------------
    $where2 = array('no_refund' => $no_refund);
    $data2  = array(
      'refund_status' => 'Verify',
      'secure_code'   => md5($no_refund)
    );
    //---------------------------------------------
    $this->db->where($where);
    $this->db->update('tb_booking', $data);

    $this->db->where($where2);
    $this->db->update('tb_refund', $data2);
  }
  function update_confirm_match_refundstatus()
  {
    $norefund = $this->input->post('no_refund');
    $data = array(
      'refund_status' => 'Verify'
    );
    $where = array(
      'no_refund' => $norefund
    );
    $this->db->where($where);
    $this->db->update('tb_refund', $data);
  }

//----------------------------------------------------------
  function confirm_matchpenerbangan_updatebooking()
  {
    //data booking
    $data_gelar       = $this->input->post('data_gelar');
    $data_alamat      = $this->input->post('data_alamat');
    $data_telp        = $this->input->post('data_telp');
    $data_tipebooking = $this->input->post('data_tipebooking');
    //------------

    $no_refund     = $this->input->post('no_refund');
    $nama_depan    = $this->input->post('nama_depan');
    $nama_belakang = $this->input->post('nama_belakang');
    $nama_lengkap  = $this->input->post('namalengkap');
    $email         = $this->input->post('email');

    $data = array(
      'kd_booking'     => $no_refund,
      'status'         => 'RFN',
      'tipe_booking'   => $data_tipebooking,
      'gelar'          => $data_gelar,
      'alamat'         => $data_alamat,
      'no_tlp'         => $data_telp,
      'nama_depan'     => $nama_depan,
      'nama_belakang'  => $nama_belakang,
      'email'          => $email
    );
    $this->db->insert('tb_booking', $data);

  }

  function insertdetail()
  {

    $norefund_pener = $this->input->post('no_refund_penerbangan');
    $no_penerbangan = $this->input->post('no_penerbangan');

    $count = count($norefund_pener);
    $sql   = "INSERT INTO tb_detail (kd_booking,no_penerbangan) VALUES ";
    for($i=0; $i<$count; $i++)
    {
      $sql .= "('{$norefund_pener[$i]}','{$no_penerbangan[$i]}')";
      $sql .= ",";
    }
    $sql    = rtrim($sql, ",");
    $insert = $this->db->query($sql);

  }

  function updatePessenger()
  {
    $no_tiket = $this->input->post('no_tiket');
    $norefund = $this->input->post('no_refund');
    $data = array(
      'kd_booking' => $norefund
    );
    $data2 = array(
      'refund_status' => 'Verify',
      'secure_code'   => md5($norefund)
    );
    for($i=0; $i<count($no_tiket); $i++)
    {
      $this->db->where('no_tiket', $no_tiket[$i]);
      $this->db->update('tb_pessenger', $data);
    }
    $this->db->where('no_refund', $norefund);
    $this->db->update('tb_refund',$data2 );

  }

  function confirmrefund()
  {
    if(isset($_POST['confirmrefund'])){
      $keyrefund = $this->input->post('id_refund');
      $data = array(
        'refund_status' => 'verify'
      );

      for($i=0; $i<count($keyrefund); $i++)
      {
        $this->db->where('no_refund', $keyrefund[$i]);
        $this->db->update('tb_refund', $data);
      }
    }
  }



  //---------------------------------------------------
  //aksion 3
  function deletedetailmaster()
  {
    $kd_booking      = $this->input->post('kd_booking');
    $no_penerbangan  = $this->input->post('no_pener');

    $where = array(
      'kd_booking'      => $kd_booking,
      'no_penerbangan'  => $no_penerbangan
    );
    $this->db->where($where);
    $this->db->delete('tb_detail');

  }

  function insertPessenger()
  {
    $no_tiket       = $this->input->post('no_tiket');
    $nama_pessenger = $this->input->post('nama_pessenger');
    $tgl_lahir      = $this->input->post('tgl_lahir');
    $tipe_pessenger = $this->input->post('tipe_pessenger');
    $kd_booking     = $this->input->post('kd_booking_tiket');

    echo '<pre>';
    echo print_r($no_tiket);
    echo print_r($nama_pessenger);
    echo print_r($tgl_lahir);
    echo print_r($tipe_pessenger);
    echo print_r($kd_booking);
    echo '</pre>';

    $count = count($no_tiket);
    $sql   = "INSERT INTO tb_pessenger (no_tiket, nama_pessenger, tipe_pessenger, tgl_lahir, kd_booking) VALUES ";
    for($i=0; $i<$count; $i++)
    {
      $sql .= "('{$no_tiket[$i]}','{$nama_pessenger[$i]}','{$tipe_pessenger[$i]}','$tgl_lahir[$i]','$kd_booking[$i]')";
      $sql .= ",";
    }
    $sql  = rtrim($sql, ",");
    $insert = $this->db->query($sql);
    if($insert){
      echo "berhasil";
    }else{
      echo "gagal";
    }
  }



  //test agar ini tidak berfungsi ini tidak terpakai
  function insertNewkodeBooking()
  {
    $no_refund      = $this->input->post('no_refund');
    $nama_depan     = $this->input->post('nama_depan');
    $nama_belakang  = $this->input->post('nama_belakang');
    $nama_lengkap   = $this->input->post('namalengkap');
    $email          = $this->input->post('email');

    $data = array(
      'kd_booking'     => $no_refund,
      'status'         => 'RFN',
      'nama_depan'     => $nama_depan,
      'nama_belakang'  => $nama_belakang,
      'email'          => $email
    );
    $this->db->insert('tb_booking', $data);
  }





  function match_insert_new_kodebooking()
  {
    $acakhuruf        = $this->input->post('acakhuruf');
    //data booking
    $data_gelar       = $this->input->post('data_gelar');
    $data_alamat      = $this->input->post('data_alamat');
    $data_telp        = $this->input->post('data_telp');
    $data_tipebooking = $this->input->post('data_tipebooking');
    //---------------------------------------------------------

    //---------------------------------------------------------
    $no_refund     = $this->input->post('no_refund');
    $nama_depan    = $this->input->post('nama_depan');
    $nama_belakang = $this->input->post('nama_belakang');
    $nama_lengkap  = $this->input->post('namalengkap');
    $email         = $this->input->post('email');
    //---------------------------------------------------------

    //array--------------------------------------------------------------
    $no_refund_penerbangan = $this->input->post('no_refund_penerbangan');
    $no_penerbangan        = $this->input->post('no_penerbangan');
    //-------------------------------------------------------------------
    //not penerbangan
    $not_penerbangan = $this->input->post('notPenerbangan');
    //----------------


    //kode booking baru generate-----------------------------
    $data = array(
      'kd_booking'     => $acakhuruf,
      'status'         => 'Confirmed',
      'tipe_booking'   => $data_tipebooking,
      'gelar'          => $data_gelar,
      'alamat'         => $data_alamat,
      'no_tlp'         => $data_telp,
      'nama_depan'     => $nama_depan,
      'nama_belakang'  => $nama_belakang,
      'email'          => $email
    );
    $this->db->insert('tb_booking', $data);

    $datadetail = array(
      'kd_booking' => $acakhuruf,
      'no_penerbangan' => $not_penerbangan
    );
    $this->db->insert('tb_detail', $datadetail);
    $this->updatePessengermatch();



    //kode booking refund insert ------------------------------
    $data2 = array(
      'kd_booking'     => $no_refund,
      'status'         => 'RFN',
      'tipe_booking'   => $data_tipebooking,
      'gelar'          => $data_gelar,
      'alamat'         => $data_alamat,
      'no_tlp'         => $data_telp,
      'nama_depan'     => $nama_depan,
      'nama_belakang'  => $nama_belakang,
      'email'          => $email
    );
    $this->db->insert('tb_booking',$data2);
    //--------
    //post detail---------------------------------------------
    $post = $this->input->post();
    $array = array();
    foreach($post['no_tiket'] AS $key => $val)
    {
      $dataArray[] = array(
        'no_tiket'       => $post['no_tiket'][$key],
        'nama_pessenger' => $post['nama_pessenger'][$key],
        'tgl_lahir'      => $post['tgl_lahir'][$key],
        'tipe_pessenger' => $post['tipe_pessenger'][$key],
        'kd_booking'     => $no_refund
      );
    }
    $this->saveDetail($dataArray);
    //---------------------------------------------------------


    //insert detail
    $count = count($no_refund_penerbangan);
    $sql   = "INSERT INTO tb_detail (kd_booking,no_penerbangan) VALUES ";
    for($i=0; $i<$count; $i++)
    {
      $sql .= "('{$no_refund_penerbangan[$i]}','{$no_penerbangan[$i]}')";
      $sql .= ",";
    }
    $sql    = rtrim($sql, ",");
    $insert = $this->db->query($sql);
    //-------------
  }

  // function last
  function saveDetail($result = array() )
  {
    $total_array = count($result);
    if($total_array != 0 )
    {
      return $this->db->insert_batch('tb_pessenger', $result);
    }
  }

  function updatePessengermatch()
  {
    $acakhuruf = $this->input->post('acakhuruf');
    //update passenger
    $no_tiket = $this->input->post('no_tiket');
    $norefund = $this->input->post('no_refund');
    $data = array(
      'kd_booking' => $acakhuruf
    );
    $data2 = array(
      'refund_status' => 'Verify',
      'secure_code'   => md5($norefund)
    );
    for($i=0; $i<count($no_tiket); $i++)
    {
      $this->db->where('no_tiket', $no_tiket[$i]);
      $this->db->update('tb_pessenger', $data);
    }
    $this->db->where('no_refund', $norefund);
    $this->db->update('tb_refund',$data2 );
  }
//---------------------------------------------------------------------







}
