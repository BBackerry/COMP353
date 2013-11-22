<?php

/**
 * Get a phaseType by ID
 *
 */
function db_get_phaseType($idPhase)
{
   $CI = get_instance();
   $sql = "SELECT * FROM phaseType WHERE idPhase = ? ";

   $query = $CI->db->query($sql, array($idPhase)); 
   return $query;
}

function db_get_all_phaseType()
{
   $CI = get_instance();
   $sql = "SELECT * FROM phaseType ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_phaseType($idPhase, $phaseName)
{
   $CI = get_instance();
   $sql = "INSERT INTO phaseType VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idPhase, $phaseName)); 
   return $query;
}

function update_phaseType($idPhase, $phaseName )
{
   $CI = get_instance();
   $sql = "UPDATE phaseType SET phaseName = ? WHERE idPhase = ? ";

   $query = $CI->db->query($sql, array( $phaseName, $idPhase)); 
   return $query;
}

function delete_phaseType($idPhase)
{
   $CI = get_instance();
   $sql = "DELETE FROM phaseType WHERE idPhase= ? ";

   $query = $CI->db->query($sql, array($idPhase)); 
   return $query;
}

function get_collumns()
{
    return('idPhase', 'phaseName');
}

?>