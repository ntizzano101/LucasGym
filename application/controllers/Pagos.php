<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logueado')) redirect('login');
        $this->load->model('Pagos_model');
    }

    public function index() {


    $fecha_desde = $this->input->get('desde');
    $fecha_hasta = $this->input->get('hasta');
    $apellido    = $this->input->get('apellido');

    $data['lista'] = $this->Pagos_model->filtrar($fecha_desde, $fecha_hasta, $apellido);

    $data['desde'] = $fecha_desde;
    $data['hasta'] = $fecha_hasta;
    $data['apellido'] = $apellido;

    $this->load->view('templates/header');
    $this->load->view('templates/menu');
    $this->load->view('pagos/index', $data);
    $this->load->view('templates/footer');
}


    public function nuevo() {
        $data['alumnos'] = $this->Pagos_model->alumnos();
        $data['actividades'] = $this->Pagos_model->actividades();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('pagos/form', $data);
        $this->load->view('templates/footer');
    }

    public function guardar() {
        $data = [
            'id_actividad' => $this->input->post('id_actividad'),
            'dni'          => $this->input->post('dni'),
            'fecha'        => $this->input->post('fecha'),
            'importe'      => $this->input->post('importe')
        ];

        $this->Pagos_model->insertar($data);

        $this->session->set_flashdata('ok', 'Pago registrado correctamente');
        redirect('pagos');
    }

    public function editar($id) {
        $data['pago'] = $this->Pagos_model->obtener($id);
        $data['alumnos'] = $this->Pagos_model->alumnos();
        $data['actividades'] = $this->Pagos_model->actividades();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('pagos/form', $data);
        $this->load->view('templates/footer');
    }

    public function actualizar($id) {
        $data = [
            'id_actividad' => $this->input->post('id_actividad'),
            'dni'          => $this->input->post('dni'),
            'fecha'        => $this->input->post('fecha'),
            'importe'      => $this->input->post('importe')
        ];

        $this->Pagos_model->actualizar($id, $data);

        $this->session->set_flashdata('ok', 'Pago actualizado correctamente');
        redirect('pagos');
    }

    public function eliminar($id) {
        $this->Pagos_model->eliminar($id);
        $this->session->set_flashdata('ok', 'Pago eliminado');
        redirect('pagos');
    }
	public function obtener_importe($id_actividad) {
    $this->db->where('id', $id_actividad);
    $actividad = $this->db->get('actividades')->row();

    echo json_encode($actividad);
}

}
