<?php

/**
 * Get a topic by ID
 *
 */
function db_get_topic($idTopic)
{
   $CI = get_instance();
   $sql = "SELECT * FROM topic WHERE idTopic = ? ";

   $query = $CI->db->query($sql, array($idTopic)); 
   return $query;
}

function db_get_all_topic()
{
   $CI = get_instance();
   $sql = "SELECT * FROM topic ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_topic($idTopic, $topicName)
{
   $CI = get_instance();
   $sql = "INSERT INTO topic VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idTopic, $topicName)); 
   return $query;
}

function update_topic($idTopic, $topicName )
{
   $CI = get_instance();
   $sql = "UPDATE topic SET topicName = ? WHERE idTopic = ? ";

   $query = $CI->db->query($sql, array( $topicName, $idTopic)); 
   return $query;
}

function delete_topic($idTopic)
{
   $CI = get_instance();
   $sql = "DELETE FROM topic WHERE idTopic= ? ";

   $query = $CI->db->query($sql, array($idTopic)); 
   return $query;
}

function get_collumns()
{
    return('idTopic', 'topicName');
}

?>