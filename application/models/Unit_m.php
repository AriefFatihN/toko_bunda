<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('product_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('product_unit');
    }

    public function add($post)
    {
        $params = [
            'name' =>  $post['unit_name'],
        ];
        $this->db->insert('product_unit', $params);
        
    }

    public function edit($post)
    {
        $params = [
            'name' =>  $post['unit_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('product_unit', $params);
        
    }

}

/* End of file Unit_m.php */
