<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class OrganizationController extends Controller
{
    //Call API to get City List
    public function organization(Request $request): View
    {
    
        $organizations = Http::get('http://localhost:8080/api/organization')->json();
        $users = Http::get('http://localhost:8080/api/users/getAll')->json();
        return view('organization', [
        
            'organizations' => $organizations,
            'users'=> $users
        ]);
    }

     public function addOrganization(Request $request)
    {
       

        $response = Http::post('http://localhost:8080/api/organization', [
            'userID' => $request->input('userID'),
            'description'=> $request->input('description'),
        ]);

        if ($response->successful()) {
            return redirect()->route('organizations')->with('success', 'Organization added successfully!');
        } else {
            return redirect()->route('organizations')->with('error', 'Error adding organization!');
        }
    }

    // Handle deleting a city
    public function deleteOrganization(Request $request)
    {
        $id = $request->input('id');
        $response = Http::delete("http://localhost:8080/api/organization/".$id);
        //dd($request->input("id"));

        if ($response->successful()) {
            return redirect()->route('organizations')->with('success', 'Organization deleted successfully!');
        } else {
            return redirect()->route('organizations')->with('error', 'Error deleting Organization!');
        }
    }

    // Show edit city form
    public function editCity($id): View
    {
        $city = Http::get("http://localhost:8080/api/event/city/{$id}")->json();
        return view('edit-city', [
            'city' => $city
        ]);
    }

    // Handle updating a city
    public function updateOrganization(Request $request)
    {
        
       
        $response = Http::put("http://localhost:8080/api/organization",
        [
            "id"=> $request->input("id"),
            "userID" => $request->input("userID"),
            "description"=> $request->input("description"),
        ]
        );

        if ($response->successful()) {
            return redirect()->route('organizations')->with('success', 'Organization updated successfully!');
        } else {
            return redirect()->route('organizations')->with('error', 'Error updating Organization!');
        }
    }
}
