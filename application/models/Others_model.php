<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others_model extends CI_Model {

    public function insert($db,$add_array) {
        $this->db->insert($db, $add_array);
        if($this->db->affected_rows() > 0){return true;} else {return false;}
    }
}