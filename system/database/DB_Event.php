<?php

/**
 * Get a event by ID
 *
 */
function db_get_event_of_user($idEvent)
{
   $CI = get_instance();
   $sql = "SELECT * FROM event WHERE idEvent = ? ";

   $query = $CI->db->query($sql, array($idEvent)); 
   return $query;
}

function db_get_all_event()
{
   $CI = get_instance();
   $sql = "SELECT * FROM event ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_event($idEvent, $startDate, $endDate, $createdBy)
{
   $CI = get_instance();
   $sql = "INSERT INTO event VALUES( ?, ?, ?, ?)";

   $query = $CI->db->query($sql, array($idEvent, $startDate, $endDate, $createdBy)); 
   return $query;
}

function update_paperDecision($idEvent, $startDate, $endDate, $createdBy )
{
   $CI = get_instance();
   $sql = "UPDATE event SET startDate = ?, endDate = ?, createdBy = ? WHERE idEvent = ? ";

   $query = $CI->db->query($sql, array( $startDate, $endDate, $createdBy, $idEvent)); 
   return $query;
}

function delete_event($idEvent)
{
   $CI = get_instance();
   $sql = "DELETE FROM event WHERE idEvent= ? ";

   $query = $CI->db->query($sql, array($idEvent)); 
   return $query;
}

function get_collumns()
{
    return('idEvent', 'startDate', 'endDate', 'createdBy');
}

?>