<?php


namespace AitsStudentEnrollment\Model;


class CourseSessionInstructors
{

    /**
     * @var CourseSectionSession[]
     */
    protected $courseSessionInstructors;

    /**
     * @return CourseSectionSession[]
     */
    public function getCourseSessionInstructors()
    {
        return $this->courseSessionInstructors;
    }

    /**
     * @param CourseSectionSession[] $courseSessionInstructors
     */
    public function setCourseSessionInstructors($courseSessionInstructors)
    {
        $this->courseSessionInstructors = [];
        foreach($courseSessionInstructors as $courseSessionInstructor) {

            $thisSessionInstructor = new CourseSessionInstructor();
            $thisSessionInstructor->setFromArray($courseSessionInstructor);
            $this->courseSessionInstructors[] = $thisSessionInstructor;

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

            $this->setCourseSessionInstructors($array);

        }

    }

}