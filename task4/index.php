<?php

class Thesaurus
{

    private $apiUrl, $apiKey, $headers, $options;

    public function getSynonyms()
    {
        $curl = curl_init();
        curl_setopt_array($curl, $this->options);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) return "cURL Error #:" . $err;
        else {
            $result = json_decode($response, true);
            return $result;
        }
    }

    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->headers = array('X-Api-Key: ' . $this->apiKey);
        $this->options = array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_HTTPHEADER => $this->headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        );
    }
}

$thesaurus = new Thesaurus('https://api.api-ninjas.com/v1/thesaurus?word=', 'tMW6Onh9dP+dipQb+9nd4Q==itr6beTTtG4mmq3v');

print_r($thesaurus->getSynonyms());
