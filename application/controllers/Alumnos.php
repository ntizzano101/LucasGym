<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logueado')) redirect('login');
        $this->load->model('Alumnos_model');
    }

  /*  public function index() {
        $data['lista'] = $this->Alumnos_model->listar();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('alumnos/index', $data);
        $this->load->view('templates/footer');
    }
*/
public function index()
{
    $apellido = $this->input->get('apellido');

    if (!empty($apellido)) {
        $this->db->like('apellido', $apellido);
    }

    $this->db->order_by('apellido', 'ASC');
    $this->db->order_by('nombre', 'ASC');
    $data['lista'] = $this->db->get('alumnos')->result();

    $data['apellido'] = $apellido; // para mantener el valor en el input

    $this->load->view('templates/header');
    $this->load->view('templates/menu');
    $this->load->view('alumnos/index', $data);
    $this->load->view('templates/footer');
}


    public function nuevo() {
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('alumnos/form');
        $this->load->view('templates/footer');
    }

    public function guardar() {
        $data = [
            'dni'        => $this->input->post('dni'),
            'apellido'   => $this->input->post('apellido'),
            'nombre'     => $this->input->post('nombre'),
            'direccion'  => $this->input->post('direccion'),
            'email'      => $this->input->post('email'),
            'cel'        => $this->input->post('cel'),
            'emergencia' => $this->input->post('emergencia')
        ];

        $this->Alumnos_model->insertar($data);

        $this->session->set_flashdata('ok', 'Alumno registrado correctamente');
        redirect('alumnos');
    }

    public function editar($dni) {
        $data['alumno'] = $this->Alumnos_model->obtener($dni);

        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('alumnos/form', $data);
        $this->load->view('templates/footer');
    }

    public function actualizar($dni) {
        $data = [
            'apellido'   => $this->input->post('apellido'),
            'nombre'     => $this->input->post('nombre'),
            'direccion'  => $this->input->post('direccion'),
            'email'      => $this->input->post('email'),
            'cel'        => $this->input->post('cel'),
            'emergencia' => $this->input->post('emergencia')
        ];

        $this->Alumnos_model->actualizar($dni, $data);

        $this->session->set_flashdata('ok', 'Alumno actualizado correctamente');
        redirect('alumnos');
    }

public function eliminar($id)
{
    // 1) Verificar pagos
    $tienePagos = $this->db->where('dni', $id)->count_all_results('pagos');

    // 2) Verificar asistencias
    $tieneAsistencias = $this->db->where('dni', $id)->count_all_results('asistencia');

    if ($tienePagos > 0 || $tieneAsistencias > 0) {
        $this->session->set_flashdata('error', 'No se puede borrar el alumno porque tiene pagos o asistencias registradas.');
        redirect('alumnos');
        return;
    }

    // 3) Si no tiene nada asociado, borrar
    $this->db->where('id', $id)->delete('alumnos');

    $this->session->set_flashdata('ok', 'Alumno eliminado correctamente.');
    redirect('alumnos');
}

}
