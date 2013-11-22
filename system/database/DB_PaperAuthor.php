<?php

/**
 * Get a paperAuthor by ID
 *
 */
function db_get_paperAuthor($idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM paperAuthor WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array($idPaper)); 
   return $query;
}

function db_get_all_paperAuthor()
{
   $CI = get_instance();
   $sql = "SELECT * FROM paperAuthor ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_paperAuthor($idPaper, $idUser)
{
   $CI = get_instance();
   $sql = "INSERT INTO paperAuthor VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idPaper, $idUser)); 
   return $query;
}

function delete_paperAuthor($idPaper, $idUser)
{
   $CI = get_instance();
   $sql = "DELETE FROM paperAuthor WHERE idPaper= ? AND idUser = ?";

   $query = $CI->db->query($sql, array($idPaper, $idUser)); 
   return $query;
}

function get_collumns()
{
    return('idPaper', 'idUser');
}

?>