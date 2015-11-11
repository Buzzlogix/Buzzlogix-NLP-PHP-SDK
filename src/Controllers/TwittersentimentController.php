<?php
/*
 * BuzzlogixTextAnalysisAPILib
 *
 * This file was automatically generated for Buzzlogix by APIMATIC BETA v2.0 on 11/09/2015
 */

namespace BuzzlogixTextAnalysisAPILib\Controllers;

use BuzzlogixTextAnalysisAPILib\APIException;
use BuzzlogixTextAnalysisAPILib\APIHelper;
use BuzzlogixTextAnalysisAPILib\Configuration;
use BuzzlogixTextAnalysisAPILib\CustomAuthUtility;
use Unirest\Unirest;
class TwittersentimentController {

    /* private fields for configuration */

    /**
     * Supply your API key.  
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
     * Use this endpoint to retrieve the sentiment of the provided Tweet
     * @param  string     $body     Required parameter: Supply text to be classified.
     * @return void response from the API call*/
    public function createReturnTwitterSentiment (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/twittersentiment';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'apikey' => $this->apikey
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, $body);

        //append custom auth authorization headers
        CustomAuthUtility::appendCustomAuthParams($request);

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
    }
        
}