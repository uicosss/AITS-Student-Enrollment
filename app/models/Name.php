<?php


namespace App\Model;


class Name
{

    protected $type;

    protected $current;

    protected $lastName;

    protected $firstName;

    protected $middleName;

    /**
     * Name constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param mixed $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }



    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['type'])) {

            $this->setType($array['type']);

        }

        if(!empty($array['current'])) {

            $this->setCurrent($array['current']);

        }

        if(!empty($array['firstName'])) {

            $this->setFirstName($array['firstName']);

        }

        if(!empty($array['lastName'])) {

            $this->setLastName($array['lastName']);

        }

        if(!empty($array['middleName'])) {

            $this->setMiddleName($array['middleName']);

        }

    }

}