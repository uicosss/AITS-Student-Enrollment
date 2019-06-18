<?php


namespace AitsStudentEnrollment\Model;


use Carbon\Carbon;

class CourseSection
{

    /**
     * @var string
     */
    protected $courseReferenceNumber;

    /**
     * @var ValidTerm;
     */
    protected $validTerm;

    /**
     * @var Course
     */
    protected $course;

    /**
     * @var
     */
    protected $courseSectionSessions;

    /**
     * @var float
     */
    protected $creditHours;

    /**
     * @var ValidPartTerm
     */
    protected $validPartTerm;

    /**
     * @var Carbon
     */
    protected $startDate;

    /**
     * @var Carbon
     */
    protected $endDate;

    /**
     * @return string
     */
    public function getCourseReferenceNumber()
    {
        return $this->courseReferenceNumber;
    }

    /**
     * @param string $courseReferenceNumber
     */
    public function setCourseReferenceNumber($courseReferenceNumber)
    {
        $this->courseReferenceNumber = $courseReferenceNumber;
    }

    /**
     * @return ValidTerm
     */
    public function getValidTerm()
    {
        return $this->validTerm;
    }

    /**
     * @param ValidTerm $validTerm
     */
    public function setValidTerm($validTerm)
    {
        $this->validTerm = new ValidTerm();
        $this->validTerm->setFromArray($validTerm);
    }

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param Course $course
     */
    public function setCourse($course)
    {
        $this->course = new Course();
        $this->course->setFromArray($course);
    }

    /**
     * @return mixed
     */
    public function getCourseSectionSessions()
    {
        return $this->courseSectionSessions;
    }

    /**
     * @param mixed $courseSectionSessions
     */
    public function setCourseSectionSessions($courseSectionSessions)
    {
        $this->courseSectionSessions = new CourseSectionSessions();
        $this->courseSectionSessions->setFromArray($courseSectionSessions);
    }

    /**
     * @return float
     */
    public function getCreditHours()
    {
        return $this->creditHours;
    }

    /**
     * @param float $creditHours
     */
    public function setCreditHours($creditHours)
    {
        $this->creditHours = $creditHours;
    }

    /**
     * @return ValidPartTerm
     */
    public function getValidPartTerm()
    {
        return $this->validPartTerm;
    }

    /**
     * @param ValidPartTerm $validPartTerm
     */
    public function setValidPartTerm($validPartTerm)
    {
        $this->validPartTerm = $validPartTerm;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = Carbon::createFromFormat('M j, Y, h:i:s A', $startDate);
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = Carbon::createFromFormat('M j, Y, h:i:s A', $endDate);
    }


    /**
     * Void method used to set the Object based on values passed in from an Array
     *
     * @param array $array
     */
    public function setFromArray(Array $array)
    {

        if(!empty($array['courseReferenceNumber'])) {

            $this->setCourseReferenceNumber($array['courseReferenceNumber']);

        }

        if(!empty($array['validTerm'])) {

            $this->setValidTerm($array['validTerm']);

        }

        if(!empty($array['course'])) {

            $this->setCourse($array['course']);

        }

        if(!empty($array['courseSectionSession'])) {

            $this->setCourseSectionSessions($array['courseSectionSession']);

        }

        if(!empty($array['creditHours'])) {

            $this->setCreditHours($array['creditHours']);

        }

        if(!empty($array['validPartTerm'])) {

            $this->setValidPartTerm($array['validPartTerm']);

        }

        if(!empty($array['startDate'])) {

            $this->setStartDate($array['startDate']);

        }

        if(!empty($array['endDate'])) {

            $this->setEndDate($array['endDate']);

        }

    }

}