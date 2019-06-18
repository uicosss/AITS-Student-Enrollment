<?php


namespace App\Model;


class LightweightPerson
{

    protected $name;

    protected $institutionalId;

    /**
     * LightweightPerson constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(Array $name)
    {
        $this->name = new Name();
        $this->name->setFromArray($name);
    }

    /**
     * @return mixed
     */
    public function getInstitutionalId()
    {
        return $this->institutionalId;
    }

    /**
     * @param mixed $institutionalId
     */
    public function setInstitutionalId($institutionalId)
    {
        $this->institutionalId = $institutionalId;
    }

    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['institutionalId'])) {

            $this->setInstitutionalId($array['institutionalId']);

        }

        if(!empty($array['name'])) {

            $this->setName($array['name']);

        }

    }

}