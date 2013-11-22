<?php

/**
 * Get a phase by ID
 *
 */
function db_get_phase($idPhase, $idMeeting)
{
   $CI = get_instance();
   $sql = "SELECT * FROM phase WHERE idPhase = ? AND idMeeting = ?";

   $query = $CI->db->query($sql, array($idPhase, $idMeeting)); 
   return $query;
}

function db_get_all_phase()
{
   $CI = get_instance();
   $sql = "SELECT * FROM phase ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_get_all_phase_for_meeting($idMeeting){
   $CI = get_instance();
   $sql = "SELECT * FROM phase WHERE idMeeting = ?";

   $query = $CI->db->query($sql, array($idMeeting)); 
   return $query;
}

function db_create_phase($idPhase, $idMeeting, $startTime, $endTime, $createdBy)
{
   $CI = get_instance();
   $sql = "INSERT INTO phase VALUES( ?, ?, ?, ?, ?)";

   $query = $CI->db->query($sql, array($idPhase, $idMeeting, $startTime, $endTime, $createdBy)); 
   return $query;
}

function update_phase($idPhase, $idMeeting, $startTime, $endTime, $createdBy )
{
   $CI = get_instance();
   $sql = "UPDATE phase SET startTime = ?, endTime = ?, createdBy = ? WHERE idPhase = ? AND idMeeting = ? ";

   $query = $CI->db->query($sql, array( $startTime, $endTime, $createdBy, $idPhase, $idMeeting)); 
   return $query;
}

function delete_phase($idPhase, $idMeeting)
{
   $CI = get_instance();
   $sql = "DELETE FROM phase WHERE idPhase= ? AND idMeeting = ?";

   $query = $CI->db->query($sql, array($idPhase, $idMeeting)); 
   return $query;
}

function get_collumns()
{
    return('idPhase', 'idMeeting', 'startTime', 'endTime', 'createdBy');
}

?>