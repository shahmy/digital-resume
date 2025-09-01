<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResumeController extends Controller
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

    /**
     * Summary of getResume
     * @return \Illuminate\Contracts\View\View
     * {#676 ▼ // app\Http\Controllers\ResumeController.php:26
     *  +"basics": {#679 ▶}
    *   +"work": array:1 [▶]
    *   +"volunteer": array:1 [▶]
    *   +"education": array:1 [▶]
    *   +"awards": array:1 [▶]
    *   +"certificates": array:1 [▶]
    *   +"publications": array:1 [▶]
    *   +"skills": array:1 [▶]
    *   +"languages": array:1 [▶]
    *   +"interests": array:1 [▶]
    *   +"references": array:1 [▶]
    *   +"projects": array:1 [▶]
    *   }
     */
    public function getResume():View
    {
        //dd($this->dataContents);
        $basics = $this->getBasics();
        $work = $this->getWork();
        $volunteer = $this->getVolunteer();
        $education = $this->getEducation();
        $awards = $this->getAwards();
        $certificates = $this->getCertificates();
        $publications = $this->getPublications();
        $skills = $this->getSkills();
        $languages = $this->getLanguages();
        $interests = $this->getInterests();
        $references = $this->getReferences();
        $projects = $this->getProjects();

        return  view('resume', [
            'basics' => $basics,
            'work' => $work,
            'volunteer' => $volunteer,
            'education' => $education,
            'awards' => $awards,
            'certificates' => $certificates,
            'publications' => $publications,
            'skills' => $skills,
            'languages' => $languages,
            'interests' => $interests,
            'references' => $references,
            'projects' => $projects,
        ]);
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

}
