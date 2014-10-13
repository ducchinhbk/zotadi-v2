<?php

class ModelCatalogCustomtour extends Model
{
    public function saveCustomTour($dataArray)
    {
        $query1 = $this->db->query("SELECT customer_id from customer where email = '" . $dataArray['email'] . "'");
        $customer_id = $query1->rows;
        $logger = new Log('customtour_model.log');

        $logger->write('customer_id getedd.......');

        if ($customer_id == null) {
            $logger->write('prepare insert new customer');
            $this->db->query("insert into customer(store_id,firstname,lastname,email,telephone,address_id,customer_group_id, birthdate) VALUES (0, '" . $dataArray['firstname'] . "','" . $dataArray['lastname'] . "','" . $dataArray['email'] . "','" . $dataArray['telephone'] . "',3,2,'". $dataArray['customer_birthday'] . "')");
            $logger->write('insert successfull');
            $customer_id = $this->db->getLastId();
        }else{
            $customer_id = $customer_id[0]['customer_id'];
        }
        $this->db->query("INSERT INTO tour_custom_orders
        (continent,countries,cities,location,startdate,numdate,tripname,travelStyle, accommodation,minBudget,includeLike,maxBudget,customer_id,residence,numAdults,numChild,numUnderChild,postcode,zone_id,status,reason)
        VALUES
        ('','','" . $dataArray['cities'] . "','','" . $dataArray['startdate'] . "','" . $dataArray['numdate'] . "','" . $dataArray['tripname']
            . "','" . implode(",", $dataArray['suites']) . "','" . implode(",", $dataArray['accommodation']) . "','" . $dataArray['step3_minprice']
            . "','" . $dataArray['step3_ideal'] . "','" . $dataArray['step3_maxprice']
            . "','" . $customer_id . "','', '" . $dataArray['numAdults']
            . "','" . $dataArray['numChild']
            . "','" . $dataArray['numChild'] . "','" . $dataArray['postcode'] . "','" . $dataArray['zone_id'] . "', 'new',''); ");
        $logger->write("insert custom tour successfull");
    }

    public function getcustomtour($start = 0, $limit = 10)
    {
        $start = $start * $limit;
        $query = $this->db->query("SELECT * FROM `custom_tour` WHERE status <> 'Done' AND status <> 'Cancel' ORDER BY startdate desc LIMIT " . (int)$start . "," . (int)$limit);
        return $query->rows;
    }

    public function updatecustomtour($tourId, $status, $reason)
    {
        $this->db->query("UPDATE `custom_tour` SET status='" . $status . "', reason='" . $reason . "' WHERE custom_tour_id=" . $tourId);
    }
}

?>