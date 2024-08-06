<?php

namespace Sellgate;

class Sellgate {
    private function sendRequest($endpoint, $data) {
        $url = 'https://api.sellgate.io/v1' . $endpoint;
        $jsonData = json_encode($data);

        $curl = curl_init($url);
        
        $headers = [
            "Content-Type: application/json",
        ];

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => $headers,
        ];

        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlError = curl_errno($curl) ? curl_error($curl) : null;

        curl_close($curl);

        $decodedResponse = json_decode($response, true);

        if ($httpCode >= 200 && $httpCode < 300) {
            return $decodedResponse;
        } else {
            if (isset($decodedResponse['message'])) {
                echo "Error: " . $decodedResponse['message'] . PHP_EOL;
            } elseif ($curlError) {
                echo "Curl error: " . $curlError . PHP_EOL;
            } else {
                echo "An unknown error occurred." . PHP_EOL;
            }
        }
    }

    public function createCheckout($data) {
        return $this->sendRequest('/checkout', $data);
    }

    public function createAddress($data) {
        return $this->sendRequest('/address', $data);
    }
}