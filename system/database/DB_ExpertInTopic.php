<?php

/**
 * Get a expertInTopic by ID
 *
 */
function db_get_expertInTopic_of_user($idUser)
{
   $CI = get_instance();
   $sql = "SELECT * FROM expertInTopic WHERE idUser = ? ";

   $query = $CI->db->query($sql, array($idUser)); 
   return $query;
}

function db_get_all_expertInTopic()
{
   $CI = get_instance();
   $sql = "SELECT * FROM expertInTopic ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_get_all_expertInTopic_of_topic($idTopic)
{
   $CI = get_instance();
   $sql = "SELECT * FROM expertInTopic WHERE idTopic = ?";

   $query = $CI->db->query($sql, array($idTopic)); 
   return $query;
}

function db_create_expertInTopic($idUser, $idTopic)
{
   $CI = get_instance();
   $sql = "INSERT INTO expertInTopic VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idUser, $idTopic)); 
   return $query;
}

function delete_expertInTopic($idUser, $idTopic)
{
   $CI = get_instance();
   $sql = "DELETE FROM expertInTopic WHERE idUser= ? AND idTopic = ?";

   $query = $CI->db->query($sql, array($idUser, $idTopic)); 
   return $query;
}

function get_collumns()
{
    return('idUser', 'idTopic');
}

?>