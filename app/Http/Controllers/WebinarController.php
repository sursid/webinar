<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Services\WebinarRegistrationService;

class WebinarController extends Controller
{
    protected $registrationService;

    public function __construct(WebinarRegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function showRegistrationForm()
    {
        return view('webinar.register');
    }

    public function processRegistration(Request $request)
    {
        // Implementation will go here
    }

    public function registrationSuccess()
    {
        return view('webinar.success');
    }
}