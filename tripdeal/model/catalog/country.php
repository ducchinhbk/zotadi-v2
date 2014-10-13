<?php

class ModelCatalogCountry extends Model
{
    public function getContinent()
    {
        $query = $this->db->query("SELECT * FROM tour_custom_continent WHERE 1=1");
        return $query->rows;
    }

    public function getCountries($continentName)
    {
        $query = $this->db->query("SELECT * FROM tour_custom_country as country where country.parent_id in (select continent_id from tour_custom_continent where en_name = '" . $continentName . "')");
        return $query->rows;
    }

    public function getCities($countryName)
    {
        $query = $this->db->query("SELECT * FROM tour_custom_city as city where city.parent_id in (select country_id from tour_custom_country where en_name = '" . $countryName . "')");
        return $query->rows;
    }
}

?>