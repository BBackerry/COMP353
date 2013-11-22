<?php

/**
 * Get a paper by ID
 *
 */
function db_get_paper($idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM paper WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array($idPaper)); 
   return $query;
}

function db_create_paper($idpaper, $title, $abstract, $submittedby, $document, $keywords)
{
   $CI = get_instance();
   $sql = "INSERT INTO paper VALUES( ?, ?, ?, ?, ?, ?)";

   $query = $CI->db->query($sql, array($idpaper, $title, $abstract, $submittedby, $document, $keywords)); 
   return $query;
}

function update_paper($idpaper, $title, $abstract, $submittedby, $document, $keywords)
{
   $CI = get_instance();
   $sql = "UPDATE paper SET title = ?, abstract = ?, submittedBy = ?, document = ?, keywords = ? WHERE idPaper = ?";

   $query = $CI->db->query($sql, array( $title, $abstract, $submittedby, $document, $keywords, $idpaper)); 
   return $query;
}

function delete_paper($idpaper)
{
   $CI = get_instance();
   $sql = "DELETE FROM paper WHERE idPaper= ? ";

   $query = $CI->db->query($sql, array($idpaper)); 
   return $query;
}

function get_collumns()
{
    return('idPaper', 'title','abstract','submittedBy','document', 'keywords');
}

?>