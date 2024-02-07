<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_dashboard');
    }

    public function index()
    {
        $background = 'public/assets/media/auth/agency.png';
        $data = [
            'background' => $background
        ];

        $this->layout
            ->title('Dashboard')
            ->data($data)
            ->view('dashboard/index');
    }
}

/* End of file Dashboard.php */
/* Location: ./controllers/Dashboard.php */
