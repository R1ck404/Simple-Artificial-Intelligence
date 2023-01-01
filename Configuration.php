<?php

class Config {
    public array $fallback_responses = [
        "I'm sorry, I'm not sure how to respond to that.",
        "I'm not sure what you're asking. Could you please rephrase your question?",
        "I'm sorry, I don't have enough information to give a specific response to your question.",
        "I'm not sure I understand what you're asking. Could you please provide more context or give more details?",
        "I apologize, but it seems that I don't have a specific response for that. Is there anything else I can help with?",
    ];

    public string $type = 'website'; //website or terminal

    public function getFallbackResponses(): array 
    {
        return $this->fallback_responses;
    }

    public function getType(): string
    {
        return $this->type;
    }
}

?>