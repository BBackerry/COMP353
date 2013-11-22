<?php

/**
 * Get a CommiteeBid by ID
 *
 */
function db_get_commiteeBid($idUser, $idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM commiteeBid WHERE idUser = ? AND idPaper = ? ";

   $query = $CI->db->query($sql, array($idUser, $idPaper)); 
   return $query;
}

function db_get_all_commiteeBid()
{
   $CI = get_instance();
   $sql = "SELECT * FROM commiteeBid ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_get_commiteeBid_by_user($idUser)
{
   $CI = get_instance();
   $sql = "SELECT * FROM commiteeBid WHERE idUser = ? ";

   $query = $CI->db->query($sql, array($idUser));
   return $query;
}

function db_get_commiteeBid_by_paper($idPaper)
{
   $CI = get_instance();
   $sql = "SELECT * FROM commiteeBid WHERE idPaper = ? ";

   $query = $CI->db->query($sql, array($idPaper));
   return $query;
}

function db_create_commiteeBid($idUser, $idPaper, $bid)
{
   $CI = get_instance();
   $sql = "INSERT INTO commiteeBid VALUES( ?, ?, ?)";

   $query = $CI->db->query($sql, array($idUser, $idPaper, $bid)); 
   return $query;
}

function update_commiteeBid($idUser, $idPaper, $bid)
{
   $CI = get_instance();
   $sql = "UPDATE commiteeBid SET bid = ? WHERE idUser = ? AND idPaper = ?";

   $query = $CI->db->query($sql, array( $bid, $idUser, $idPaper)); 
   return $query;
}

function delete_CommiteeBid($idUser, $idPaper)
{
   $CI = get_instance();
   $sql = "DELETE FROM CommiteeBid WHERE idUser= ? AND idPaper = ?";

   $query = $CI->db->query($sql, array($idUser, $idPaper)); 
   return $query;
}

function get_collumns()
{
    return('idUser', 'idPaper','bid');
}

?>