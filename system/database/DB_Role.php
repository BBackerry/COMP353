<?php

/**
 * Get a role by ID
 *
 */
function db_get_role_by_user($idUser)
{
   $CI = get_instance();
   $sql = "SELECT * FROM role WHERE idUser = ? ";

   $query = $CI->db->query($sql, array($idUser)); 
   return $query;
}

function db_get_role_by_event($idEvent)
{
   $CI = get_instance();
   $sql = "SELECT * FROM role WHERE idEvent = ? ";

   $query = $CI->db->query($sql, array($idEvent)); 
   return $query;
}

function db_get_role_by_position($idPosition)
{
   $CI = get_instance();
   $sql = "SELECT * FROM role WHERE idPosition = ? ";

   $query = $CI->db->query($sql, array($idPosition)); 
   return $query;
}

function db_get_role_of_user_in_event($idUser, $idEvent)
{
   $CI = get_instance();
   $sql = "SELECT * FROM role WHERE idUser = ? AND idEvent = ?";

   $query = $CI->db->query($sql, array($idUser, $idEvent)); 
   return $query;
}

function db_get_all_role()
{
   $CI = get_instance();
   $sql = "SELECT * FROM role ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_role($idUser, $idEvent, $idPosition)
{
   $CI = get_instance();
   $sql = "INSERT INTO role VALUES( ?, ?, ? )";

   $query = $CI->db->query($sql, array($idUser, $idEvent, $idPosition)); 
   return $query;
}

function update_role($idUser, $idEvent, $idPosition)
{
   $CI = get_instance();
   $sql = "UPDATE role SET idPosition = ? WHERE idUser = ? AND idEvent = ? ";

   $query = $CI->db->query($sql, array( $idPosition, $idUser, $idEvent)); 
   return $query;
}

function delete_role($idUser, $idEvent)
{
   $CI = get_instance();
   $sql = "DELETE FROM role WHERE idUser= ? AND idEvent = ? ";

   $query = $CI->db->query($sql, array($idUser, $idEvent)); 
   return $query;
}

function get_collumns()
{
    return('idUser', 'idEvent', 'idPosition' );
}

?>