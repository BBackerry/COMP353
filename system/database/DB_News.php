<?php

/**
 * Get a news by ID
 *
 */
function db_get_news($idNews)
{
   $CI = get_instance();
   $sql = "SELECT * FROM news WHERE idNews = ? ";

   $query = $CI->db->query($sql, array($idNews)); 
   return $query;
}

function db_get_all_news()
{
   $CI = get_instance();
   $sql = "SELECT * FROM news ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_news($idNews, $newsDescription, $createdBy)
{
   $CI = get_instance();
   $sql = "INSERT INTO news VALUES( ?, ?, ?)";

   $query = $CI->db->query($sql, array($idNews, $newsDescription, $createdBy)); 
   return $query;
}

function update_news($idNews, $newsDescription, $createdBy)
{
   $CI = get_instance();
   $sql = "UPDATE news SET newsDescription = ?, createdBy = ? WHERE idNews = ?";

   $query = $CI->db->query($sql, array( $newsDescription, $createdBy, $idNews)); 
   return $query;
}

function delete_news($idNews)
{
   $CI = get_instance();
   $sql = "DELETE FROM news WHERE idNews= ? ";

   $query = $CI->db->query($sql, array($idNews)); 
   return $query;
}

function get_collumns()
{
    return('idNews', 'newsDescription','createdBy');
}

?>