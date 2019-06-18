<?php


namespace AitsStudentEnrollment\Model;


use Carbon\Carbon;

class CourseSectionSession
{

    protected $courseSectionSessionID;

    /**
     * @var string
     */
    protected $meetsOnSundayFlag;

    /**
     * @var string
     */
    protected $meetsOnMondayFlag;

    /**
     * @var string
     */
    protected $meetsOnTuesdayFlag;

    /**
     * @var string
     */
    protected $meetsOnWednesdayFlag;

    /**
     * @var string
     */
    protected $meetsOnThursdayFlag;

    /**
     * @var string
     */
    protected $meetsOnFridayFlag;

    /**
     * @var string
     */
    protected $meetsOnSaturdayFlag;

    /**
     * @var CourseSessionInstructors
     */
    protected $courseSessionInstructors;

    /**
     * @var string
     */
    protected $startTime;

    /**
     * @var string
     */
    protected $endTime;

    /**
     * @var ValidBuilding
     */
    protected $validBuilding;

    /**
     * @var string
     */
    protected $room;

    /**
     * @var ValidCourseScheduleType
     */
    protected $validCourseScheduleType;

    /**
     * @var Carbon
     */
    protected $startDate;

    /**
     * @var Carbon
     */
    protected $endDate;

    /**
     * @return mixed
     */
    public function getCourseSectionSessionID()
    {
        return $this->courseSectionSessionID;
    }

    /**
     * @param mixed $courseSectionSessionID
     */
    public function setCourseSectionSessionID($courseSectionSessionID)
    {
        $this->courseSectionSessionID = $courseSectionSessionID;
    }

    /**
     * @return string
     */
    public function getMeetsOnSundayFlag()
    {
        return $this->meetsOnSundayFlag;
    }

    /**
     * @param string $meetsOnSundayFlag
     */
    public function setMeetsOnSundayFlag($meetsOnSundayFlag)
    {
        $this->meetsOnSundayFlag = $meetsOnSundayFlag;
    }

    /**
     * @return string
     */
    public function getMeetsOnMondayFlag()
    {
        return $this->meetsOnMondayFlag;
    }

    /**
     * @param string $meetsOnMondayFlag
     */
    public function setMeetsOnMondayFlag($meetsOnMondayFlag)
    {
        $this->meetsOnMondayFlag = $meetsOnMondayFlag;
    }

    /**
     * @return string
     */
    public function getMeetsOnTuesdayFlag()
    {
        return $this->meetsOnTuesdayFlag;
    }

    /**
     * @param string $meetsOnTuesdayFlag
     */
    public function setMeetsOnTuesdayFlag($meetsOnTuesdayFlag)
    {
        $this->meetsOnTuesdayFlag = $meetsOnTuesdayFlag;
    }

    /**
     * @return string
     */
    public function getMeetsOnWednesdayFlag()
    {
        return $this->meetsOnWednesdayFlag;
    }

    /**
     * @param string $meetsOnWednesdayFlag
     */
    public function setMeetsOnWednesdayFlag($meetsOnWednesdayFlag)
    {
        $this->meetsOnWednesdayFlag = $meetsOnWednesdayFlag;
    }

    /**
     * @return string
     */
    public function getMeetsOnThursdayFlag()
    {
        return $this->meetsOnThursdayFlag;
    }

    /**
     * @param string $meetsOnThursdayFlag
     */
    public function setMeetsOnThursdayFlag($meetsOnThursdayFlag)
    {
        $this->meetsOnThursdayFlag = $meetsOnThursdayFlag;
    }

    /**
     * @return string
     */
    public function getMeetsOnFridayFlag()
    {
        return $this->meetsOnFridayFlag;
    }

    /**
     * @param string $meetsOnFridayFlag
     */
    public function setMeetsOnFridayFlag($meetsOnFridayFlag)
    {
        $this->meetsOnFridayFlag = $meetsOnFridayFlag;
    }

    /**
     * @return string
     */
    public function getMeetsOnSaturdayFlag()
    {
        return $this->meetsOnSaturdayFlag;
    }

    /**
     * @param string $meetsOnSaturdayFlag
     */
    public function setMeetsOnSaturdayFlag($meetsOnSaturdayFlag)
    {
        $this->meetsOnSaturdayFlag = $meetsOnSaturdayFlag;
    }

    /**
     * @return CourseSessionInstructors
     */
    public function getCourseSessionInstructors()
    {
        return $this->courseSessionInstructors;
    }

    /**
     * @param CourseSessionInstructors $courseSessionInstructors
     */
    public function setCourseSessionInstructors($courseSessionInstructors)
    {
        $this->courseSessionInstructors = new CourseSessionInstructors();
        $this->courseSessionInstructors->setFromArray($courseSessionInstructors);
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param string $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return ValidBuilding
     */
    public function getValidBuilding()
    {
        return $this->validBuilding;
    }

    /**
     * @param ValidBuilding $validBuilding
     */
    public function setValidBuilding($validBuilding)
    {
        $this->validBuilding = new ValidBuilding();
        $this->validBuilding->setFromArray($validBuilding);
    }

    /**
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param string $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return ValidCourseScheduleType
     */
    public function getValidCourseScheduleType()
    {
        return $this->validCourseScheduleType;
    }

    /**
     * @param ValidCourseScheduleType $validCourseScheduleType
     */
    public function setValidCourseScheduleType($validCourseScheduleType)
    {
        $this->validCourseScheduleType = new ValidCourseScheduleType();
        $this->validCourseScheduleType->setFromArray($validCourseScheduleType);
    }

    /**
     * @return Carbon
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param Carbon $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = Carbon::createFromFormat('M j, Y, h:i:s A', $startDate);
    }

    /**
     * @return Carbon
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param Carbon $endDate
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

        if(!empty($array['courseSectionSessionID'])) {

            $this->setCourseSectionSessionID($array['courseSectionSessionID']);

        }

        if(!empty($array['meetsOnSundayFlag'])) {

            $this->setMeetsOnSundayFlag($array['meetsOnSundayFlag']);

        }

        if(!empty($array['meetsOnMondayFlag'])) {

            $this->setMeetsOnMondayFlag($array['meetsOnMondayFlag']);

        }

        if(!empty($array['meetsOnTuesdayFlag'])) {

            $this->setMeetsOnTuesdayFlag($array['meetsOnTuesdayFlag']);

        }

        if(!empty($array['meetsOnWednesdayFlag'])) {

            $this->setMeetsOnWednesdayFlag($array['meetsOnWednesdayFlag']);

        }

        if(!empty($array['meetsOnThursdayFlag'])) {

            $this->setMeetsOnThursdayFlag($array['meetsOnThursdayFlag']);

        }

        if(!empty($array['meetsOnFridayFlag'])) {

            $this->setMeetsOnFridayFlag($array['meetsOnFridayFlag']);

        }

        if(!empty($array['meetsOnSaturdayFlag'])) {

            $this->setMeetsOnSaturdayFlag($array['meetsOnSaturdayFlag']);

        }

        if(!empty($array['courseSessionInstructor'])) {

            $this->setCourseSessionInstructors($array['courseSessionInstructor']);

        }

        if(!empty($array['startTime'])) {

            $this->setStartTime($array['startTime']);

        }

        if(!empty($array['endTime'])) {

            $this->setEndTime($array['endTime']);

        }

        if(!empty($array['validBuilding'])) {

            $this->setValidBuilding($array['validBuilding']);

        }

        if(!empty($array['room'])) {

            $this->setRoom($array['room']);

        }

        if(!empty($array['validCourseScheduleType'])) {

            $this->setValidCourseScheduleType($array['validCourseScheduleType']);

        }

        if(!empty($array['startDate'])) {

            $this->setStartDate($array['startDate']);

        }

        if(!empty($array['endDate'])) {

            $this->setEndDate($array['endDate']);

        }

    }

}