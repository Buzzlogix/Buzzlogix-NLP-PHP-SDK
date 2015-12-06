<?php
/*
 * BuzzlogixTextAnalysisAPILib
 *
 * This file was automatically generated for buzzlogix by APIMATIC BETA v2.0 on 12/06/2015
 */

namespace BuzzlogixTextAnalysisAPILib\Controllers;

use BuzzlogixTextAnalysisAPILib\APIException;
use BuzzlogixTextAnalysisAPILib\APIHelper;
use BuzzlogixTextAnalysisAPILib\Configuration;
use Unirest\Unirest;
use Unirest\File;
class TwittersentimentController {

    /* private fields for configuration */

    /**
     * Supply your API Key.  
     * @var string
     */
    private $xMashapeKey;

    /**
     * Constructor with authentication and configuration parameters
     */
    function __construct($xMashapeKey)
    {
        $this->xMashapeKey = $xMashapeKey ? $xMashapeKey : Configuration::$xMashapeKey;
    }

    /**
     * The Tweet should be provided as text/plain in the body
     * @param  string     $body     Required parameter: Supply text to be classified.
     * @return mixed response from the API call*/
    public function createReturnEnglishTwitterSentimentPlaintext (
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
            'X-Mashape-Key' => $this->xMashapeKey
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, $body);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
    /**
     * The Tweet should be provided as multipart/form-data with the key 'text'. Files can be uploaded.
     * @param  string     $text     Required parameter: Supply text to be classified.
     * @return mixed response from the API call*/
    public function createReturnEnglishTwitterSentimentMultipartForm (
                $text) 
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
            'X-Mashape-Key' => $this->xMashapeKey
        );

        //prepare parameters
        $parameters = array (
            "file" => File::add($text)
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, $parameters);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
    /**
     * Return the sentiment of an English Tweet supplied in an encoded form using key 'text'.
     * @param  string     $text     Required parameter: Supply the Tweet to be classified.
     * @return mixed response from the API call*/
    public function createReturnEnglishTwitterSentimentEncodedForm (
                $text) 
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
            'X-Mashape-Key' => $this->xMashapeKey
        );

        //prepare parameters
        $parameters = array (
            'text' => $text
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, $parameters);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code);
        }

        return $response->body;
    }
        
}