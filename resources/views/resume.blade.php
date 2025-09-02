<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $basics->name }} - Resume</title>
    <!-- Use Tailwind CSS Play CDN for quick setup -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .resume-container {
                box-shadow: none !important;
                margin: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 p-4 sm:p-8">

    <div id="resume" class="resume-container max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Main Content Area -->
        <div class="p-6 sm:p-8 grid grid-cols-1 md:grid-cols-4 gap-6 sm:gap-8">
            <!-- Left Sidebar -->
            <div class="md:col-span-1">
                <div class="space-y-6">
                    <!-- Profile Picture Placeholder -->
                    @if (!empty($basics->image))
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $basics->image) }}" alt="Profile Picture" class="w-60 h-60 mx-auto object-cover">
                    </div>
                    @endif

                    <!-- Contact -->
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">Contact</h3>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li><a href="mailto:{{ $basics->email }}" class="flex items-center hover:text-blue-600 transition-colors">{{ $basics->email }}</a></li>
                            <li><a href="tel:{{ $basics->phone }}" class="flex items-center hover:text-blue-600 transition-colors">{{ $basics->phone }}</a></li>
                            <li><a href="{{ $basics->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center hover:text-blue-600 transition-colors">{{ $basics->url }}</a></li>
                            <li><span class="flex items-center">{{ $basics->location->city }}, {{ $basics->location->region }}</span></li>
                        </ul>
                    </div>
                    @if (!empty($basics->profiles))
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">Profiles</h3>
                        <ul class="text-sm text-gray-700 space-y-1">
                            @foreach($basics->profiles as $profile)
                            <li>
                                <span class="mr-2">{{ $profile->network }}</span>
                                <a href="{{ $profile->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center hover:text-blue-600 transition-colors">
                                    <span>@ {{ $profile->username }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Education -->
                    @if (!empty($education))
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">Education</h3>
                        @foreach($education as $edu)
                        <div class="mb-4">
                            <div class="flex justify-between items-baseline mb-1">
                                <h4 class="text-base font-semibold text-gray-800">{{ $edu->institution }}</h4>
                            </div>
                            <p class="text-sm text-gray-700 font-medium">{{ $edu->studyType }}, {{ $edu->area }}</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($edu->startDate)->format('Y') }} - {{ !empty($edu->endDate) ? \Carbon\Carbon::parse($edu->endDate)->format('Y') : 'Present' }}</p>
                            @if (!empty($edu->score))
                            <p class="text-sm text-gray-600">GPA: {{ $edu->score }}</p>
                            @endif
                            @if (!empty($edu->courses))
                            <p class="text-sm text-gray-600 mt-1">Courses: {{ implode(', ', $edu->courses) }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if (!empty($skills))
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">Technical Skills</h3>
                        <div class="flex flex-wrap gap-2 text-sm">
                            @foreach($skills as $skill)
                                @foreach($skill->keywords as $keyword)
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">{{ $keyword }}</span>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if (!empty($languages))
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">Languages</h3>
                        <ul class="text-sm text-gray-700 space-y-1">
                            @foreach($languages as $lang)
                            <li>{{ $lang->language }} - {{ $lang->fluency }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (!empty($interests))
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">Interests</h3>
                        <div class="flex flex-wrap gap-2 text-sm">
                            @foreach($interests as $interest)
                                @foreach($interest->keywords as $keyword)
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">{{ $keyword }}</span>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if (!empty($references))
                    <div>
                        <h3 class="text-lg font-bold text-blue-700 mb-2">References</h3>
                        <p class="text-sm text-gray-700">{{ $references[0]->name }} - Available upon request.</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Right Main Content -->
            <div class="md:col-span-3 space-y-8">
                <!-- Header Section for right side -->
                <div class="mb-8">
                    <h1 class="text-3xl sm:text-4xl font-extrabold mb-1 text-gray-800">{{ $basics->name }}</h1>
                    <h2 class="text-xl font-light text-gray-600 mb-4">{{ $basics->label }}</h2>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $basics->summary }}</p>
                </div>

                <!-- Work Experience -->
                @if (!empty($work))
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-blue-700 border-b-2 border-blue-300 pb-2 mb-4">Professional Experience</h2>
                    @foreach($work as $w)
                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-1">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">{{ $w->position }} </h3>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($w->startDate)->format('M Y') }} - {{ !empty($w->endDate) ? \Carbon\Carbon::parse($w->endDate)->format('M Y') : 'Present' }}</span>
                        </div>
                        <h6>{{ $w->name }}</h6>
                        <p class="text-gray-600 italic text-sm mb-2">{{ $w->summary }}</p>
                        @if (!empty($w->highlights))
                        <ul class="list-disc list-outside ml-5 space-y-1 text-sm text-gray-700">
                            @foreach($w->highlights as $highlight)
                            <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
                
                <!-- Projects -->
                @if (!empty($projects))
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-blue-700 border-b-2 border-blue-300 pb-2 mb-4">Key Projects</h2>
                    @foreach($projects as $p)
                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-1">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">{{ $p->name }}</h3>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($p->startDate)->format('M Y') }} - {{ !empty($p->endDate) ? \Carbon\Carbon::parse($p->endDate)->format('M Y') : 'Present' }}</span>
                        </div>
                        @if (!empty($p->url))
                        <a href="{{ $p->url }}" target="_blank" rel="noopener noreferrer" class="text-sm text-blue-600 hover:underline mb-2 block">{{ $p->url }}</a>
                        @endif
                        <p class="text-gray-600 italic text-sm mb-2">{{ $p->description }}</p>
                        @if (!empty($p->highlights))
                        <ul class="list-disc list-outside ml-5 space-y-1 text-sm text-gray-700">
                            @foreach($p->highlights as $highlight)
                            <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Awards -->
                @if (!empty($awards))
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-blue-700 border-b-2 border-blue-300 pb-2 mb-4">Awards</h2>
                    @foreach($awards as $a)
                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-1">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">{{ $a->title }}</h3>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($a->date)->format('M Y') }}</span>
                        </div>
                        <p class="text-gray-700 font-medium">Awarded by {{ $a->awarder }}</p>
                        <p class="text-sm text-gray-600 mt-1">{{ $a->summary }}</p>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Certificates -->
                @if (!empty($certificates))
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-blue-700 border-b-2 border-blue-300 pb-2 mb-4">Certificates</h2>
                    @foreach($certificates as $cert)
                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-1">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">{{ $cert->name }}</h3>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($cert->date)->format('M Y') }}</span>
                        </div>
                        <p class="text-gray-700 font-medium">Issued by {{ $cert->issuer }}</p>
                        @if (!empty($cert->url))
                        <a href="{{ $cert->url }}" target="_blank" rel="noopener noreferrer" class="text-sm text-blue-600 hover:underline mt-1 block">{{ $cert->url }}</a>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
                
                <!-- Publications -->
                @if (!empty($publications))
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-blue-700 border-b-2 border-blue-300 pb-2 mb-4">Publications</h2>
                    @foreach($publications as $pub)
                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-1">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">{{ $pub->name }}</h3>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($pub->releaseDate)->format('M Y') }}</span>
                        </div>
                        <p class="text-gray-700 font-medium">Published by {{ $pub->publisher }}</p>
                        <p class="text-sm text-gray-600 mt-1">{{ $pub->summary }}</p>
                        @if (!empty($pub->url))
                        <a href="{{ $pub->url }}" target="_blank" rel="noopener noreferrer" class="text-sm text-blue-600 hover:underline mt-1 block">{{ $pub->url }}</a>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
                
                <!-- Volunteer Experience -->
                @if (!empty($volunteer))
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-blue-700 border-b-2 border-blue-300 pb-2 mb-4">Volunteer Experience</h2>
                    @foreach($volunteer as $v)
                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-1">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">{{ $v->position }} at {{ $v->organization }}</h3>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($v->startDate)->format('M Y') }} - {{ !empty($v->endDate) ? \Carbon\Carbon::parse($v->endDate)->format('M Y') : 'Present' }}</span>
                        </div>
                        <p class="text-gray-600 italic text-sm mb-2">{{ $v->summary }}</p>
                        @if (!empty($v->highlights))
                        <ul class="list-disc list-outside ml-5 space-y-1 text-sm text-gray-700">
                            @foreach($v->highlights as $highlight)
                            <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Floating Download Button -->
    <a href="{{ route('download-pdf') }}">
    <button class="no-print fixed bottom-6 right-6 bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-full shadow-lg transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
        </svg>
    </button>
    </a>
</body>
</html>
