<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model{

  function insertuser($data)
  {
    return $this->db->insert('t_user', $data);
  }

  function verifyEmail($key)
  {
    $data = array('status' => 1);
    $this->db->where('md5(email)', $key);
    return $this->db->update('t_user', $data);
  }
  function logincek($data)
  {
    $this->db->select('*');
    $this->db->from('t_user');
    $this->db->where($data);

    return $this->db->get();
  }
  function chekduplicate($email)
  {
    $where = array(
      'email' => $email
    );
     return $this->db->get_where('t_user', $where);

  }

}
