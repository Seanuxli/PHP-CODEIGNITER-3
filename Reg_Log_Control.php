<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_Log_Control extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reg_Log_Model');
        $this->load->library('PHPMAILER_Library');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('Homepage_View');
    }

    public function Register_Page() {
        $this->load->view('Register_View');
    }

    public function Verif_Form() {
        $this->load->view('Verification_Form_View');
    }

    public function Login_Page() {
        $this->load->view('Login_View');
    }

    public function Verif_User() {
    $Verification_Code = $this->input->post('Verification_Code');

    if (empty($Verification_Code)) {
        $this->session->set_flashdata('error', 'Verification code is missing or invalid.');
        redirect(base_url('Reg_Log_Control/Verif_Form'));
        return;
    }

    $data = [
        'Verification_Code' => $Verification_Code,
        'Verified' => 1
    ];

    if ($this->Reg_Log_Model->Verify_User($data)) {
        $this->session->set_flashdata('success', 'Account verified successfully!');
        redirect(base_url('Reg_Log_Control/Login_Page'));
    } else {
        $this->session->set_flashdata('error', 'Verification failed. Invalid code or user not found.');
        redirect(base_url('Reg_Log_Control/Verif_Form'));
    }
}

    public function Register_User() {
        $this->form_validation->set_rules('Full_Name', 'Full Name', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('Phone_Number', 'Phone Number', 'required|regex_match[/^(\+639|09)\d{9}$/]');
        $this->form_validation->set_rules('Email_Address', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('Address', 'Address', 'required|trim');
        $this->form_validation->set_rules('Birth_Date', 'Birth Date', 'required');

        $email = $this->input->post('Email_Address', TRUE);

        if ($this->Reg_Log_Model->Email_Verified($email)) {
            $this->session->set_flashdata('verified_email', 'This Email is Already VERIFIED!');
            redirect(base_url('Reg_Log_Control/Register_Page'));
            return;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('Reg_Log_Control/Register_Page'));
            return;
        }

        $Verification_Code = rand(100000, 999999);

        $data = [
            'Full_Name'     => $this->input->post('Full_Name', TRUE),
            'Phone_Number'  => $this->input->post('Phone_Number', TRUE),
            'Email_Address' => $email,
            'Address'       => $this->input->post('Address', TRUE),
            'Birth_Date'    => $this->input->post('Birth_Date', TRUE),
            'Verification_Code' => $Verification_Code,
            'Verified'      => 0
        ];

        if ($this->Reg_Log_Model->Registration($data)) {
            if ($this->Send_Verification_Code($email, $data['Full_Name'], $Verification_Code)) {
                $this->session->set_flashdata('success', 'Registration successful! Check your email for verification.');
            } else {
                $this->session->set_flashdata('error', 'Registration successful, but email sending failed.');
            }
        } else {
            $this->session->set_flashdata('error', 'Registration failed. Try again.');
        }

        redirect(base_url('Reg_Log_Control/Verif_Form'));
    }

    private function Send_Verification_Code($Email_Address, $Full_Name, $Verification_Code) {
        $mail = $this->phpmailer_library->load();
        if (!$mail) {
            return false;
        }

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'Slapshop.Philippines@gmail.com';
            $mail->Password   = 'udgf mtgv rmcs vhoy';
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('Slapshop.Philippines@gmail.com', 'Slapshop Philippines');
            $mail->addAddress($Email_Address, $Full_Name);

            $mail->Subject = 'Account Verification Code';
            $mail->isHTML(true);
            $mail->Body = "<h3>Hello, $Full_Name</h3>
                           <p>Your verification code is: <b>$Verification_Code</b></p>
                           <p>Please enter this code to verify your account | STAY HEAVY!.</p>";

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }

    public function Login_User() {
    $email = $this->input->post('Email_Address', TRUE);

    if (empty($email)) {
        $this->session->set_flashdata('error', 'Please enter your email address.');
        redirect(base_url('Reg_Log_Control/Login_Page'));
        return;
    }

    $user = $this->Reg_Log_Model->Get_Email($email);

    if (!$user) {
        $this->session->set_flashdata('error', 'Email not found.');
        redirect(base_url('Reg_Log_Control/Login_Page'));
        return;
    }

    if ($user['Verified'] != 1) {
        $this->session->set_flashdata('error', 'Account not verified. Please check your email.');
        redirect(base_url('Reg_Log_Control/Login_Page'));
        return;
    }

    $this->session->set_userdata([
        'ID'   => $user['ID'],
        'Email_Address'     => $user['Email_Address'],
        'Full_Name' => $user['Full_Name'],
        'logged_in' => TRUE
    ]);

    $this->session->set_flashdata('success', 'Welcome back, you have successfully logged in!');
        redirect(base_url('Home'));
    }


}