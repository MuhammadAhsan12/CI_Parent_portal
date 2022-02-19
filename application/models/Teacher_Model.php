<?php
    class Teacher_Model extends CI_Model{
        public function regester($fromArray)
        {
            $this->db->insert("users",$fromArray);
        }

        public function login($email, $password)
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $query = $this->db->get();
            $res = $query->result();
            return $res;
        }

        public function get_entries()
        {
                $query = $this->db->get('add_student');
                // if (count( $query->result() ) > 0) {
                	return $query->result();
                // }
        }

        public function all()
        {
            $result = $this->db->order_by('id','ASC')->get('add_student')->result_Array();
            return $result;

            // $this->db->select('*');
            // $this->db->from('add_student');
            // if($query != ""){
            //     $this->db->like('stdid');
            //     $this->db->or_like('name');
            //     $this->db->or_like('email');
            //     $this->db->or_like('subject');
            //     $this->db->or_like('campus');
            // }
            // $this->db->order_by('id','ASC');
            // return $this->db->get()->result_Array();
        }

        public function getCurrentRow($id)
        {
            $this->db->where('id',$id);
            $row = $this->db->get('add_student')->row_array();
            return $row;
        }

        public function create($fromArray)
        {
            $this->db->insert("add_student",$fromArray);
            return $id = $this->db->insert_id();
        }

        public function update($id, $fromArray)
        {
            $this->db->where('id',$id);
            $this->db->update('add_student',$fromArray);

            return $id;
        }

        public function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('add_student');
        }
        
        public function lastInsertId()
        {
            $this->db->select('id');
            $q = $this->db->get('add_student');
            echo $q;
        }
        
    }
?>