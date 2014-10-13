<?php

class ModelCommonFeedback extends Model
{
    public function insertFeedback($email, $message)
    {
        $this->db->query("INSERT INTO feedback (email, message) VALUES ('" . $email . "','" . $message . "')");
    }
}
?>