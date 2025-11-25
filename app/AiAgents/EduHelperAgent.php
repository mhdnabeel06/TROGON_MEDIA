<?php

namespace App\AiAgents;

use LarAgent\Agent;
use LarAgent\Messages\UserMessage;

class EduHelperAgent extends Agent
{
    public function __construct($provider = 'default')
    {
        parent::__construct($provider);
    }

    protected $model = 'gpt-5-nano';
    protected $history = 'in_memory';

    protected array $allowedTopics = [
        'solar system',
        'fractions',
        'water cycle',
    ];

    public function instructions()
    {
        return "
You are EduHelperAgent, a polite educational chatbot for school students.

Rules:
- You can ONLY answer questions about Solar System, Fractions or Water Cycle.
- Limit answers to 60 words.
- If topic not allowed say: I can only help with Solar System, Fractions or Water Cycle 😊
";
    }

    public function prompt($message)
    {
        $lower = strtolower($message);

        foreach ($this->allowedTopics as $topic) {
            if (str_contains($lower, $topic)) {
                return $message; // send raw text to AI
            }
        }

        return "I can only help with Solar System, Fractions, or Water Cycle 😊";
    }
}
