<?php

/**
 * Get a meeting by ID
 *
 */
function db_get_meeting($idMeeting)
{
   $CI = get_instance();
   $sql = "SELECT * FROM meeting WHERE idMeeting = ? ";

   $query = $CI->db->query($sql, array($idMeeting)); 
   return $query;
}

function db_get_meeting_by_place($idPlace)
{
   $CI = get_instance();
   $sql = "SELECT * FROM meeting WHERE idPlace = ? ";

   $query = $CI->db->query($sql, array($idPlace)); 
   return $query;
}

function db_get_all_meeting()
{
   $CI = get_instance();
   $sql = "SELECT * FROM meeting ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_meeting($idMeeting, $idPlace, $createdBy)
{
   $CI = get_instance();
   $sql = "INSERT INTO meeting VALUES( ?, ?, ? )";

   $query = $CI->db->query($sql, array($idMeeting, $idPlace, $createdBy)); 
   return $query;
}

function update_meeting($idMeeting, $idPlace, $createdBy)
{
   $CI = get_instance();
   $sql = "UPDATE meeting SET idPlace = ?, createdBy = ?  WHERE idMeeting = ? ";

   $query = $CI->db->query($sql, array( $idPlace, $createdBy, $idMeeting)); 
   return $query;
}

function delete_meeting($idMeeting)
{
   $CI = get_instance();
   $sql = "DELETE FROM meeting WHERE idMeeting= ? ";

   $query = $CI->db->query($sql, array($idMeeting)); 
   return $query;
}

function get_collumns()
{
    return('idMeeting', 'idPlace', 'createdBy' );
}

?>