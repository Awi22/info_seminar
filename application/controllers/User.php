<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_user');
    }

    public function index()
    {
        $this->layout
            ->title('Pengautran User')
            ->view('user/index');
    }
}

/* End of file User.php */
/* Location: ./controllers/User.php */
