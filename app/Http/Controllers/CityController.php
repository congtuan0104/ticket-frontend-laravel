<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    //Call API to get City List
    public function city(Request $request): View
    {
    
        $cities = Http::get('http://localhost:8080/api/event/city')->json();

        return view('city', [
        
            'cities' => $cities
        ]);
    }

    public function addCity(Request $request)
    {
        $request->validate([
            'cityName' => 'required|string|max:255',
        ]);

        $response = Http::post('http://localhost:8080/api/event/city', [
            'cityName' => $request->input('cityName')
        ]);

        if ($response->successful()) {
            return redirect()->route('cities')->with('success', 'City added successfully!');
        } else {
            return redirect()->route('cities')->with('error', 'Error adding city!');
        }
    }

    // Handle deleting a city
    public function deleteCity(Request $request)
    {
        $req = $request->all();

        $response = Http::delete("http://localhost:8080/api/event/city?cityId=".$req['cityId']);

        if ($response->successful()) {
            return redirect()->route('cities')->with('success', 'City deleted successfully!');
        } else {
            return redirect()->route('cities')->with('error', 'Error deleting city!');
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
    public function updateCity(Request $request)
    {
        $request->validate([
            'cityName' => 'required|string|max:255',
        ]);
       
        $response = Http::put("http://localhost:8080/api/event/city",
        [
            "cityId"=> $request->input("cityId"),
            "cityName" => $request->input("cityName")
        ]
        );

        if ($response->successful()) {
            return redirect()->route('cities')->with('success', 'City updated successfully!');
        } else {
            return redirect()->route('cities')->with('error', 'Error updating city!');
        }
    }
}
