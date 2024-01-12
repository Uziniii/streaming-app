<?php


class Genre {

    //------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------

    private $_data;

    /**
     *  Construct Class
     *
     *  @param array $data An array with the data of a Collection
     */
    public function __construct($data) {
        $this->_data = $data;
    }

    //------------------------------------------------------------------------------
    // Get Variables
    //------------------------------------------------------------------------------

    /** 
     *  Get the Genre's name
     *
     *  @return string
     */
    public function getName() {
        return $this->_data['name'];
    }

    /** 
     *  Get the Genre's id
     *
     *  @return int
     */
    public function getID() {
        return $this->_data['id'];
    }
}
?>