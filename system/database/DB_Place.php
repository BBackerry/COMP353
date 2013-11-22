<?php

/**
 * Get a place by ID
 *
 */
function db_get_place($idPlace)
{
   $CI = get_instance();
   $sql = "SELECT * FROM place WHERE idPlace = ? ";

   $query = $CI->db->query($sql, array($idPlace)); 
   return $query;
}

function db_get_all_place()
{
   $CI = get_instance();
   $sql = "SELECT * FROM place ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_place($idPlace, $placeName)
{
   $CI = get_instance();
   $sql = "INSERT INTO place VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idPlace, $placeName)); 
   return $query;
}

function update_place($idPlace, $placeName )
{
   $CI = get_instance();
   $sql = "UPDATE place SET placeName = ? WHERE idPlace = ? ";

   $query = $CI->db->query($sql, array( $placeName, $idPlace)); 
   return $query;
}

function delete_place($idPlace)
{
   $CI = get_instance();
   $sql = "DELETE FROM place WHERE idPlace= ? ";

   $query = $CI->db->query($sql, array($idPlace)); 
   return $query;
}

function get_collumns()
{
    return('idPlace', 'placeName');
}

?>