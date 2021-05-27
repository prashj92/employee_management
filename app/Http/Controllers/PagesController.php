<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Company;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getUserProfile($user_id)
    {
        $user = User::find($user_id);
        return $user;
    }

    public function getAllCompanies()
    {
        $companies = Company::all()->toArray();
        return array_reverse($companies);
    }
    
    public function addCompany(Request $request)
    {
        if ($request->isMethod("post")) {
            $company_name = $request->company_name;
            $company_email = $request->company_email;
            $contact_person = $request->contact_person;
            $mobile = $request->mobile;
            $profile = $request->profile;
            $address = $request->address;
            $city = $request->city;

            //Save the company in the DB
            $company = new Company;
            $company->company_name = $company_name;
            $company->company_email = $company_email;
            $company->contact_person = $contact_person;
            $company->mobile = $mobile;  
            $company->profiles = $profile;
            $company->address = $address;
            $company->city = $city;
            $company->current_openings = "";
            
            $company->save();
            //$new_booking_record_id = $booking->id;
            return response()->json('The company successfully added');
        }
    }

    public function deleteCompany($company_id) {
        $company = Company::find($company_id);
        $company->delete();

        return response()->json('The company successfully deleted');
    }

    public function editCompany($company_id) {
        $company = Company::find($company_id);

        return response()->json($company);
    }

    public function updateCompany($id, Request $request)
    {
        if ($request->isMethod("post")) {
            $company = Company::find($id);

            $company_name = $request->company_name;
            $company_email = $request->company_email;
            $contact_person = $request->contact_person;
            $mobile = $request->mobile;
            $profile = $request->profiles;
            $address = $request->address;
            $city = $request->city;

            $company->company_name = $company_name;
            $company->company_email = $company_email;
            $company->contact_person = $contact_person;
            $company->mobile = $mobile;  
            $company->profiles = $profile;
            $company->address = $address;
            $company->city = $city;
            $company->current_openings = $request->current_openings;

            $company->save();
    
            return response()->json('The company successfully updated');
        }
    }
}
