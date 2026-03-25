<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logueado')) redirect('login');
        $this->load->model('Actividades_model');
    }

    public function index() {
        $data['lista'] = $this->Actividades_model->listar();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('actividades/index', $data);
        $this->load->view('templates/footer');
    }

    public function nuevo() {
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('actividades/form');
        $this->load->view('templates/footer');
    }

    public function guardar() {
        $data = [
            'nombre' => $this->input->post('nombre'),
            'habilitada' => $this->input->post('habilitada'),
            'importe' => $this->input->post('importe')
        ];

        $this->Actividades_model->insertar($data);

        $this->session->set_flashdata('ok', 'Actividad creada correctamente');
        redirect('actividades');
    }

    public function editar($id) {
        $data['actividad'] = $this->Actividades_model->obtener($id);

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('actividades/form', $data);
        $this->load->view('templates/footer');
    }

    public function actualizar($id) {
        $data = [
            'nombre' => $this->input->post('nombre'),
            'habilitada' => $this->input->post('habilitada'),
            'importe' => $this->input->post('importe')
        ];

        $this->Actividades_model->actualizar($id, $data);

        $this->session->set_flashdata('ok', 'Actividad actualizada correctamente');
        redirect('actividades');
    }

public function eliminar($id)
{
    // 1) Verificar si la actividad tiene pagos
    $tienePagos = $this->db->where('id_actividad', $id)->count_all_results('pagos');

    if ($tienePagos > 0) {
        $this->session->set_flashdata('error', 'No se puede borrar la actividad porque tiene pagos asociados.');
        redirect('actividades');
        return;
    }

    // 2) Verificar si la actividad tiene asistencias
    $tieneAsistencias = $this->db->where('id_actividad', $id)->count_all_results('asistencia');

    if ($tieneAsistencias > 0) {
        $this->session->set_flashdata('error', 'No se puede borrar la actividad porque tiene asistencias registradas.');
        redirect('actividades');
        return;
    }

    // 3) Si no tiene nada asociado, borrar
    $this->db->where('id', $id)->delete('actividades');

    $this->session->set_flashdata('ok', 'Actividad eliminada correctamente.');
    redirect('actividades');
}

}
