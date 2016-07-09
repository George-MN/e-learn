<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Function to get the client ip address
    public function get_client_ip() {
        $ipaddress = '';
        if ($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    public function validate($username, $password) {
        $this->db->trans_start();
        // grab user input
        //$username = $this->security->xss_clean($this->input->post('username'));
        //  $password = $this->security->xss_clean($this->input->post('password'));
        $Enc_password = $password;
        // Prep the query
        $this->db->where('user_name', $username);
        $this->db->or_where('email', $username);
        $this->db->where('password', $Enc_password);
        $this->db->where('status', "Active");

        // Run the query
        $query = $this->db->get('users');



        if ($query->num_rows() == 1) {

            $login_ip_address = $this->get_client_ip();
            $this->load->library('user_agent');

            if ($this->agent->is_browser()) {
                $agent = $this->agent->browser() . ' ' . $this->agent->version();
            } elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot();
            } elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile();
            } else {
                $agent = 'Unidentified User Agent';
            }


            $paltform = $this->agent->platform();

            $login_ip_address_details = 'Platform : ' . $paltform . ' / Agent : ' . $agent . ' / Login IP address : ' . $login_ip_address;
            $month = date('F');
            $year = date('Y');
            $row = $query->row();
            $is_active = "Active";

            $time_start = date("H:i:s");
            //Grab the  information and dump into log-in logs table for tracking user activities
            $this->db->set('user_id', $row->id);
            $this->db->set('user_name', $row->user_name);
            $this->db->set('login_ip_address', $login_ip_address_details);
            $this->db->set('month', $month);
            $this->db->set('year', $year);
            $this->db->set('time_start', $time_start);
            $this->db->insert('login_logs');
            $insert_id = $this->db->insert_id();
            $last_inserted_id = $this->db->insert_id();
            //create user session
            $data = array(
                'user_id' => $row->id,
                'user_name' => $row->user_name,
                'login_logs_id' => $last_inserted_id,
                'validated' => true
            );
            $this->session->set_userdata($data);
            //update the  user branch and member id in the Login logs table



            $time_end = date("H:i:s");
            $update_logout = "SELECT login_logs_id, is_active FROM `login_logs` where login_logs_id < '$last_inserted_id' and user_name='$username' and is_active = 'Active'";
            $query = $this->db->query($update_logout);
            foreach ($query->result() as $value) {
                $login_logs_id = $value->login_logs_id;
                $is_active = $value->is_active;
                $in_active = "In Active";
                $login_logs_update = array(
                    'is_active' => $in_active,
                    'time_end' => $time_end
                );
                $this->db->where('login_logs_id', $login_logs_id);
                $this->db->update('login_logs', $login_logs_update);
            }


            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                
            }

            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    public function reset_password($email) {
        $this->db->trans_start();

        $sql_1 = "Select * from employee where email='$email'";
        $query_1 = $this->db->query($sql_1);
        foreach ($query_1->result() as $value) {
            $title = $value->title;
            $f_name = $value->f_name;
            $s_name = $value->s_name;
            $o_name = $value->o_name;
            $user_name = $value->user_name;
            $e_mail = $value->email;
            $employee_id = $value->id;

            $employee_name = $title . ': ' . $f_name . ' ' . $s_name . ' ' . $o_name;
            $base_url = $this->config->item('base_url');
            //configure email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'samueldindiharris4@gmail.com'; // email id
            $config['smtp_pass'] = 'ANDROIDFROYO8750'; // email password
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $config['charset'] = 'iso-8859-1';
            $config['newline'] = "\r\n"; //use double quotes here
            $this->email->initialize($config);
            $from_email = "noreply@uniqueloo.co.ke";
            $name = "Unique Loo System";
            $subject = "Account Password Reset";
            $random_key = $this->get_params($employee_id);

            $mail_body = '
                                                                           ---------------------
                                                                                Hey :' . $employee_name . '!
                                                                                    <fieldset>
                                                                                We currently received a request for resetting your UNIQUE LOO  ACCOUNT Password. You can reset your UNIQUE LOO  Personal Account Password 
                                                                                through the link below:
                                                                                <hr>
                                                                                ------------------------
                                                                                Please click this link to activate your account:<a href="' . $base_url . 'resetpassword/reset_p/' . $random_key . '">Reset</a>
                                                                                

                                                                                ------------------------ ';



            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($e_mail);
            $this->email->subject($subject);
            $this->email->message($mail_body);
            if ($this->email->send()) {
                // mail sent
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                redirect('login/index');
            } else {
                //error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                redirect('login/index');
            }
        }


        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            
        }
    }

    function generate_random_letters($employee_id) {
        $random = '';

        $random_1 = chr(rand(ord('0'), ord('999')));
        $random_2 = chr(rand(ord('A'), ord('Z')));
        $stamp = date("Ymdhis");
        $randomised_stamp = rand($stamp, 1);
        $randomised_stamp = str_replace("-", "", $randomised_stamp);
        $randomised_stamp = strrev(str_replace("!@#$%^&*()|:}{<>?|/+=", "_", $randomised_stamp));
        $random .= $random_1 . $randomised_stamp . $random_2;

        $this->db->trans_start();
        $data_update = array(
            'random_key' => $random
        );
        $this->db->where('id', $employee_id);
        $this->db->update('employee', $data_update);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            
        } else {

            return $random;
        }
    }

    function new_password($password_1, $random_key) {
        $this->db->trans_start();
        $sql = "Select email from employee where random_key='$random_key' ";
        $query = $this->db->query($sql);
        foreach ($query->result() as $value) {
            $id = $value->email;
            $password_1 = md5($password_1);
            $set = "Active";
            $data_update = array(
                'password' => $password_1,
                'status' => $set
            );
            $this->db->where('email', $id);
            $this->db->update('users', $data_update);
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>