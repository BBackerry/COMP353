<?php

/**
 * Get a reviewAssignment by ID
 *
 */
function db_get_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM reviewAssignment WHERE idAssignedBy = ? AND idAssignedTo = ? AND idPaper = ? ";

   $query = $CI->db->query($sql, array($idAssignedBy, $idAssignedTo, $idPaper)); 
   return $query;
}

function db_get_all_reviewAssignment()
{
   $CI = get_instance();
   $sql = "SELECT * FROM reviewAssignment ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_get_reviewAssignment_by_assigned_by($idAssignedBy)
{
   $CI = get_instance();
   $sql = "SELECT * FROM reviewAssignment WHERE idAssignedBy = ? ";

   $query = $CI->db->query($sql, array($idAssignedBy));
   return $query;
}

function db_get_reviewAssignment_by_assigned_to($idAssignedTo)
{
   $CI = get_instance();
   $sql = "SELECT * FROM reviewAssignment WHERE idAssignedTo = ? ";

   $query = $CI->db->query($sql, array($idAssignedTo));
   return $query;
}

function db_get_reviewAssignment_by_paper($idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM reviewAssignment WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array($idPaper));
   return $query;
}

function db_create_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper, $comment, $score)
{
   $CI = get_instance();
   $sql = "INSERT INTO reviewAssignment VALUES( ?, ?, ?, ?, ?)";

   $query = $CI->db->query($sql, array($idAssignedBy, $idAssignedTo, $idPaper, $comment, $score)); 
   return $query;
}

function update_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper, $comment, $score)
{
   $CI = get_instance();
   $sql = "UPDATE reviewAssignment SET comment = ?, score = ? WHERE idAssignedBy = ? AND idAssignedTo = ? AND idPaper = ? ";

   $query = $CI->db->query($sql, array( $comment, $score, $idAssignedBy, $idAssignedTo, $idPaper)); 
   return $query;
}

function delete_reviewAssignment($idAssignedBy, $idAssignedTo, $idPaper)
{
   $CI = get_instance();
   $sql = "DELETE FROM reviewAssignment WHERE idAssignedBy= ? AND idAssignedTo = ? AND idPaper = ? ";

   $query = $CI->db->query($sql, array($idAssignedBy, $idAssignedTo, $idPaper)); 
   return $query;
}

function get_collumns()
{
    return('idAssignedBy', 'idAssignedTo','idPaper', 'comment','score');
}

?>