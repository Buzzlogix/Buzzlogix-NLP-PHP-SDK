<?php
/*
 * BuzzlogixTextAnalysisAPILib
 *
 * This file was automatically generated for Buzzlogix by APIMATIC BETA v2.0 on 11/18/2015
 */

namespace BuzzlogixTextAnalysisAPILib\Controllers;

use BuzzlogixTextAnalysisAPILib\APIException;
use BuzzlogixTextAnalysisAPILib\APIHelper;
use BuzzlogixTextAnalysisAPILib\Configuration;
use Unirest\Unirest;
class TwittersentimentController {

    /* private fields for configuration */

    /**
     * Supply your API Key.  
     * @var string
     */
    private $apikey;

    /**
     * Constructor with authentication and configuration parameters
     */
    function __construct($apikey)
    {
        $this->apikey = $apikey ? $apikey : Configuration::$apikey;
    }

    /**
     * The Tweet should be provided as text/plain in the body
     * @param  string     $body     Required parameter: Supply text to be classified.
     * @return mixed response from the API call*/
    public function createReturnEnglishTwitterSentiment (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/twittersentiment';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'apikey' => $this->apikey
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, $body);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('No API Key found in headers, body or querystring', 401);
        }

        else if ($response->code == 403) {
            throw new APIException('Invalid authentication credentials', 403);
        }

        else if ($response->code == 429) {
            throw new APIException('API rate limit exceeded', 429);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
    /**
     * The Tweet should be provided as multipart/form-data with the key 'text'. Files can be uploaded.
     * @param  string     $body     Required parameter: Supply text to be classified.
     * @return mixed response from the API call*/
    public function createReturnEnglishTwitterSentimentForm (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/twittersentiment/form';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'apikey' => $this->apikey
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, $body);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('No API Key found in headers, body or querystring', 401);
        }

        else if ($response->code == 403) {
            throw new APIException('Invalid authentication credentials', 403);
        }

        else if ($response->code == 429) {
            throw new APIException('API rate limit exceeded', 429);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
}