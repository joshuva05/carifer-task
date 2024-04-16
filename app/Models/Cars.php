<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Cars extends Model
{
    use HasFactory;

    protected static $url = 'https://api.countrystatecity.in/v1/';

    protected $fillable = [
        'name',
        'description',
        'make',
        'model',
        'year',
        'color',
        'country',
        'city',
        'state'
    ];

    public static function getAllCountries(){

        $apiKey = env('X_CSCAPI_KEY');

        $client = new Client(['headers' =>
        [
            'X-CSCAPI-KEY' => $apiKey,
            'Accept' => 'application/json',
        ],
        'verify' => false ]);

        $response = $client->request('GET' ,self::$url.'countries');
        $countries = json_decode($response->getBody(), true);

        return $countries;
    }

    public static function getStateByCountries($country){

        if($country){
        $apiKey = env('X_CSCAPI_KEY');
        $client = new Client(['headers' =>
        [
            'X-CSCAPI-KEY' => $apiKey,
            'Accept' => 'application/json',
        ],
        'verify' => false ]);

        $response = $client->request('GET' ,self::$url.'countries/'.$country.'/states');
        $states = json_decode($response->getBody(), true);

        return $states;
    }else{
        return [];

    }

    }

    public static function getCityByState($country,$state){

        $apiKey = env('X_CSCAPI_KEY');
        $client = new Client(['headers' =>
        [
            'X-CSCAPI-KEY' => $apiKey,
            'Accept' => 'application/json',
        ],
        'verify' => false ]);

        $response = $client->request('GET' ,self::$url.'countries/'.$country.'/states/'.$state.'/cities');
        $cities = json_decode($response->getBody(), true);

        return $cities;
    }



    public static function getcountryDetail($id){


        $apiKey = env('X_CSCAPI_KEY');

        $client = new Client(['headers' =>
        [
            'X-CSCAPI-KEY' => $apiKey,
            'Accept' => 'application/json',
        ],
        'verify' => false ]);

        $response = $client->request('GET' ,self::$url.'countries/'.$id);
        $country = json_decode($response->getBody(), true);

        return $country;
    }

    public static function getstateDetail($country,$state){

        if($country){

        $apiKey = env('X_CSCAPI_KEY');

        $client = new Client(['headers' =>
        [
            'X-CSCAPI-KEY' => $apiKey,
            'Accept' => 'application/json',
        ],
        'verify' => false ]);

        $response = $client->request('GET' ,self::$url.'countries/'.$country.'/states/'.$state);
        $state = json_decode($response->getBody(), true);

        return $state;
    }else{
        return [];
    }
    }

}
