<?php
class Pagos_model extends CI_Model {

    public function listar() {
        $this->db->select('pagos.*, alumnos.apellido, alumnos.nombre, actividades.nombre AS actividad');
        $this->db->from('pagos');
        $this->db->join('alumnos', 'alumnos.dni = pagos.dni');
        $this->db->join('actividades', 'actividades.id = pagos.id_actividad');
        return $this->db->get()->result();
    }

    public function obtener($id) {
        return $this->db->get_where('pagos', ['id' => $id])->row();
    }

    public function insertar($data) {
        return $this->db->insert('pagos', $data);
    }

    public function actualizar($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pagos', $data);
    }

    public function eliminar($id) {
        return $this->db->delete('pagos', ['id' => $id]);
    }

   public function alumnos() {
    $this->db->order_by('apellido', 'ASC');
    $this->db->order_by('nombre', 'ASC');
    return $this->db->get('alumnos')->result();
}


    public function actividades() {
		$this->db->order_by('nombre', 'ASC');
        return $this->db->get('actividades')->result();
    }
	public function filtrar($desde, $hasta, $apellido) {

    $this->db->select('pagos.*, alumnos.apellido, alumnos.nombre, actividades.nombre AS actividad');
    $this->db->from('pagos');
    $this->db->join('alumnos', 'alumnos.dni = pagos.dni');
    $this->db->join('actividades', 'actividades.id = pagos.id_actividad');

    // FILTRO POR FECHA DESDE
    if (!empty($desde)) {
        $this->db->where('pagos.fecha >=', $desde);
    }

    // FILTRO POR FECHA HASTA
    if (!empty($hasta)) {
        $this->db->where('pagos.fecha <=', $hasta);
    }

    // FILTRO POR APELLIDO
    if (!empty($apellido)) {
        $this->db->like('alumnos.apellido', $apellido);
    }

    $this->db->order_by('pagos.fecha', 'DESC');

    return $this->db->get()->result();
}

}
