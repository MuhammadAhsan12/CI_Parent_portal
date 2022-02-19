<?php 
    class Student extends CI_Controller{

        public function ShowAddForm()
        {
            $subject = $this->Student_Model->subject();
            $campus = $this->Student_Model->campus();
            $data['subject'] = $subject;
            $data['campus'] = $campus;
            $html = $this->load->view('studentForm',$data,true);
            $response['html'] = $html;
            echo json_encode($response);
        }

        public function fetch()
        {
            if ($this->input->is_ajax_request()) {
                // if ($posts = $this->crud_model->get_entries()) {
                // 	$data = array('responce' => 'success', 'posts' => $posts);
                // }else{
                // 	$data = array('responce' => 'error', 'message' => 'Failed to fetch data');
                // }
                $posts = $this->Teacher_Model->get_entries();
                $data = array('responce' => 'success', 'posts' => $posts);
                echo json_encode($data);
            } else {
                echo "No direct script access allowed";
            }
        }

        public function saveModel()
        {
            $this->form_validation->set_rules('stdid','stdid','required|trim|is_unique[add_student.stdid]');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|trim|is_unique[add_student.email]');
            $this->form_validation->set_rules('phone','Phone','required|trim|is_unique[add_student.phone]');
            $this->form_validation->set_rules('birthday','Birthday','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('subject','Subject','required');
            $this->form_validation->set_rules('campus','Campus','required');

            if($this->form_validation->run() == true){
                $fromArray = array();
                $fromArray['stdid'] = $this->input->post('stdid');
                $fromArray['name'] = $this->input->post('name');
                $fromArray['email'] = $this->input->post('email');
                $fromArray['phone'] = $this->input->post('phone');
                $fromArray['dob'] = $this->input->post('birthday');
                $fromArray['address'] = $this->input->post('address');
                $fromArray['subject'] = $this->input->post('subject');
                $fromArray['campus'] = $this->input->post('campus');
                $fromArray['created_at'] = date('Y-m-d H:i:s');
                $id = $this->Teacher_Model->create($fromArray);
                $row = $this->Teacher_Model->getCurrentRow($id);
                $vData['row'] = $row;
                $rowHtml = $this->load->view('list',$vData,true);

                $response['row'] = $rowHtml;
                $response['status'] = 1;
                $response['message'] = "Student add Successfully!";
            }else{
                $response['status'] = 0;
                $response['stdid'] = strip_tags(form_error('stdid'));
                $response['name'] = strip_tags(form_error('name'));
                $response['email'] = strip_tags(form_error('email'));
                $response['phone'] = strip_tags(form_error('phone'));
                $response['birthday'] = strip_tags(form_error('birthday'));
                $response['address'] = strip_tags(form_error('address'));
                $response['subject'] = strip_tags(form_error('subject'));
                $response['campus'] = strip_tags(form_error('campus'));
            }

            echo json_encode($response);
        }

        public function DeleteModel($id)
        {
            $row = $this->Teacher_Model->getCurrentRow($id);

            if(empty($row)){
                $response['msg'] = "Either recorder delete or not found in db";
                $response['status'] = 0;
                echo json_encode($response);
            }else{
                $this->Teacher_Model->delete($id);
                $response['msg'] = "Record has been deleted successfully!";
                $response['status'] = 1;
                echo json_encode($response);
            }
        }

        public function ShowEditForm($id)
        {
            $row = $this->Teacher_Model->getCurrentRow($id);
            $Data['row'] = $row;
            $subject = $this->Student_Model->subject();
            $campus = $this->Student_Model->campus();
            $Data['subject'] = $subject;
            $Data['campus'] = $campus;
            $html = $this->load->view('editForm',$Data,true);
            $response['html'] = $html;
            echo json_encode($response);
        }

        public function updateModel()
        {
            $id = $this->input->post('id');
            $row = $this->Teacher_Model->getCurrentRow($id);

            if(empty($row)){
                $response['msg'] = "Editor recorder delete or not found in db";
                $response['status'] = 100;
                echo json_encode($response);
                exit;
            }
            $this->form_validation->set_rules('stdid','Stdid','required');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('birthday','Birthday','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('subject','Subject','required');
            $this->form_validation->set_rules('campus','Campus','required');

            if($this->form_validation->run() == true){
                $fromArray = array();
                $fromArray['stdid'] = $this->input->post('stdid');
                $fromArray['name'] = $this->input->post('name');
                $fromArray['email'] = $this->input->post('email');
                $fromArray['phone'] = $this->input->post('phone');
                $fromArray['dob'] = $this->input->post('birthday');
                $fromArray['address'] = $this->input->post('address');
                $fromArray['subject'] = $this->input->post('subject');
                $fromArray['campus'] = $this->input->post('campus');
                $fromArray['updated_at'] = date('Y-m-d H:i:s');
                $id = $this->Teacher_Model->update($id, $fromArray);
                $row = $this->Teacher_Model->getCurrentRow($id);

                $response['row'] = $row;
                $response['status'] = 1;
                $response['message'] = "record has been updated successfully";
            }else{
                $response['status'] = 0;
                $response['stdid'] = strip_tags(form_error('stdid'));
                $response['name'] = strip_tags(form_error('name'));
                $response['email'] = strip_tags(form_error('email'));
                $response['phone'] = strip_tags(form_error('phone'));
                $response['birthday'] = strip_tags(form_error('birthday'));
                $response['address'] = strip_tags(form_error('address'));
                $response['subject'] = strip_tags(form_error('subject'));
                $response['campus'] = strip_tags(form_error('campus'));
            }

            echo json_encode($response);
        }

        public function searchlist()
        {
            $keyword = $this->input->post('search');
            $data = array();
            $vdata['rows'] = $this->Student_Model->search($keyword);
            $this->load->view('dashboard',$vdata);
        }
    }
?>