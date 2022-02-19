<?php
    class Student_Model extends CI_Model{

        public function subject()
        {
            $result = $this->db->order_by('id','ASC')->get('subject')->result_Array();
            return $result;
        }
        
        public function campus()
        {
            $result = $this->db->order_by('id','ASC')->get('campus')->result_Array();
            return $result;
        }

        public function search($keyword)
        {
            $this->db->like('stdid',$keyword);
            $this->db->or_like('name',$keyword);
            $this->db->or_like('email',$keyword);
            $this->db->or_like('phone',$keyword);
            $this->db->or_like('dob',$keyword);
            $this->db->or_like('address',$keyword);
            $this->db->or_like('subject',$keyword);
            $this->db->or_like('campus',$keyword);
            $this->db->or_like('created_at',$keyword);
            $this->db->order_by('id','ASC');
            return $this->db->get('add_student')->result_Array();

        }
    }
?>