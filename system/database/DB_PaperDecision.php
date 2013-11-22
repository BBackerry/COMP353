<?php

/**
 * Get a paperDecision by ID
 *
 */
function db_get_paperDecision($idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM paperDecision WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array($idPaper)); 
   return $query;
}

function db_get_all_paperDecision()
{
   $CI = get_instance();
   $sql = "SELECT * FROM paperDecision ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_paperDecision($idPaper, $decision, $decidedBy)
{
   $CI = get_instance();
   $sql = "INSERT INTO paperDecision VALUES( ?, ? , ?)";

   $query = $CI->db->query($sql, array($idPaper, $decision, $decidedBy)); 
   return $query;
}

function update_paperDecision($idPaper, $decision, $decidedBy )
{
   $CI = get_instance();
   $sql = "UPDATE paperDecision SET decision = ?, decidedBy = ? WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array( $decision, $decidedBy, $idPaper)); 
   return $query;
}

function delete_paperDecision($idPaper)
{
   $CI = get_instance();
   $sql = "DELETE FROM paperDecision WHERE idPaper= ? ";

   $query = $CI->db->query($sql, array($idPaper)); 
   return $query;
}

function get_collumns()
{
    return('idPaper', 'decision', 'decidedBy');
}

?>