<?php 
    class User extends CI_Controller{
        public function ShowloginForm()
        {
            $html = $this->load->view('loginForm','',true);
            $response['html'] = $html;
            echo json_encode($response);
        }

        public function ShowRegesterForm()
        {
            $html = $this->load->view('regesterForm','',true);
            $response['html'] = $html;
            echo json_encode($response);
        }

        public function saveModel()
        {
            $this->form_validation->set_rules('stdid','Stdid','required');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() == true){
                $fromArray = array();
                $fromArray['name'] = $this->input->post('name');
                $fromArray['email'] = $this->input->post('email');
                $fromArray['password'] = $this->input->post('password');
                $this->Teacher_Model->regester($fromArray);
                
                $response['status'] = 1;
                $response['message'] = "<div class = \"alert alert-success text-center\"> Regesterd Successfully!</div>";
            }else{
                $response['status'] = 0;
                $response['name'] = strip_tags(form_error('name'));
                $response['email'] = strip_tags(form_error('email'));
                $response['password'] = strip_tags(form_error('password'));
            }

            echo json_encode($response);
        }

        public function savelogin()
        {
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() == true){
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $result = $this->Teacher_Model->login($email, $password);
                
                if (count($result) == 1) {
                    $data = array(
                        'id' => $result[0]->id,
                        'name' => $result[0]->name,
                        'email' => $result[0]->email,
                    );
                    $this->session->set_userdata('login', $data);

                    // echo redirect(base_url()."Teacher/User/dashboard/");

                    // $getdata= $this->session->userdata('login');
                    // $data['username'] = $getdata['name'];
                    // $this->load->view('welcome_message',$data);
                    // echo $data;
                    
                    $response['status'] = 1;
                    $response['message'] = "<div class = \"alert alert-success text-center\"> Login Successfully!</div>";

                }else{
                    $response['status'] = 0;
                    $response['email'] = 'Incorrect Email';
                    $response['password'] = 'Incorrect Password';
                }
                
            }else{
                $response['status'] = 0;
                $response['email'] = strip_tags(form_error('email'));
                $response['password'] = strip_tags(form_error('password'));
            }

            echo json_encode($response);
        }

        function dashboard()
        {
            if (isset($_SESSION['login']['id'])) {
                
                if($this->input->post('search')){
                    $keyword = $this->input->post('search');
                    $data = array();
                    $vdata['rows'] = $this->Student_Model->search($keyword);
                    $this->load->view('dashboard',$vdata);
                }else{
                    $rows = $this->Teacher_Model->all();
                    $data['rows'] = $rows;
                    $this->load->view('dashboard',$data);
                }
                
                
            } else {
                $this->load->view('welcome_message');
            }
        }

        public function logout()
        {
            $response['session'] = $this->session->unset_userdata('login');

            echo json_encode($response);
        }

        public function searchlist()
        {
            $this->load->view('searchlist');
        }
    }
?>