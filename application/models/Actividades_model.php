<?php
class Actividades_model extends CI_Model {

    public function listar() {
        return $this->db->get('actividades')->result();
    }

    public function obtener($id) {
        return $this->db->get_where('actividades', ['id' => $id])->row();
    }

    public function insertar($data) {
        return $this->db->insert('actividades', $data);
    }

    public function actualizar($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('actividades', $data);
    }

    public function eliminar($id) {
        return $this->db->delete('actividades', ['id' => $id]);
    }
}
