<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	 public function __construct()
	 {
		parent::__construct();
		$this->load->library('form_validation'); //untuk validasi form login dan regis
		$this->load->library('session');
		$this->load->model('MSudi');

	}

	public function landing()
    {
            $this->load->view('landingpage'); 
	}


	 public function index()
    {
		// if($this->session->userdata('email')) {
		// 	redirect('petugas');
		// }
        //rules email
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        //rules password
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) { // jika login nya gagal, maka tampilan akan 
            $this->load->view('login'); //kembali ke login

        } else {
			$this->_login();
		}
	}

	private function _login()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
    // Mengambil data user
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
        // Cek password
        if (password_verify($password, $user['password'])) {
            $data = [
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($data);

            // Pengalihan berdasarkan role_id
            if ($user['role_id'] == 1) {
                $this->session->set_userdata('akses', 'admin');
                redirect('admin');
            } elseif ($user['role_id'] == 2) {
                $this->session->set_userdata('akses', 'petugas');
                redirect('petugas');
            } elseif ($user['role_id'] == 4) {
                $this->session->set_userdata('akses', 'pelanggan');
                redirect('pelanggan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                role="alert">Wrong password!</div>');
            redirect('welcome');
        }
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert">Email is not registered! Please Register</div>');
        redirect('welcome');
    }
}

    

	public function registration()
	{
		// if($this->session->userdata('email')) {
		// 	redirect('petugas');
		// }
		//rules fullName
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		//rules email
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!' 	]); //jika email suda pernah register
		//rules pw 1
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!' ]);
		//rules pw 2
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		//ini untuk button regis nya
		if ($this->form_validation->run() == false) {
			$this->load->view('registration');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 1, // Role ID for Pelanggan
				'date_created' => time()
			];
	
			// Tambahkan user ke database
			$this->db->insert('user', $data);
	
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
				role="alert">Registration successful! Please login.</div>');
			redirect('welcome');
		}

			
		}
	

		public function logout() 
		{
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');

			$this->session->set_flashdata('message', '<div class="alert alert-success" 
				role="alert">You have been logged out!</div>');
				redirect('');

		}
}
