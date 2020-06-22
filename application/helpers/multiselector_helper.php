
<?php
//multiselect group
function multiselect_group($name,$group_table,$group_field,$option_table,$option_field, $fkey){
    $ci = get_instance();
    //prepare the javascript
    $name1 = str_replace(' ', '', $name); //removespaces from the tag
    $name2 = "'#".$name1."'";
    $multisel = '<script type="text/javascript">
    $(document).ready(function() {
        $('.$name2.').multiselect({
            enableFiltering: true,
            enableClickableOptGroups: true,
            includeSelectAllOption: true,
            selectAllValue: "0"
        });
    });</script>
    
    <label>'.$name.':</label>';
    
    $multisel .= '<select id="'.$name1.'" name=sendto['.$name.'][] multiple="multiple">';
    $data = $ci->db->get($group_table)->result();
    //print_r($data);
    foreach ($data as $d){
        $multisel .='<optgroup label="'.$d->$group_field.'">';
        $ci->db->where($fkey, $d->id);
        $sub_data = $ci->db->get($option_table)->result();
        //print_r($sub_data);
        foreach($sub_data as $sd)
        {
            $multisel .= '<option value="'.$sd->id.'">'.$sd->$option_field.'</option>';
        }
        $multisel .='</optgroup>';
    }
    $multisel .= '</select>';
    

    return $multisel; 
  
}

//multiselect group
function multiselect($name,$option_table,$option_field){
    $ci = get_instance();
    //prepare the javascript
    $name1 = str_replace(' ', '', $name); //removespaces from the tag
    $name2 = "'#".$name1."'";
    $multisel = '<script type="text/javascript">
    $(document).ready(function() {
        $('.$name1.').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllValue: "0"
        });
    });</script>
    
    <label>'.$name.':</label>';
    
    $multisel .= '<select id="'.$name1.'" name=sendto['.$name.'][] multiple="multiple">';
    $data = $ci->db->get($option_table)->result();

    foreach ($data as $d){
       $multisel .= '<option value="'.$d->id.'">'.$d->$option_field.'</option>';
    }
    $multisel .= '</select>';
    return $multisel; 
  
}
