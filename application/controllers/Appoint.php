<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Appoint extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Model
        $this->load->model('Dashboard_model');
        $data['username'] = $this->Dashboard_model->username();
        
        //Load Model
        $this->load->model('Booking_model');
        $this->load->model('Appoint_model');
        //Already logged In
        if (!$this->session->has_userdata('user_id')) {
            redirect('/LoginController/logout');
        }
    }

    public function addnew(){
        $data['page_title'] = 'Appoinment';
        $data['username'] = $this->Dashboard_model->username();
        // Customer List
        $data['pendings'] = $this->Booking_model->pending();

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();
        
        $data['nav'] = "Appointment";
        $data['subnav'] = "New Appoinment";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('App/addnew',$data);
        $this->load->view('App/footer');
    }

    public function insert(){
        $this->form_validation->set_rules('nic', 'NIC Number', 'required');
        $this->form_validation->set_rules('pname', 'Patient Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('doctor', 'Doctor', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->addnew();
        }
        else{
            $nic = $this->input->post('nic');
            $pname = $this->input->post('pname');
            $mobile = $this->input->post('mobile');
            $area = $this->input->post('area');
            $doctor = $this->input->post('doctor');
            $tym = $this->input->post('tym');
            $comment = $this->input->post('comment');

            $this->Appoint_model->insert_appoint($nic,$pname,$mobile,$area,$doctor,$tym,$comment);

            redirect('Appoint/appointments');
        }
    }

    public function appointments(){
        $data['page_title'] = 'Appoinment';
        $data['username'] = $this->Dashboard_model->username();
        // Customer List
        $data['pendings'] = $this->Booking_model->pending();

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['apps'] = $this->Appoint_model->appoints();
        
        $data['nav'] = "Appointment";
        $data['subnav'] = "Appoinments";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('App/appoints',$data);
        $this->load->view('App/footer');
    }

}

/* End of file Employees.php and path /application/controllers/Employees.php */


