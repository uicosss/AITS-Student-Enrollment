<?php


namespace App\Model;


class Course
{

    /**
     * @var string
     */
    protected $courseSubjectAbbreviation;

    /**
     * @var string
     */
    protected $courseNumber;

    /**
     * @var ValidCampus
     */
    protected $validCampus;

    /**
     * @var string
     */
    protected $courseTitle;

    /**
     * @var ValidCollege
     */
    protected $validCollege;

    /**
     * @var ValidDepartment
     */
    protected $validDepartment;

    /**
     * @return string
     */
    public function getCourseSubjectAbbreviation()
    {
        return $this->courseSubjectAbbreviation;
    }

    /**
     * @param string $courseSubjectAbbreviation
     */
    public function setCourseSubjectAbbreviation($courseSubjectAbbreviation)
    {
        $this->courseSubjectAbbreviation = $courseSubjectAbbreviation;
    }

    /**
     * @return string
     */
    public function getCourseNumber()
    {
        return $this->courseNumber;
    }

    /**
     * @param string $courseNumber
     */
    public function setCourseNumber($courseNumber)
    {
        $this->courseNumber = $courseNumber;
    }

    /**
     * @return ValidCampus
     */
    public function getValidCampus()
    {
        return $this->validCampus;
    }

    /**
     * @param ValidCampus $validCampus
     */
    public function setValidCampus($validCampus)
    {
        $this->validCampus = new ValidCampus();
        $this->validCampus->setFromArray($validCampus);
    }

    /**
     * @return string
     */
    public function getCourseTitle()
    {
        return $this->courseTitle;
    }

    /**
     * @param string $courseTitle
     */
    public function setCourseTitle($courseTitle)
    {
        $this->courseTitle = $courseTitle;
    }

    /**
     * @return ValidCollege
     */
    public function getValidCollege()
    {
        return $this->validCollege;
    }

    /**
     * @param ValidCollege $validCollege
     */
    public function setValidCollege($validCollege)
    {
        $this->validCollege = new ValidCollege();
        $this->validCollege->setFromArray($validCollege);
    }

    /**
     * @return ValidDepartment
     */
    public function getValidDepartment()
    {
        return $this->validDepartment;
    }

    /**
     * @param ValidDepartment $validDepartment
     */
    public function setValidDepartment($validDepartment)
    {
        $this->validDepartment = new ValidDepartment();
        $this->validDepartment->setFromArray($validDepartment);
    }

    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['courseSubjectAbbreviation'])) {

            $this->setCourseSubjectAbbreviation($array['courseSubjectAbbreviation']);

        }

        if(!empty($array['courseNumber'])) {

            $this->setCourseNumber($array['courseNumber']);

        }

        if(!empty($array['validCampus'])) {

            $this->setValidCampus($array['validCampus']);

        }

        if(!empty($array['courseTitle'])) {

            $this->setCourseTitle($array['courseTitle']);

        }

        if(!empty($array['validCollege'])) {

            $this->setValidCollege($array['validCollege']);

        }

        if(!empty($array['validDepartment'])) {

            $this->setValidDepartment($array['validDepartment']);

        }

    }

}