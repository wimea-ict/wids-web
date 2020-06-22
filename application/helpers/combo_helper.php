<?php
//combobox helper
function combo_function($name,$table,$field,$pk,$selected, $menu=FALSE){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if(!$selected && $menu){
        $cmb .="<option value='0' selected='selected' >Parent</option>";
    }
    else if($selected > 0 && $menu){
        $cmb .="<option value='0' >Parent</option>";
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field."</option>";
        //$cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
