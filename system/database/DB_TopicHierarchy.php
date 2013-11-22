<?php

/**
 * Get a topicHierarchy by ID
 *
 */
function db_get_topicHierarchy_of_topic($idTopic)
{
   $CI = get_instance();
   $sql = "SELECT * FROM topicHierarchy WHERE idTopic = ? ";

   $query = $CI->db->query($sql, array($idTopic)); 
   return $query;
}

function db_get_all_topicHierarchy()
{
   $CI = get_instance();
   $sql = "SELECT * FROM topicHierarchy ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_topicHierarchy($idTopic, $idTopicHierarchy)
{
   $CI = get_instance();
   $sql = "INSERT INTO topicHierarchy VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idTopic, $idTopicHierarchy)); 
   return $query;
}

function update_topicHierarchy($idTopic, $idTopicHierarchy )
{
   $CI = get_instance();
   $sql = "UPDATE topicHierarchy SET idTopicHierarchy = ? WHERE idTopic = ? ";

   $query = $CI->db->query($sql, array( $idTopicHierarchy, $idTopic)); 
   return $query;
}

function delete_topicHierarchy($idTopic)
{
   $CI = get_instance();
   $sql = "DELETE FROM topicHierarchy WHERE idTopic= ? ";

   $query = $CI->db->query($sql, array($idTopic)); 
   return $query;
}

function get_collumns()
{
    return('idTopic', 'idTopicHierarchy');
}

?>