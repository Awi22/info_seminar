<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('wuling_admin/model_adm_setting');
    }

    public function index()
    {
        $data = [
            'judul'    => 'Home',
            'konten'   => 'home/dashboard'
        ];

        $this->load->view('_template/index', $data);
    }
}

/* End of file Home.php */
/* Location: ./controllers/Home.php */
