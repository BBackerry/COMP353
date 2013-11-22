<?php

/**
 * Get a country by ID
 *
 */
function db_get_country($idCountry)
{
   $CI = get_instance();
   $sql = "SELECT * FROM country WHERE idCountry = ? ";

   $query = $CI->db->query($sql, array($idCountry)); 
   return $query;
}

function db_get_all_country()
{
   $CI = get_instance();
   $sql = "SELECT * FROM country ";

   $query = $CI->db->query($sql); 
   return $query;
}

function db_create_country($idCountry, $countryName)
{
   $CI = get_instance();
   $sql = "INSERT INTO country VALUES( ?, ? )";

   $query = $CI->db->query($sql, array($idCountry, $countryName)); 
   return $query;
}

function update_country($idCountry, $countryName )
{
   $CI = get_instance();
   $sql = "UPDATE country SET countryName = ? WHERE idCountry = ? ";

   $query = $CI->db->query($sql, array( $countryName, $idCountry)); 
   return $query;
}

function delete_country($idCountry)
{
   $CI = get_instance();
   $sql = "DELETE FROM country WHERE idCountry= ? ";

   $query = $CI->db->query($sql, array($idCountry)); 
   return $query;
}

function get_collumns()
{
    return('idCountry', 'countryName');
}

?>