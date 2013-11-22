<?php

/**
 * Get a paperTopics by ID
 *
 */
function db_get_paperTopics($idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM paperTopics WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array($idPaper)); 
   return $query;
}

function db_get_all_paperTopics()
{
   $CI = get_instance();
   $sql = "SELECT * FROM paperTopics ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_paperTopics($idPaper, $idTopic)
{
   $CI = get_instance();
   $sql = "INSERT INTO paperTopics VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idPaper, $idTopic)); 
   return $query;
}

function update_paperTopics($idPaper, $idTopic )
{
   $CI = get_instance();
   $sql = "UPDATE paperTopics SET idTopic = ? WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array( $idTopic, $idPaper)); 
   return $query;
}

function delete_paperTopics($idPaper)
{
   $CI = get_instance();
   $sql = "DELETE FROM paperTopics WHERE idPaper= ? ";

   $query = $CI->db->query($sql, array($idPaper)); 
   return $query;
}

function get_collumns()
{
    return('idPaper', 'idTopic');
}

?>