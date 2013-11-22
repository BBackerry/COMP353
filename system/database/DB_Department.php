<?php

/**
 * Get a department by ID
 *
 */
function db_get_department($idDepartment)
{
   $CI = get_instance();
   $sql = "SELECT * FROM department WHERE idDepartment = ? ";

   $query = $CI->db->query($sql, array($idDepartment)); 
   return $query;
}

function db_get_all_department()
{
   $CI = get_instance();
   $sql = "SELECT * FROM department ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_department($idDepartment, $departmentName)
{
   $CI = get_instance();
   $sql = "INSERT INTO department VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idDepartment, $departmentName)); 
   return $query;
}

function update_department($idDepartment, $departmentName )
{
   $CI = get_instance();
   $sql = "UPDATE department SET departmentName = ? WHERE idDepartment = ? ";

   $query = $CI->db->query($sql, array( $departmentName, $idDepartment)); 
   return $query;
}

function delete_department($idDepartment)
{
   $CI = get_instance();
   $sql = "DELETE FROM department WHERE idDepartment= ? ";

   $query = $CI->db->query($sql, array($idDepartment)); 
   return $query;
}

function get_collumns()
{
    return('idDepartment', 'departmentName');
}

?>