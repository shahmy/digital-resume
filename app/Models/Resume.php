<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// have to call resume json file

class Resume extends Model
{
    public function getResumeData()
    {
        return json_decode(file_get_contents(storage_path('app/resume.json')), true);
    }
}
