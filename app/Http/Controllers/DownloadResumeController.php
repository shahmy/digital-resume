<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use App\Helper\ResumeDataHelper;
//use Spatie\Browsershot\Browsershot;
//use Barryvdh\DomPDF\Facade\Pdf;

class DownloadResumeController extends Controller
{
    protected $resumeDataHelper;

    public function __construct(ResumeDataHelper $resumeDataHelper)
    {
        $this->resumeDataHelper = $resumeDataHelper;
    }

    public function __invoke(){
        return Pdf::view('resume', $this->resumeDataHelper->getHelperResumeData())
            ->format('a4')
            ->name('resume.pdf'); 
        /* Browsershot::url('http://127.0.0.1:8000/resume')
            ->setOption('args', ['--no-sandbox'])
            ->paperSize(8.27, 11.69, 'in')
            ->save('resume.pdf'); */
             /* $html = view('resume', $this->resumeDataHelper->getHelperResumeData())->render();
            $pdf = Pdf::loadHTML($html)->setPaper('a4')->setWarnings(false)->save('myfile.pdf');

             //$pdf = Pdf::loadView('resume', $this->resumeDataHelper->getHelperResumeData());
    return $pdf->download('resume.pdf'); */
    }
}
