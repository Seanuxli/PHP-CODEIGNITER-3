<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Control extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->library('PHPMAILER_Library');
    }

    private function Email_Notification($Email_Address, $Full_Name, $Subject, $Body) {
        $mail = $this->phpmailer_library->load();
    
        if (!$mail) {
            log_message('error', 'Failed to load PHPMailer.');
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
    
            $mail->Subject = $Subject;
            $mail->isHTML(true);
            $mail->Body = $Body;
    
            if ($mail->send()) {
                log_message('info', "Notification email sent to: $Email_Address");
                return true;
            } else {
                log_message('error', 'Mailer Error: ' . $mail->ErrorInfo);
                return false;
            }
    
        } catch (Exception $e) {
            log_message('error', 'PHPMailer Exception: ' . $mail->ErrorInfo);
            return false;
        }
    }    

    public function Admin_Page() {
        $data['user_count'] = $this->Admin_Model->get_user_count();
        $data['admin_count'] = $this->Admin_Model->get_admin_count();
        $data['released_count'] = $this->Admin_Model->get_released_count();
        $data['unreleased_count'] = $this->Admin_Model->get_unreleased_count();

        $this->load->view('Admin_Dashboard', $data);
    }

    public function Stats() {
        $data['user_count'] = $this->Admin_Model->get_user_count();
        $data['admin_count'] = $this->Admin_Model->get_admin_count();
        $data['released_count'] = $this->Admin_Model->get_released_count();
        $data['unreleased_count'] = $this->Admin_Model->get_unreleased_count();

        $this->load->view('Statistics_Page', $data);
    }

    public function Accounts() {
        $data['items'] = $this->Admin_Model->get_accounts();
        $this->load->view('Account_Page', $data);
    }

    public function Reports() {
        $this->load->view('Report_Page');
    }

    public function Products() {
        $this->load->view('Add_Products_Page');
    }

    public function Ban_User($ID) {
        $result = $this->Admin_Model->ban_user($ID);
    
        if ($result) {
            $user = $this->Admin_Model->get_user_details($ID);
            if ($user) {
                $subject = 'Account Banned Notification';
                $body = "<h3>Hello, {$user->Full_Name}</h3>
                         <p>We regret to inform you that your account has been <b>banned</b>.</p>
                         <p>If you believe this was a mistake, please contact support.</p>";
                $this->Email_Notification($user->Email_Address, $user->Full_Name, $subject, $body);
            }
    
            $this->session->set_flashdata('ban_success', 'User has been banned successfully.');
        } else {
            $this->session->set_flashdata('ban_error', 'Failed to ban user.');
        }
    
        redirect('Admin_Control/Accounts');
    }
    
    public function Unban_User($ID) {
        $result = $this->Admin_Model->unban_user($ID);
    
        if ($result) {
            $user = $this->Admin_Model->get_user_details($ID);
            if ($user) {
                $subject = 'Account Unbanned Notification';
                $body = "<h3>Hello, {$user->Full_Name}</h3>
                         <p>Good news! Your account has been <b>unbanned</b> and is now active.</p>
                         <p>Thank you for your patience. | STAY HEAVY!</p>";
                $this->Email_Notification($user->Email_Address, $user->Full_Name, $subject, $body);
            }
    
            $this->session->set_flashdata('unban_success', 'User has been unbanned successfully.');
        } else {
            $this->session->set_flashdata('unban_error', 'Failed to unban user.');
        }
    
        redirect('Admin_Control/Accounts');
    }

    public function Delete_Account() {
    $ID = $this->input->post('ID');

    if ($ID && is_numeric($ID)) {
        $user = $this->Admin_Model->get_user_details($ID);

        $deleted = $this->Admin_Model->delete_user($ID);

        if ($deleted) {
            if ($user) {
                $subject = 'Account Deletion Notification';
                $body = "<h3>Hello, {$user->Full_Name}</h3>
                         <p>Your account has been <b>deleted</b> from our system.</p>
                         <p>If you believe this was a mistake, please contact our support team immediately.</p>";
                $this->Email_Notification($user->Email_Address, $user->Full_Name, $subject, $body);
            }

            $this->session->set_flashdata('success', 'Account deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the account. Please try again.');
        }
    } else {
        $this->session->set_flashdata('error', 'Invalid or missing account ID.');
    }

    redirect('Admin_Control/Accounts');
}

    public function Add_Product() {
        $image = '';

        if (!empty($_FILES['IMAGE']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['max_size'] = 4060;
            $config['file_name'] = time() . '_' . preg_replace('/\s+/', '_', $_FILES['IMAGE']['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('IMAGE')) {
                $error = $this->upload->display_errors();
                log_message('error', 'File upload failed: ' . $error);
                $this->session->set_flashdata('error', 'Upload failed: ' . strip_tags($error));
                redirect('Admin_Control/Products');
                return;
            } else {
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
        }

        $category = strtolower($this->input->post('CATEGORY'));

        $data = [
            'NAME' => $this->input->post('NAME'),
            'DESCRIPTION' => $this->input->post('DESCRIPTION'),
            'CATEGORY' => $category,
            'SKU' => $this->input->post('SKU'),
            'STOCK_QUANT' => $this->input->post('STOCK_QUANT'),
            'PRICE' => $this->input->post('PRICE'),
            'STATUS' => $this->input->post('STATUS'),
            'IMAGE' => $image,
            'CREATED_AT' => date('Y-m-d H:i:s')
        ];

        $this->Admin_Model->insert_product($data);
        $this->session->set_flashdata('success', 'Product successfully added!');

        switch ($category) {
            case 'shirt':
                redirect('Admin_Control/Products');
                break;
            case 'hoodie':
                redirect('Admin_Control/Products');
                break;
            case 'patch':
                redirect('Admin_Control/Products');
                break;
            default:
                redirect('Admin_Control/Products');
                break;
        }
    }

    public function Remove_Product() {
        $ID = $this->input->post('ID');
        $result = $this->Admin_Model->remove($ID);
        if ($result) {
            $this->session->set_flashdata('remove_success', 'Product successfully removed!');
        } else {
            $this->session->set_flashdata('remove_error', 'Failed to remove product.');
        }

        redirect(base_url('Admin_Control/Admin_Page'));
    }
    

    public function Released_Shirt() {
        $this->load->view('Released_Shirts');
    }

    public function Released_Hoodie() {
        $this->load->view('Released_Hoodies');
    }

    public function Released_Patch() {
        $this->load->view('Released_Patches');
    }

    public function Unreleased_Shirt() {
        $data['unreleased_shirts'] = $this->Admin_Model->get_unreleased_by_category('shirt');
        $this->load->view('Unreleased_Shirts', $data);
    }

    public function Unreleased_Hoodie() {
        $data['unreleased_hoodies'] = $this->Admin_Model->get_unreleased_by_category('hoodie');
        $this->load->view('Unreleased_Hoodies', $data);
    }

    public function Unreleased_Patch() {
        $data['unreleased_patches'] = $this->Admin_Model->get_unreleased_by_category('patch');
        $this->load->view('Unreleased_Patches', $data);
    }
    
}
