<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logueado')) {
            redirect('login');
        }
    }

    public function index() {

        // 1) Asistencias últimas 2 horas
        $this->db->select('a.*, al.nombre, al.apellido');
        $this->db->from('asistencia a');
        $this->db->join('alumnos al', 'al.dni = a.dni');
        $this->db->where('a.fecha >=', 'DATE_SUB(NOW(), INTERVAL 6 HOUR)', FALSE);
        $this->db->where('a.fecha <=', 'NOW()', FALSE);
        $this->db->order_by('a.fecha', 'DESC');
        $data['presentes'] = $this->db->get()->result();

        // 2) Pagos últimos 10 días
        $this->db->select('DATE(fecha) AS dia, SUM(importe) AS total');
        $this->db->from('pagos');
        $this->db->where('fecha >=', 'DATE_SUB(CURDATE(), INTERVAL 10 DAY)', FALSE);
        $this->db->group_by('DATE(fecha)');
        $this->db->order_by('dia', 'DESC');
        $data['pagos'] = $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}




