<?php

function getInfoRS($field){
    $ci = get_instance();
    $ci->db->where('id',1);
    $rs = $ci->db->get('tbl_profil')->row_array();
    return $rs[$field];
}

function getded($field){
    $ci = get_instance();
    $ci->db->select('*');
    $ded = $ci->db->get('tbl_ded')->row_array();
    return $ded[$field];
}
// function get_all_ded(){
//     $this->db->select('*');
//     $this->db->from('tbl_ded');
//     $this->db->order_by('id', 'ASC');
//     $query = $this->db->get();
//     return $query;
// }

/* fungsi untuk mendapatkan value dari sebuah tabel
 * $table nama tabel yang digunakan
 * $field nama field yang ingin ditampilkan
 * $key ingin ditampilkan berdasarkan field yang mana
 * $value = berdasrkan apa
 */
function getFieldValue($table,$field,$key,$value){
    $ci = get_instance();
    $ci->db->where($key,$value);
    $data = $ci->db->get($table)->row_array();
    return $data[$field];
}
?>
