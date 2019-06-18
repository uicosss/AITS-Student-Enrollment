<?php


namespace App\Model;


class CourseRegistration
{

    /**
     * @var ValidRegistrationStatus
     */
    protected $validRegistrationStatus;

    /**
     * @var ValidGradingMode
     */
    protected $validGradingMode;

    protected $courseSection;

    /**
     * @return ValidRegistrationStatus
     */
    public function getValidRegistrationStatus()
    {
        return $this->validRegistrationStatus;
    }

    /**
     * @param ValidRegistrationStatus $validRegistrationStatus
     */
    public function setValidRegistrationStatus($validRegistrationStatus)
    {
        $this->validRegistrationStatus = $validRegistrationStatus;
    }

    /**
     * @return ValidGradingMode
     */
    public function getValidGradingMode()
    {
        return $this->validGradingMode;
    }

    /**
     * @param ValidGradingMode $validGradingMode
     */
    public function setValidGradingMode($validGradingMode)
    {
        $this->validGradingMode = $validGradingMode;
    }

    /**
     * @return mixed
     */
    public function getCourseSection()
    {
        return $this->courseSection;
    }

    /**
     * @param mixed $courseSection
     */
    public function setCourseSection($courseSection)
    {
        $this->courseSection = new CourseSection();
        $this->courseSection->setFromArray($courseSection);
    }

    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['validRegistrationStatus'])) {

            $this->setValidRegistrationStatus($array['validRegistrationStatus']);

        }

        if(!empty($array['validGradingMode'])) {

            $this->setValidGradingMode($array['validGradingMode']);

        }

        if(!empty($array['courseSection'])) {

            $this->setCourseSection($array['courseSection']);

        }

    }

}