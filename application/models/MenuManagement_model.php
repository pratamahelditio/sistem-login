<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuManagement_model extends CI_Model
{
    public function addMenu()
    {
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    }


    public function delete($id)
    {
        $this->db->where('id', $id)->delete('user_menu');
    }

    public function edit($id)
    {
        $this->db->where('id', $id)->update('user_menu', ['menu' => $this->input->post('editMenu')]);
    }

    public function subMenu()
    {
        $query = "SELECT `user_sub_menu`.* , `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                  ";
        return $this->db->query($query)->result_array();
    }
}