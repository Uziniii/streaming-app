<?php 

class Certification {

    private $_data; 

    public function __construct($data) {
        $this->_data = $data;
    }

    public function getCertification() {
        return $this->_data['certification'];
    }

    public function getMeaning() {
        return $this->_data['meaning'];
    }

    public function getOrder() {
        retunr $this->_data['order'];
    }
}



?>