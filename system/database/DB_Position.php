<?php

/**
 * Get a position by ID
 *
 */
function db_get_position($idPosition)
{
   $CI = get_instance();
   $sql = "SELECT * FROM position WHERE idPosition = ? ";

   $query = $CI->db->query($sql, array($idPosition)); 
   return $query;
}

function db_get_all_position()
{
   $CI = get_instance();
   $sql = "SELECT * FROM position ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_position($idPosition, $positionName)
{
   $CI = get_instance();
   $sql = "INSERT INTO position VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idPosition, $positionName)); 
   return $query;
}

function update_position($idPosition, $positionName )
{
   $CI = get_instance();
   $sql = "UPDATE position SET positionName = ? WHERE idPosition = ? ";

   $query = $CI->db->query($sql, array( $positionName, $idPosition)); 
   return $query;
}

function delete_position($idPosition)
{
   $CI = get_instance();
   $sql = "DELETE FROM position WHERE idPosition= ? ";

   $query = $CI->db->query($sql, array($idPosition)); 
   return $query;
}

function get_collumns()
{
    return('idPosition', 'positionName');
}

?>