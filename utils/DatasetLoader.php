<?php

include_once('./AI.php');

class DatasetLoader {

    private SimpleAI $artificial_intelligence;

    function __construct(SimpleAI $artificial_intelligence)
    {
        $this->artificial_intelligence = $artificial_intelligence;
    }

    public function load_datasets(): void {
        $this->artificial_intelligence->add_dataset([
            ['input' => 'What is your name?', 'output' => 'You can call me SAI, short for Simple Artificial intelligence.'],
            ['input' => 'Who are you?', 'output' => 'I am SAI, short for Simple Artificial intelligence.'],
            ['input' => 'What are you?', 'output' => 'I am an Simple Artificial intelligence.'],
            ['input' => 'How much data do you have?', 'output' => 'I have very little data.'],
            ['input' => 'That is okay', 'output' => ':)'],
            ['input' => 'No problem', 'output' => '(:'],
            ['input' => 'Hello', 'output' => 'Hello what can i do for you today?'],
            ['input' => 'Hi', 'output' => 'Hello what can i do for you today?'],
            ['input' => 'Can you help me', 'output' => 'Ask what you need.'],
            ['input' => 'Hi, how are you', 'output' => 'Hi i am okay, what about you?'],
            ['input' => 'Not so good', 'output' => 'Sorry to hear, is there anything i can do for you?'],
            ['input' => 'i am not okay', 'output' => 'Sorry to hear, is there anything i can do for you?'],
            ['input' => 'good', 'output' => 'Good to hear, is there anything i can do for you?'],
            ['input' => 'i am okay', 'output' => 'Good to hear, is there anything i can do for you?'],
            ['input' => 'no thank you', 'output' => 'Alright.'],
        
            ['input' => 'The capital of France is Paris.', 'output' => 'Paris is the capital and most populous city of France. It is located on the Seine River in the north of the country and is the center of the Paris metropolitan area, which has a population of over 12 million people. Paris is known for its iconic landmarks such as the Eiffel Tower and the Louvre Museum, as well as its vibrant culture, cuisine, and fashion scene.'],
            ['input' => 'The capital of Italy is Rome.', 'output' => 'Rome is the capital and largest city of Italy. It is located in the central part of the country and is the center of the Metropolitan City of Rome, which has a population of over 4.3 million people. Rome is known for its rich history, ancient ruins, and iconic landmarks such as the Colosseum and the Pantheon, as well as its delicious cuisine and vibrant culture.'],
            ['input' => 'The capital of Spain is Madrid.', 'output' => 'Madrid is the capital and largest city of Spain. It is located in the center of the country and is the center of the Metropolitan Area of Madrid, which has a population of over 6.5 million people. Madrid is known for its lively atmosphere, rich culture, and iconic landmarks such as the Royal Palace and the Plaza Mayor, as well as its delicious cuisine and vibrant nightlife.'],
            ['input' => 'The capital of the United Kingdom is London.', 'output' => 'London is the capital and largest city of the United Kingdom. It is located in the southeast of the country and is the center of the Greater London metropolitan area, which has a population of over 14 million people. London is known for its rich history, iconic landmarks such as Buckingham Palace and the Tower of London, and its vibrant culture and arts scene.'],
            ['input' => 'The capital of Germany is Berlin.', 'output' => 'Berlin is the capital and largest city of Germany. It is located in the northeastern part of the country and is the center of the Berlin-Brandenburg metropolitan region, which has a population of over 6 million people. Berlin is known for its rich history, diverse culture, and iconic landmarks such as the Brandenburg Gate and the Berlin Wall, as well as its vibrant nightlife and art scene.'],
            ['input' => 'The capital of Japan is Tokyo.', 'output' => 'Tokyo is the capital and largest city of Japan. It is located in the eastern part of the country and is the center of the Greater Tokyo Area, which has a population of over 37 million people. Tokyo is known for its high-tech infrastructure, bustling streets, and iconic landmarks such as the Tokyo Tower and Tokyo Skytree, as well as its delicious cuisine and unique culture.'],
            ['input' => 'What is the tallest animal?','output' => 'The tallest animal in the world is the giraffe.'],
            ['input' => 'What is the heaviest animal?','output' => 'The heaviest animal in the world is the blue whale.'],
            ['input' => 'What is the fastest land animal?','output' => 'The fastest land animal is the cheetah.'],
            ['input' => 'What is the largest animal on earth?','output' => 'The largest animal on earth is the elephant.'],
            ['input' => 'What is the smallest mammal?','output' => 'The smallest mammal is the bumblebee bat.'],
            ['input' => 'What is the capital of the United States?', 'output' => 'The capital of the United States is Washington, D.C.'],
            ['input' => 'What is the capital of France?', 'output' => 'The capital of France is Paris.'],
            ['input' => 'What is the capital of China?', 'output' => 'The capital of China is Beijing.'],
            ['input' => 'What is the capital of Japan?', 'output' => 'The capital of Japan is Tokyo.'],
            ['input' => 'What is the capital of Australia?', 'output' => 'The capital of Australia is Canberra.'],
            ['input' => 'What is the capital of India?', 'output' => 'The capital of India is New Delhi.'],
            ['input' => 'What is the capital of Canada?', 'output' => 'The capital of Canada is Ottawa.'],
            ['input' => 'What is the capital of Russia?', 'output' => 'The capital of Russia is Moscow.'],
            ['input' => 'What is the capital of Brazil?', 'output' => 'The capital of Brazil is Brasília.'],
            ['input' => 'What is the capital of Mexico?', 'output' => 'The capital of Mexico is Mexico City.'],
            ['input' => 'What is the capital of Egypt?', 'output' => 'The capital of Egypt is Cairo.'],
            ['input' => 'What is the capital of France?', 'output' => 'The capital of France is Paris.'],
            ['input' => 'What is the capital of Germany?', 'output' => 'The capital of Germany is Berlin.'],
            ['input' => 'What is the capital of Italy?', 'output' => 'The capital of Italy is Rome.'],
            ['input' => 'What is the capital of Spain?', 'output' => 'The capital of Spain is Madrid.'],
            ['input' => 'What is the capital of the United Kingdom?', 'output' => 'The capital of the United Kingdom is London.'],
            ['input' => 'What is the capital of the Netherlands?', 'output' => 'The capital of the Netherlands is Amsterdam.'],
            ['input' => 'What is the capital of Sweden?', 'output' => 'The capital of Sweden is Stockholm.'],
            ['input' => 'What is the capital of Denmark?', 'output' => 'The capital of Denmark is Copenhagen.'],
            ['input' => 'What is the capital of Finland?', 'output' => 'The capital of Finland is Helsinki.'],
            ['input' => 'What is the capital of Norway?', 'output' => 'The capital of Norway is Oslo.'],
            ['input' => 'What is the capital of Poland?', 'output' => 'The capital of Poland is Warsaw.'],
            ['input' => 'What is the capital of Czech Republic?', 'output' => 'The capital of Czech Republic is Prague.'],
            ['input' => 'What is the capital of Hungary?', 'output' => 'The capital of Hungary is Budapest.'],
            ['input' => 'What is the capital of Romania?', 'output' => 'The capital of Romania is Bucharest.'],
            ['input' => 'What is a programming language?','output' => 'A programming language is a set of instructions that a computer can interpret and execute.'],
            ['input' => 'What is a syntax error?','output' => 'A syntax error is a mistake in the structure of a programming language statement.'],
            ['input' => 'What is a variable?','output' => 'A variable is a named location in memory that stores a value that can be changed during the execution of a program.'],
            ['input' => 'What is an algorithm?','output' => 'An algorithm is a set of steps that are followed to solve a problem.'],
            ['input' => 'What is an object-oriented programming language?','output' => 'An object-oriented programming language is a programming language that uses objects and classes to design and organize code.'],
            ['input' => 'What is the largest planet in our solar system?', 'output' => 'The largest planet in our solar system is Jupiter.'],
            ['input' => 'What is the second largest planet in our solar system?', 'output' => 'The second largest planet in our solar system is Saturn.'],
            ['input' => 'What is the third largest planet in our solar system?', 'output' => 'The third largest planet in our solar system is Uranus.'],
            ['input' => 'What is the fourth largest planet in our solar system?', 'output' => 'The fourth largest planet in our solar system is Neptune.'],
            ['input' => 'What is the smallest planet in our solar system?', 'output' => 'The smallest planet in our solar system is Mercury.'],
            ['input' => 'What is the second smallest planet in our solar system?', 'output' => 'The second smallest planet in our solar system is Venus.'],
        ]);

        $this->artificial_intelligence->train();
    }

    public function loadFromCSV(): void {

    }
}
?>