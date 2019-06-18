<?php


namespace AitsStudentEnrollment\Model;


class CourseRegistrations implements \Countable
{

    /**
     * @var CourseRegistration[]
     */
    protected $courseRegistrations;

    protected $_myCount = 0;

    /**
     * @return CourseRegistration[]
     */
    public function getCourseRegistrations()
    {
        return $this->courseRegistrations;
    }

    /**
     * @param CourseRegistration[] $courseRegistrations
     */
    public function setCourseRegistrations($courseRegistrations)
    {
        $this->courseRegistrations = [];
        foreach($courseRegistrations as $courseRegistration) {

            $thisCourseRegistration = new CourseRegistration();
            $thisCourseRegistration->setFromArray($courseRegistration);
            $this->courseRegistrations[] = $thisCourseRegistration;

        }
    }

    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array)) {

            $this->setCourseRegistrations($array);

        }

    }

    public function count()
    {
        $this->_myCount = !empty($this->courseRegistrations)
            ? count($this->courseRegistrations)
            : 0;

        return $this->_myCount;
    }

}