<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistenciaweb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Asistencia_model');
        $this->load->model('Pagos_model');
        $this->load->model('Alumnos_model');
    }

    public function index() {
		$this->load->view('templates/header');
        $this->load->view('asistenciaweb/dni');
		$this->load->view('templates/footer');
    }

    public function actividades() {
        $dni = $this->input->post('dni');

        // Verificar si existe el alumno
        $alumno = $this->db->get_where('alumnos', ['dni' => $dni])->row();

        if (!$alumno) {
            $data['error'] = "DNI no encontrado";
				$this->load->view('templates/header');
            $this->load->view('asistenciaweb/dni', $data);
				$this->load->view('templates/footer');
            return;
        }

        // Obtener mes y año actual
        $mes = date("m");
        $anio = date("Y");

        // Actividades pagas este mes
        $this->db->select('actividades.id, actividades.nombre');
        $this->db->from('pagos');
        $this->db->join('actividades', 'actividades.id = pagos.id_actividad');
        $this->db->where('pagos.dni', $dni);
        $this->db->where('MONTH(pagos.fecha)', $mes);
        $this->db->where('YEAR(pagos.fecha)', $anio);

        $data['actividades'] = $this->db->get()->result();
        $data['dni'] = $dni;
	$this->load->view('templates/header');
        $this->load->view('asistenciaweb/actividades', $data);
			$this->load->view('templates/footer');
    }

    public function registrar() {
        $dni = $this->input->post('dni');
        $id_actividad = $this->input->post('id_actividad');
        $hoy = date("Y-m-d");
		$hoy_mes=date("m");
		$hoy_ano=date("Y");
		$hoy_dia=date("d");

        // Verificar si ya registró asistencia hoy
        $this->db->where('dni', $dni);
        $this->db->where('id_actividad', $id_actividad);
        $this->db->where('YEAR(fecha)', $hoy_ano);
		$this->db->where('MONTH(fecha)', $hoy_mes);
		$this->db->where('DAY(fecha)', $hoy_dia);
        $existe = $this->db->get('asistencia')->row();

        if ($existe) {
            $data['error'] = "Ya registraste asistencia hoy para esta actividad.";
			$data['mensaje'] = "Ya registraste asistencia hoy para esta actividad.";
			$data['tipo'] = "error";
			$this->load->view('templates/header');
           // $this->load->view('asistenciaweb/error', $data);		   
			$this->load->view('asistenciaweb/final', $data);
			$this->load->view('templates/footer');
            return;
        }

        // Registrar asistencia
        $data = [
            'dni' => $dni,
            'id_actividad' => $id_actividad,
            'fecha' => $hoy .' '. date("h:i:s")
        ];

        $this->db->insert('asistencia', $data);	
		$data['mensaje'] = "Asistencia registrada correctamente";
		$data['tipo'] = "success";
		$this->load->view('templates/header');
		$this->load->view('asistenciaweb/final', $data);
		//$this->load->view('asistenciaweb/ok');
		$this->load->view('templates/footer');
    }
}

