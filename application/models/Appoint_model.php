<?php
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Appoint_model extends CI_Model 
{
    public function insert_appoint($id,$nic,$pname,$mobile,$address,$area,$doctor,$dcharge,$app_date,$tym,$comment){
        $data = array(
            'nic' => $nic,
            'name' => $pname,
            'mobile' => $mobile,
            'area' => $area,
            'doctor' => $doctor,
            'time' => $tym,
            'comment' => $comment,
            'id' => $id,
            'address' => $address,
            'doc_charge' => $dcharge,
            'app_date' => $app_date
        );
    
        $this->db->insert('appoint', $data);
    }

    public function appoints(){
        $sql = "SELECT * FROM appoint ORDER BY created DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function specials(){
        $sql = "SELECT * FROM specialization ORDER BY specialization ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function doctors($area){
        $sql = "SELECT * FROM doctor WHERE specialization = $area ORDER BY name ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function doctors_charge($doctor){
        $sql = "SELECT charge FROM doctor WHERE id = $doctor";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row->charge;
    }

    public function invoice_no(){
        $sql = "SELECT id FROM appoint ORDER BY created DESC";
        $query = $this->db->query($sql);
        $conut = $query->num_rows();
        $row = $query->first_row();

        if ($conut == 0) {
            return 1;
        }
        else{
            return $row->id+1;
        }
    }

    public function insert_other($other,$amount,$invoice_no){
        $data = array(
            'description' => $other,
            'charge' => $amount,
            'invoice_no' => $invoice_no
        );
    
        $this->db->insert('other_charge', $data);
    }

    public function other_charges($invoice_no){
        $sql = "SELECT * FROM other_charge WHERE invoice_no = $invoice_no";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
}