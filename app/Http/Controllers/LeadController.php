<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailForUsers;
use App\Models\Customer;
use App\Models\User;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $form_data = $request->all();

        
    }
}
