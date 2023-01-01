
# Simple Artificial Intelligence

Welcome to our Simple Artificial Intelligence project! This AI is designed to be lightweight, easy to use, and fully open source. It is an experimental, fun project that allows users to interact with a simple AI and see how it responds. Our goal is to create a straightforward, accessible AI that anyone can use and learn from. Whether you're a seasoned developer or just starting out with AI, this project is a great way to explore and learn. Thank you for checking out our project, and we hope you enjoy using our Simple AI!


## Features

- Simple AI
- Crypto symbol price predictions.
- Article creation (really bad with a small dataset)
- Dataset handling.


## Usage/Examples

```php 
//In the Configuration file you can edit 'fallback' messages.
//These messages will be send to the user if there is no response in the AI's dataset.

public array $fallback_responses = [
    "I'm sorry, I'm not sure how to respond to that.",
    "I'm not sure what you're asking. Could you please rephrase your question?",
    "I'm sorry, I don't have enough information to give a specific response to your question.",
    "I'm not sure I understand what you're asking. Could you please provide more context or give more details?",
    "I apologize, but it seems that I don't have a specific response for that. Is there anything else I can help with?",
];
```

```php
//First of all, a dataset is basicly the mind of the artificial intelligence. its where
//all its data exists and goes.

//To add data to the already existing dataset you can go into DatasetLoader.php,
//and do the following steps.

/*The format of the dataset is:*/ ['input' => 'the question', 'output' => 'the answer'];

//so if you want to add data to the dataset, simply add the data to the already
//existing one like this:

$this->artificial_intelligence->add_dataset([
    ['input' => 'the question', 'output' => 'the answer'],
];


//I do want to note that the AI does not fully learn from itself,
//im still thinking about implementing a rating system so that the ai knows when he did
//something right or wrong.
```


## Deployment

To deploy this project as a webserver i recommend using xampp.

XAMPP is a free, open-source cross-platform web server that provides a localhost development environment for testing and deploying web applications. It includes Apache, MariaDB, and PHP software stack technologies.


To deploy this project as a terminal Go into the Configuration.php file and edit the 'type' variable to 'terminal'.
then execute the following command.
```bash
  php AI.php
```


## Screenshots

![App Screenshot](https://github.com/R1ck404/Simple-Artificial-Intelligence/blob/main/images/artificial_intelligence.png)

