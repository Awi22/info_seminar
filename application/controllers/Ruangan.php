<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('wuling_admin/model_adm_setting');
    }

    public function index()
    {
        $data = [
            'judul'    => 'Master Ruangan Seminar',
            'konten'   => 'admin/ruangan'
        ];

        $this->load->view('_template/index', $data);
    }
}

/* End of file Dashboard.php */
/* Location: ./controllers/Dashboard.php */
