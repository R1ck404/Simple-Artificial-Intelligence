<?php

class CryptoPredictor
{

    function get_current_price(string $symbol): float|null {
        $symbol = strtoupper($symbol);
        $endpoint = "https://api.binance.com/api/v3/ticker/price?symbol=$symbol";
        $response = file_get_contents($endpoint);
        $responseData = json_decode($response, true);

        $price = $responseData["price"];
        return $price;
    }

    public function get_historical_data(string $symbol, string $interval): array|null {
        $symbol = strtoupper($symbol);
        
        $api_endpoint = "https://api.binance.com/api/v3/klines";
        $api_params = array(
            "symbol" => $symbol,
            "interval" => $interval,
            "limit" => 7
        );

        $query = http_build_query($api_params);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $api_endpoint . "?" . $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $response_array = json_decode($response, true);

        $close_prices = array();
        
        if (isset($response_array["code"]) && $response_array["code"] != 0) {
            echo "Error: " . $response_array["msg"] . "\n";
        } else {
            foreach ($response_array as $data) {
                $close_prices[] = $data[4];
            }
        }

        return $close_prices;
    }
    
    public function make_prediction(string $symbol, string $interval): string|float {
        $historical_data = $this->get_historical_data($symbol, $interval);
        if (empty($historical_data))
            return "There was a problem in predicting the price of $symbol.";
            
        $dates = array_keys($historical_data);
        $last_date = end($dates);
        $trendline = $this->linear_regression($historical_data);

        
        $prediction = $this->predict($trendline, $last_date);

        return $prediction;
    }
    
    public function linear_regression(array $data): array {
        if (empty($data))
            return [];
        $x_values = array_keys($data);
        $y_values = array_values($data);
    
        $x_sum = array_sum($x_values);
        $y_sum = array_sum($y_values);
    
        $x_mean = $x_sum / count($x_values);
        $y_mean = $y_sum / count($y_values);
    
        $numerator = 0;
        $denominator = 0;
        for ($i = 0; $i < count($x_values); $i++) {
            $numerator += ($x_values[$i] - $x_mean) * ($y_values[$i] - $y_mean);
            $denominator += ($x_values[$i] - $x_mean) ** 2;
        }
    
        $slope = $numerator / $denominator;
        $intercept = $y_mean - $slope * $x_mean;
    
        return ['slope' => $slope, 'intercept' => $intercept];
    }
    
    public function predict($trendline, $x): float {
        $prediction = $trendline['slope'] * $x + $trendline['intercept'];
        return $prediction;
    }

    public function percentage(float $value_A, float $value_B): float {
        if ($value_A == 0 or $value_B == 0) {
            return 0;
        }

        return (($value_B - $value_A) / $value_A) * 100;
    }
}
?>
