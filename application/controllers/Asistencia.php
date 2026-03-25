<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logueado')) redirect('login');
        $this->load->model('Asistencia_model');
    }

  public function index() {

    $fecha_desde = $this->input->get('desde');
    $fecha_hasta = $this->input->get('hasta');
    $apellido    = $this->input->get('apellido');

    $data['lista'] = $this->Asistencia_model->filtrar($fecha_desde, $fecha_hasta, $apellido);

    $data['desde'] = $fecha_desde;
    $data['hasta'] = $fecha_hasta;
    $data['apellido'] = $apellido;

    $this->load->view('templates/header');
    $this->load->view('templates/menu');
    $this->load->view('asistencia/index', $data);
    $this->load->view('templates/footer');
}


    public function nuevo() {
        $data['alumnos'] = $this->Asistencia_model->alumnos();
        $data['actividades'] = $this->Asistencia_model->actividades();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('asistencia/form', $data);
        $this->load->view('templates/footer');
    }

    public function guardar() {
        $data = [
            'dni'          => $this->input->post('dni'),
            'id_actividad' => $this->input->post('id_actividad'),
            'fecha'        => $this->input->post('fecha') ." ". date('H:i:s')
        ];

        $this->Asistencia_model->insertar($data);

        $this->session->set_flashdata('ok', 'Asistencia registrada correctamente');
        redirect('asistencia');
    }

    public function editar($id) {
        $data['asistencia'] = $this->Asistencia_model->obtener($id);
        $data['alumnos'] = $this->Asistencia_model->alumnos();
        $data['actividades'] = $this->Asistencia_model->actividades();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('asistencia/form', $data);
        $this->load->view('templates/footer');
    }

    public function actualizar($id) {
        $data = [
            'dni'          => $this->input->post('dni'),
            'id_actividad' => $this->input->post('id_actividad'),
            'fecha'        => $this->input->post('fecha')  ." ". date('H:i:s')
        ];

        $this->Asistencia_model->actualizar($id, $data);

        $this->session->set_flashdata('ok', 'Asistencia actualizada correctamente');
        redirect('asistencia');
    }

    public function eliminar($id) {
        $this->Asistencia_model->eliminar($id);
        $this->session->set_flashdata('ok', 'Asistencia eliminada');
        redirect('asistencia');
    }
	public function actividades_por_pago() {
    $dni = $this->input->post('dni');
    $fecha = $this->input->post('fecha');

    // obtener mes y año
    $mes = date("m", strtotime($fecha));
    $anio = date("Y", strtotime($fecha));

    $this->db->select('actividades.id, actividades.nombre');
    $this->db->from('pagos');
    $this->db->join('actividades', 'actividades.id = pagos.id_actividad');
    $this->db->where('pagos.dni', $dni);
    $this->db->where('MONTH(pagos.fecha)', $mes);
    $this->db->where('YEAR(pagos.fecha)', $anio);

    $result = $this->db->get()->result();

    echo json_encode($result);
}

}
