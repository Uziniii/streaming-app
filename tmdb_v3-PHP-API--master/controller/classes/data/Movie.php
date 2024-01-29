<?php

class Movie extends ApiBaseObject{

	private $_tmdb;

	//------------------------------------------------------------------------------
	// Get Variables
	//------------------------------------------------------------------------------

	/** 
	 * 	Get the Movie's title
	 *
	 * 	@return string
	 */
	public function getTitle() {
		return $this->_data['title'];
	}

	/** 
	 * 	Get the Movie's tagline
	 *
	 * 	@return string
	 */
	public function getTagline() {
		return $this->_data['tagline'];
	}

	/** 
	 * 	Get the Movie's budget
	 *
	 * 	@return int
	 */
	public function getBudget() {
		return $this->_data['budget'];
	}

	/** 
	 * 	Get the Movie's runtime
	 *
	 * 	@return int
	 */
	public function getRuntime() {
		return $this->_data['runtime'];
	}

	public function getCountryCode() {
		$productionCountries =  $this->_data['production_countries'];

		if (!empty($productionCountries) && is_array($productionCountries)) {
			$firstCountry = reset($productionCountries); 
			$countryCode = $firstCountry['iso_3166_1'];
			return $countryCode;
		} else {
			return null;
		}
	}

	/** 
	 * 	Get the Movie's certifications 
	 *
	 * 	@return string
	 */
	public function getCertification() {
	
		$certifications = $this->getCertifications();
	
		$certification = "";
	
		$certification = $certifications["US"];
	
		return $certification;
	}
	

	

	/** 
	 * 	Get the Movie Directors IDs
	 *
	 * 	@return array(int)
	 */
	public function getDirectorIds() {

		$director_ids = [];

		$crew = $this->getCrew();

		/** @var Person $crew_member */
        foreach ($crew as $crew_member) {

			if ($crew_member->getJob() === Person::JOB_DIRECTOR){
				$director_ids[] = $crew_member->getID();
			}
		}
		return $director_ids;
	}
	/** 
	 * 	Get the Movie's trailers
	 *
	 * 	@return array
	 */
	public function getTrailers() {
		return $this->_data['trailers'];
	}

	/** 
	 * 	Get the Movie's trailer
	 *
	 * 	@return string | null
	 */
	public function getTrailer() {
		$trailers = $this->getTrailers();

		if (!array_key_exists('youtube', $trailers)) {
			return null;
		}

		if (count($trailers['youtube']) === 0) {
			return null;
		}

		return $trailers['youtube'][0]['source'];
	}

	/** 
	 * 	Get the Movie's reviews
	 *
	 * 	@return Review[]
	 */
	public function getReviews() {
		$reviews = array();

		foreach ($this->_data['review']['result'] as $data) {
			$reviews[] = new Review($data);
		}

		return $reviews;
	}

	/**
	 * 	Get the Movie's companies
	 *
	 * 	@return Company[]
	 */
	public function getCompanies() {
		$companies = array();
		
		foreach ($this->_data['production_companies'] as $data) {
			$companies[] = new Company($data);
		}
		
		return $companies;
	}

	//------------------------------------------------------------------------------
	// Import an API instance
	//------------------------------------------------------------------------------

	/**
	 *	Set an instance of the API
	 *
	 *	@param TMDB $tmdb An instance of the api, necessary for the lazy load
	 */
	public function setAPI($tmdb){
		$this->_tmdb = $tmdb;
	}

	//------------------------------------------------------------------------------
	// Export
	//------------------------------------------------------------------------------

	/** 
	 * 	Get the JSON representation of the Movie
	 *
	 * 	@return string
	 */
	public function getJSON() {
		return json_encode($this->_data);
	}


	/**
	 * @return string
	 */
	public function getMediaType(){
		return self::MEDIA_TYPE_MOVIE;
	}
}
