<?php


namespace AitsStudentEnrollment\Model;


class ValidGradingMode
{

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $description;

    /**
     * ValidEnrollmentStatus constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['code'])) {

            $this->setCode($array['code']);

        }

        if(!empty($array['description'])) {

            $this->setDescription($array['description']);

        }

    }

}