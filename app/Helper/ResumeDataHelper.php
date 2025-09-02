<?php

namespace App\Helper;

use App\Models\Resume;
class ResumeDataHelper
{
    protected $resumeData;
    protected $resume;
    protected $dataContents;

    public function __construct(Resume $resume)
    {

        $this->resume = $resume;
        $this->resumeData = response()->json($this->resume->getResumeData());
        $this->dataContents = $this->resumeData->getData();
    }

    // get basic details
    public function getBasics()
    {
        return  $this->dataContents->basics;
    }

    public function getWork()
    {
        return  $this->dataContents->work;
    }

    public function getVolunteer()
    {
        return $this->dataContents->volunteer;
    }

    public function getEducation()
    {
        return $this->dataContents->education;
    }

    public function getAwards()
    {
        return  $this->dataContents->awards;
    }

    public function getCertificates()
    {
        return $this->dataContents->certificates;
    }

    public function getPublications()
    {
        return  $this->dataContents->publications;
    }

    public function getSkills()
    {
        return  $this->dataContents->skills;
    }

    public function getLanguages()
    {
        return $this->dataContents->languages;
    }

    public function getInterests()
    {
        return $this->dataContents->interests;
    }

    public function getReferences()
    {
        return $this->dataContents->references;
    }

    public function getProjects()
    {
        return  $this->dataContents->projects;
    }

    /**
     * Centralized function to collect all resume data
     */
    public function getHelperResumeData(): array
    {
        return [
            'basics'       => $this->getBasics(),
            'work'         => $this->getWork(),
            'volunteer'    => $this->getVolunteer(),
            'education'    => $this->getEducation(),
            'awards'       => $this->getAwards(),
            'certificates' => $this->getCertificates(),
            'publications' => $this->getPublications(),
            'skills'       => $this->getSkills(),
            'languages'    => $this->getLanguages(),
            'interests'    => $this->getInterests(),
            'references'   => $this->getReferences(),
            'projects'     => $this->getProjects(),
        ];
    }

}