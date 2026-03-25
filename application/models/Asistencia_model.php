<?php
class Asistencia_model extends CI_Model {

    public function listar() {
        $this->db->select('asistencia.*, alumnos.apellido, alumnos.nombre, actividades.nombre AS actividad');
        $this->db->from('asistencia');
        $this->db->join('alumnos', 'alumnos.dni = asistencia.dni');
        $this->db->join('actividades', 'actividades.id = asistencia.id_actividad');
        $this->db->order_by('asistencia.fecha', 'DESC');
        return $this->db->get()->result();
    }

    public function obtener($id) {
        return $this->db->get_where('asistencia', ['id' => $id])->row();
    }

    public function insertar($data) {
        return $this->db->insert('asistencia', $data);
    }

    public function actualizar($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('asistencia', $data);
    }

    public function eliminar($id) {
        return $this->db->delete('asistencia', ['id' => $id]);
    }

    public function alumnos() {
        $this->db->order_by('apellido', 'ASC');
        $this->db->order_by('nombre', 'ASC');
        return $this->db->get('alumnos')->result();
    }

    public function actividades() {
        return $this->db->get('actividades')->result();
    }
	public function filtrar($desde, $hasta, $apellido) {

    $this->db->select('asistencia.*, alumnos.apellido, alumnos.nombre, actividades.nombre AS actividad');
    $this->db->from('asistencia');
    $this->db->join('alumnos', 'alumnos.dni = asistencia.dni');
    $this->db->join('actividades', 'actividades.id = asistencia.id_actividad');

    // FILTRO POR FECHA DESDE
    if (!empty($desde)) {
        $this->db->where('asistencia.fecha >=', $desde);
    }

    // FILTRO POR FECHA HASTA
    if (!empty($hasta)) {
        $this->db->where('asistencia.fecha <=', $hasta);
    }

    // FILTRO POR APELLIDO
    if (!empty($apellido)) {
        $this->db->like('alumnos.apellido', $apellido);
    }

    $this->db->order_by('asistencia.fecha', 'DESC');

    return $this->db->get()->result();
}

}
