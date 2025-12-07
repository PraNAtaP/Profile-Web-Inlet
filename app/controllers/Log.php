<?php
class Log extends Controller {
    public function __construct() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }
    public function index() {
        $data['judul'] = 'Activity Log';
        $data['logs'] = $this->model('Log_model')->getAllLogs();
        $this->view('templates/header_admin', $data);
        $this->view('admin/log/index', $data);
        $this->view('templates/footer_admin');
    }
}
