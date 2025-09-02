<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Helper\ResumeDataHelper;


class ResumeController extends Controller
{

    public $resumeDataHelper;

    public function __construct(ResumeDataHelper $resumeDataHelper)
    {
        $this->resumeDataHelper = $resumeDataHelper;
    }

    public function getResume():View
    {
        return view('resume', $this->resumeDataHelper->getHelperResumeData());
    }

}

