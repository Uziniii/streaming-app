<?php


class MovieRole extends Role{

    //------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------

    private $_data;

    /**
     * 	Construct Class
     *
     * 	@param array $data An array with the data of a MovieRole
     */
    public function __construct($data, $idPerson) {
        $this->_data = $data;

        parent::__construct($data, $idPerson);
    }

    //------------------------------------------------------------------------------
    // Get Variables
    //------------------------------------------------------------------------------

    /** 
     *  Get the Movie's title of the role
     *
     *  @return string
     */
    public function getMovieTitle() {
        return $this->_data['title'];
    }

    /** 
     *  Get the Movie's id
     *
     *  @return int
     */
    public function getMovieID() {
        return $this->_data['id'];
    }

    /** 
     *  Get the Movie's original title of the role
     *
     *  @return string
     */
    public function getMovieOriginalTitle() {
        return $this->_data['original_title'];
    }

    /** 
     *  Get the Movie's release date of the role
     *
     *  @return string
     */
    public function getMovieReleaseDate() {
        return $this->_data['release_date'];
    }

    //------------------------------------------------------------------------------
    // Export
    //------------------------------------------------------------------------------

    /**
     *  Get the JSON representation of the Episode
     *
     *  @return string
     */
    public function getJSON() {
        return json_encode($this->_data, JSON_PRETTY_PRINT);
    }
}
?>