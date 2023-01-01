<?php

include_once('./utils/CryptoPredictor.php');
include_once('./utils/DatasetLoader.php');
include_once('Configuration.php');

$prediction = new CryptoPredictor();
$ai = new SimpleAI();
$datasetLoader = new DatasetLoader($ai);
$config = new Config();

$datasetLoader->load_datasets();
$ai->train();

class SimpleAI
{
    
    protected $artificial_memory = [];
    private $desired_length = 50;

    private Config $config;
    private CryptoPredictor $predictor;
    
    public function __construct()
    {
        $this->config = new Config();
        $this->predictor = new CryptoPredictor();
    }

    public function predict_price(string $symbol): string|null
    {
        return $this->predictor->make_prediction($symbol, '1d');
    } 

    protected function preprocess_string(string $string): string
    {
        return strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $string));
    }

    public function learn($input_str, $output_str): void
    {
        $this->artificial_memory[] = [
            'input' => $input_str,
            'output' => $output_str,
        ];
    }

    public function train(): void
    {
        foreach ($this->artificial_memory as $pair) {
            $input_str = $pair['input'];
            $output_str = $pair['output'];
            
            $this->learn($input_str, $output_str);
        }
    }

    public function generate_article(string $topic): string
    {
        $sentences = [];

        foreach ($this->artificial_memory as $datapoint) {
            if (strpos($this->preprocess_string($datapoint['input']), $this->preprocess_string($topic)) !== false) {
                $sentences[] = $datapoint['output'];
            }
        }

        if (empty($sentences)) {
            return 'I am sorry but it seems that I do not have enough information about the given topic to generate an article.';
        }

        $article = '';

        while (str_word_count($article) < $this->desired_length) {
            $article .= $sentences[array_rand($sentences)] . ' ';
        }

        return $article;
    }  

    public function respond(string $base_input_str): string
    {
        if (preg_match('/article\s+about\s+(\b.+\b)/', $base_input_str, $matches)) {
            return $this->generate_article($matches[1]);
        }

        if (preg_match('/price(?: prediction)?\s+(?:for\s+)?(\w+)/', $this->preprocess_string($base_input_str), $matches)) {
            $symbol = $matches[1];
            return 'The predicted price for tomorrow of ' . $symbol . ' is ' . $this->predict_price($symbol) . '.';
        }

        $input_str = $this->preprocess_string($base_input_str);

        $closest_match = null;
        $max_similarity = 0;

        foreach ($this->artificial_memory as $datapoint) {
            $processed_input = $this->preprocess_string($datapoint['input']);
            $processed_output = $this->preprocess_string($datapoint['output']);
            
            if (strtolower(trim($processed_input)) === strtolower(trim($input_str))) {
                return $datapoint['output'];
            }

            $similarity = $this->compute_similarity($input_str, $processed_input);
            if ($similarity > $max_similarity) {
                $closest_match = $datapoint;
                $max_similarity = $similarity;
            }
        }

        if ($max_similarity > 0.5) {
            return $closest_match['output'];
        }

        $fallbackResponses = $this->config->getFallbackResponses();

        if (isset($fallbackResponses) && !empty($fallbackResponses)) {

            return $fallbackResponses[array_rand($fallbackResponses)];
        }

        return 'I am sorry but it seems that I do not have a response for that.';
    }

    public function compute_similarity(string $string_a, $string_b): float
    {
        $distance = levenshtein($string_a, $string_b);
        $max_length = max(strlen($string_a), strlen($string_b));
        return 1 - $distance / $max_length;
    }

    public function add_dataset(array $dataset): void
    {
        foreach ($dataset as $data) {
            $this->artificial_memory[] = $data;
        }
    }
}

if (!strtolower($config->getType()) === 'website') {
    while (true) {
        print('Please enter a question.' . PHP_EOL);
        $input_str = fgets(STDIN);
        if ($input_str != '') {
            break;
        }

        print('Please enter a valid question.' . PHP_EOL);
    }

    print(ucfirst($ai->respond($input_str)));
} else {
    $input = $_GET['input'];
    $response = $ai->respond($input);
    echo ucfirst($response);
}

?>