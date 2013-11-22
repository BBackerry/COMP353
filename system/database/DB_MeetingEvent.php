<?php

/**
 * Get a meetingEvent by ID
 *
 */
function db_get_meetingEvent($idEvent)
{
   $CI = get_instance();
   $sql = "SELECT * FROM meetingEvent WHERE idEvent = ? ";

   $query = $CI->db->query($sql, array($idEvent)); 
   return $query;
}

function db_get_all_meetingEvent()
{
   $CI = get_instance();
   $sql = "SELECT * FROM meetingEvent ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_meetingEvent($idEvent, $idMeeting)
{
   $CI = get_instance();
   $sql = "INSERT INTO meetingEvent VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idEvent, $idMeeting)); 
   return $query;
}

function delete_meetingEvent($idEvent, $idMeeting)
{
   $CI = get_instance();
   $sql = "DELETE FROM meetingEvent WHERE idEvent= ? AND idMeeting = ? ";

   $query = $CI->db->query($sql, array($idEvent, $idMeeting)); 
   return $query;
}

function get_collumns()
{
    return('idEvent', 'idMeeting');
}

?>