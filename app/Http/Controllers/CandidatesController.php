<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidates;

class CandidatesController extends Controller
{
    public function addCandidate(Request $request)
    {
        if ($request->isMethod("post")) {
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $email = $request->email;
            $mobile = $request->mobile;
            $profile = $request->profile;
            $experience = $request->experience;
            $address = $request->address;
            $city = $request->city;

            //Save the company in the DB
            $candidate = new Candidates;
            $candidate->first_name = $first_name;
            $candidate->last_name = $last_name;
            $candidate->email = $email;
            $candidate->mobile = $mobile;  
            $candidate->profile = $profile;
            $candidate->address = $address;
            $candidate->experience = $experience;
            $candidate->city = $city;
            
            $candidate->save();
            //$new_booking_record_id = $booking->id;
            return response()->json('The candidate successfully added');
        }
    }

    public function getAllCandidates()
    {
        $candidates = Candidates::all()->toArray();
        return array_reverse($candidates);
    }
}
