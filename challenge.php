<?php

class Instrument {
	/**
	 * @var int $numberOfStrings
	 */
	protected $numberOfStrings;
	/**
	 * @var string $typeOfInstrument
	 */
	protected $typeOfInstrument;

	public  function __construct(int $newNumberOfStrings, string $newTypeOfInstrument) {
		$this->setNumberOfStrings($newNumberOfStrings);
		$this->setTypeOfInstrument($newTypeOfInstrument);

	}

	/**
	 * Accessor method for number of strings
	 *
	 * @return int value of number of strings
	 **/
	public function getNumberOfStrings() : int {
		return($this->numberOfStrings);
	}

	/**
	 * Mutator method for number of strings
	 *
	 * @param int $newNumberOfStrings new value of number of strings
	 * @throws \RangeException if number of strings is < 0
	 * @throws \TypeError if data type is not an integer
	 **/
	public function setNumberOfStrings(int $newNumberOfStrings) : void {
		if($newNumberOfStrings < 0) {
			throw (new \RangeException("Number of strings cannot be negative"));
		}
		$this->numberOfStrings = $newNumberOfStrings;
	}

	/**
	 * Accessor method for type of instrument
	 * @return string value of type of instrument
	 **/
	public function getTypeOfInstrument() : string {
		return($this->typeOfInstrument);
	}

	/**
	 * Mutator method for type of instrument
	 *
	 * @param string $newTypeOfInstrument new value of type of instrument
	 * @throws \InvalidArgumentException if string is empty or insecure
	 * @throws \TypeError if data value is not a string
	 **/
	public function setTypeOfInstrument(string $newTypeOfInstrument) : void {
		//Trims and filters the string
		$newTypeOfInstrument = trim($newTypeOfInstrument);
		$newTypeOfInstrument = filter_var($newTypeOfInstrument, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newTypeOfInstrument) === true ) {
			throw (new \InvalidArgumentException("Type of instrument is empty or insecure"));
		}
		$this->typeOfInstrument = $newTypeOfInstrument;
	}
}

trait Tunes {
	/**
	 * @var bool $isTuned
	 **/
	protected $isTuned;

	/**
	 * Accessor method for isTuned
	 * @return bool
	 */
	public function getIsTuned() : bool {
		return($this->isTuned);
	}

	/**
	 * Mutator method for isTuned
	 * @param $newIsTuned
	 * @throws \TypeError if value is not a boolean
	 */
	public function setIsTuned(bool $newIsTuned) : void {
		$this->isTuned = $newIsTuned;
	}

	public function isTuned() : void {
		if($this->isTuned === true) {
			echo "Play on good sir" . PHP_EOL;
		} else {
			echo "You really should get that tuned!" . PHP_EOL;
		}
	}
}

class Guitar extends Instrument {
	use Tunes;
	/**
	 * @var string $maker
	 **/
	protected $maker;

	/**
	 * constructor method
	 *
	 * @param $newNumberOfStrings
	 * @param $newTypeOfInstrument
	 * @param $newMaker
	 **/
	public function __construct(int $newNumberOfStrings, string $newTypeOfInstrument, $newMaker) {
		parent::__construct($newNumberOfStrings, $newTypeOfInstrument);
		$this->setMaker($newMaker);
	}

	/**
	 * Accessor method for maker
	 *
	 * @return string value of maker
	 **/
	public function getMaker() : string {
		return($this->maker);
	}

	/**
	 * Mutator method for maker
	 *
	 * @param string $newMaker new value of maker
	 * @throws \InvalidArgumentException if value is empty or insecure
	 * @throws \TypeError if value is not a string
	 **/
	public function setMaker(string $newMaker) : void {
		//Trim and filter the string
		$newMaker = trim($newMaker);
		$newMaker = filter_var($newMaker, FILTER_SANITIZE_STRING,  FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newMaker) === true) {
			throw (new \InvalidArgumentException("Maker is empty or insecure"));
		}
		$this->maker = $newMaker;
	}
}

class Piano extends Instrument {
	/**
	 * @var string $model
	 **/
	protected $model;

	/**
	 * constructor method for Piano
	 **/
	public function __construct(int $newNumberOfStrings, string $newTypeOfInstrument, string $newModel) {
		parent::__construct($newNumberOfStrings, $newTypeOfInstrument);
		$this->setModel($newModel);
	}

	/**
	 * Accessor method for model
	 * @return string value of model
	 **/
	public function getModel() : string {
		return($this->model);
	}

	/**
	 * Mutator method for model
	 * @param string $newModel new value of model
	 * @throws \InvalidArgumentException if value is empty or insecure
	 * @throws \TypeError if value is not a string
	 **/
	public function setModel(string $newModel) : void {
		//Trim and filter the string
		$newModel = trim($newModel);
		$newModel = filter_var($newModel, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newModel) === true) {
			throw (new \InvalidArgumentException("Model is empty or insecure"));
		}

		$this->model = $newModel;
	}
}