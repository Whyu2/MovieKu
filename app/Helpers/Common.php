<?php 
function formatDate($date = '', $format = 'd F Y'){
    if($date == '' || $date == null)
        return;
        
    return date($format,strtotime($date));
}
function formatYears($date = '', $format = 'Y'){
    if($date == '' || $date == null)
        return;
    return date($format,strtotime($date));
}
?>