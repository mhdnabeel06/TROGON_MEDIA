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
    $topicCheck = $this->classifyTopic($message);

    if (!in_array($topicCheck, $this->allowedTopics)) {
        return "I can only help with Solar System, Fractions, or Water Cycle 😊";
    }

    return $message;
}

private function classifyTopic($text)
{
    $keywords = [
        'solar system' => ['planet', 'sun', 'orbit', 'space', 'earth', 'mars', 'galaxy'],
        'fractions' => ['half', 'quarter', 'divide', 'numerator', 'denominator', 'part'],
        'water cycle' => ['rain', 'evaporation', 'condensation', 'clouds', 'precipitation'],
    ];

    $text = strtolower($text);

    foreach ($keywords as $topic => $words) {
        foreach ($words as $word) {
            if (str_contains($text, $word)) {
                return $topic;
            }
        }
    }

    return 'unknown';
}

}
