<?php
class Alumnos_model extends CI_Model {

    public function listar() {
        return $this->db->get('alumnos')->result();
    }

    public function obtener($dni) {
        return $this->db->get_where('alumnos', ['dni' => $dni])->row();
    }

    public function insertar($data) {
        return $this->db->insert('alumnos', $data);
    }

    public function actualizar($dni, $data) {
        $this->db->where('dni', $dni);
        return $this->db->update('alumnos', $data);
    }

    public function eliminar($dni) {
        return $this->db->delete('alumnos', ['dni' => $dni]);
    }
}
