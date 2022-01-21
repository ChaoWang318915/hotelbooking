<?php

namespace App\Http\Controllers;

use App\Currency;




class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function run_update_currency(){

        // $api = curl 'https://api.currencyfreaks.com/latest?apikey=8e2ad03191c849b68ce16f93031a70ea&symbols=PKR,GBP,EUR,USD';


        $curl = curl_init();

        curl_setopt_array($curl, array(
            // CURLOPT_URL => "http://api.exchangeratesapi.io/v1/latest?access_key=ffaafd7e66a1140e3229883bba11a91b",
            CURLOPT_URL => "https://api.currencyfreaks.com/latest?apikey=8e2ad03191c849b68ce16f93031a70ea&symbols=PKR,GBP,EUR,USD",
            // CURLOPT_URL => "https://api.exchangeratesapi.io/latest?base=USD",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // print_r(json_decode($response));
            $response = json_decode($response,true);
            // dd($response);

            $currency1 = Currency::where('id',1)->first();
            $currency1->exchange_value = $response['rates']['EUR'];
            $currency1->update_count = $currency1->update_count +1;
            $currency1->save();

        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            // CURLOPT_URL => "https://api.exchangeratesapi.io/latest",
            CURLOPT_URL => "http://api.exchangeratesapi.io/v1/latest?access_key=ffaafd7e66a1140e3229883bba11a91b",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // print_r(json_decode($response));
            $response = json_decode($response,true);
            // dd($response['rates']['EUR']);

            $currency1 = Currency::where('id',2)->first();
            $currency1->exchange_value = $response['rates']['USD'];
            $currency1->update_count = $currency1->update_count +1;
            $currency1->save();

        }

}


}
