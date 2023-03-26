<?php



class Thesaurus
{

    private $apiUrl, $apiKey, $headers, $options;

    public function getSynonyms($word)
    {
        //?word=
        $curl = curl_init($this->apiUrl . '?word=' . $word);
        curl_setopt_array($curl, $this->options);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) return "cURL Error #:" . $err;
        else {
            return $response;
        }
    }

    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->headers = array('X-Api-Key: ' . $this->apiKey);
        $this->options = array(
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

$thesaurus = new Thesaurus('https://api.api-ninjas.com/v1/thesaurus', '_');

print_r($thesaurus->getSynonyms('small'));
// {"word": "small", 
// "synonyms": ["small-scale", "humble", "low", "lowly", "belittled", "small", "pocket-sized", "minuscule", "pocket-size", "modest", "diminished", "little", "minor"], 
// "antonyms": ["large", "big"]}
echo '<br />';
print_r($thesaurus->getSynonyms('dfg'));
// {"word": "dfg", "synonyms": [], "antonyms": []}
