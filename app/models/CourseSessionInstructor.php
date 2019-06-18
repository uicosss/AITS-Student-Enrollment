<?php


namespace AitsStudentEnrollment\Model;


class CourseSessionInstructor
{

    /**
     * @var LightweightPerson
     */
    protected $lightweightPerson;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @return LightweightPerson
     */
    public function getLightweightPerson()
    {
        return $this->lightweightPerson;
    }

    /**
     * @param LightweightPerson $lightweightPerson
     */
    public function setLightweightPerson($lightweightPerson)
    {
        $this->lightweightPerson = new LightweightPerson();
        $this->lightweightPerson->setFromArray($lightweightPerson);
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['lightweightPerson'])) {

            $this->setLightweightPerson($array['lightweightPerson']);

        }

        if(!empty($array['emailAddress'])) {

            $this->setEmailAddress($array['emailAddress']);

        }

    }
}