<?php

/**
 * Get a interestInTopic by ID
 *
 */
function db_get_interestInTopic_of_user($idUser)
{
   $CI = get_instance();
   $sql = "SELECT * FROM interestInTopic WHERE idUser = ? ";

   $query = $CI->db->query($sql, array($idUser)); 
   return $query;
}

function db_get_all_interestInTopic()
{
   $CI = get_instance();
   $sql = "SELECT * FROM interestInTopic ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_get_all_interestInTopic_of_topic($idTopic)
{
   $CI = get_instance();
   $sql = "SELECT * FROM interestInTopic WHERE idTopic = ?";

   $query = $CI->db->query($sql, array($idTopic)); 
   return $query;
}

function db_create_interestInTopic($idUser, $idTopic)
{
   $CI = get_instance();
   $sql = "INSERT INTO interestInTopic VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idUser, $idTopic)); 
   return $query;
}

function delete_interestInTopic($idUser, $idTopic)
{
   $CI = get_instance();
   $sql = "DELETE FROM interestInTopic WHERE idUser= ? AND idTopic = ?";

   $query = $CI->db->query($sql, array($idUser, $idTopic)); 
   return $query;
}

function get_collumns()
{
    return('idUser', 'idTopic');
}

?>