<?php


namespace AitsStudentEnrollment\Model;


class StudentEnrollment
{

    /**
     * @var LightweightPerson
     */
    public $lightweightPerson;

    /**
     * @var ValidEnrollmentStatus
     */
    public $validEnrollmentStatus;

    /**
     * @var ValidTerm
     */
    public $validTerm;

    /**
     * @var
     */
    public $courseRegistrations;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getLightweightPerson()
    {
        return $this->lightweightPerson;
    }

    /**
     * @param mixed $lightweightPerson
     */
    public function setLightweightPerson($lightweightPerson)
    {
        $this->lightweightPerson = $lightweightPerson;
    }

    /**
     * @return mixed
     */
    public function getValidEnrollmentStatus()
    {
        return $this->validEnrollmentStatus;
    }

    /**
     * @param mixed $validEnrollmentStatus
     */
    public function setValidEnrollmentStatus($validEnrollmentStatus)
    {
        $this->validEnrollmentStatus = $validEnrollmentStatus;
    }

    /**
     * @return mixed
     */
    public function getValidTerm()
    {
        return $this->validTerm;
    }

    /**
     * @param mixed $validTerm
     */
    public function setValidTerm($validTerm)
    {
        $this->validTerm = $validTerm;
    }

    /**
     * @return array
     */
    public function getCourseRegistrations()
    {
        return $this->courseRegistrations;
    }

    /**
     * @param array $courseRegistrations
     */
    public function setCourseRegistration($courseRegistrations)
    {
        $this->courseRegistrations = $courseRegistrations;
    }

    public function setFromJson($json)
    {

        $array = json_decode($json,TRUE);

        if(empty($array)) {

            throw new \Exception('Parsed JSON Object cannot be empty');

        }

        // Note: based on structure, $array['queryRequestResult'] could potentially have many child arrays, ie.
        // $array['queryRequestResult'][0], $array['queryRequestResult'][1], etc.
        // Only taking care of the first one here

        // LightweightPerson
        $lighweightPerson = new LightweightPerson();
        $lighweightPerson->setFromArray($array['queryRequestResult'][0]['lightweightPerson']);
        $this->setLightweightPerson($lighweightPerson);

        // validEnrollmentStatus
        $validEnrollmentStatus = new ValidEnrollmentStatus();
        $validEnrollmentStatus->setFromArray($array['queryRequestResult'][0]['validEnrollmentStatus']);
        $this->setValidEnrollmentStatus($validEnrollmentStatus);

        // validTerm
        $validTerm = new ValidTerm();
        $validTerm->setFromArray($array['queryRequestResult'][0]['validTerm']);
        $this->setValidTerm($validTerm);

        // courseRegistration
        $courseRegistrations = new CourseRegistrations();
        $courseRegistrations->setFromArray($array['queryRequestResult'][0]['courseRegistration']);
        $this->setCourseRegistration($courseRegistrations);

//        print_r($array);
        print_r($this);
        die();

    }
}