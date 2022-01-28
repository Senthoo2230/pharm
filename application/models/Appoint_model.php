<?php
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Appoint_model extends CI_Model 
{
    public function insert_appoint($nic,$pname,$mobile,$area,$doctor,$tym,$comment){
        $data = array(
            'nic' => $nic,
            'name' => $pname,
            'mobile' => $mobile,
            'area' => $area,
            'doctor' => $doctor,
            'time' => $tym,
            'comment' => $comment,
        );
    
        $this->db->insert('appoint', $data);
    }

    public function appoints(){
        $sql = "SELECT * FROM appoint ORDER BY created DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
}