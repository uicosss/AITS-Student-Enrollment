<?php


namespace App\Model;


class CourseSectionSessions
{

    /**
     * @var CourseSectionSession[]
     */
    protected $courseSectionSessions;

    /**
     * @return CourseSectionSession[]
     */
    public function getCourseSectionSessions()
    {
        return $this->courseSectionSessions;
    }

    /**
     * @param CourseSectionSession[] $courseSectionSessions
     */
    public function setCourseSectionSessions($courseSectionSessions)
    {
        $this->courseSectionSessions = [];
        foreach($courseSectionSessions as $courseSectionSession) {

            $thisCourseSectionSession = new CourseSectionSession();
            $thisCourseSectionSession->setFromArray($courseSectionSession);
            $this->courseSectionSessions[] = $thisCourseSectionSession;

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

            $this->setCourseSectionSessions($array);

        }

    }

}