<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('wuling_admin/model_adm_setting');
    }

    public function index()
    {
        $data = [
            'judul'    => 'Pengaturan User',
            'konten'   => 'admin/user'
        ];

        $this->load->view('_template/index', $data);
    }
}

/* End of file User.php */
/* Location: ./controllers/User.php */
