<?php
// script.php

// Quotes and Roles arrays
$quotes = [
    "He who does not know how to look back at where he came from will never get to his destination.",
    "The youth is the hope of our future.",
    "There are no tyrants where there are no slaves.",
    "To foretell the destiny of a nation, it is necessary to open the book that tells of its past.",
    "A pen is mightier than the sword."
];

$roles = [
    "A. Student (Advocating for youth empowerment and education reform)",
    "B. University Professor (Emphasizing historical education and critical thinking)",
    "C. Journalist (Reporting on historical events that shape present issues)",
    "D. Human Rights Advocate (Fighting for democracy and social justice)",
    "E. Writer (Using literature to inspire change and challenge societal norms)",
];

// Correct matches
$matches = [
    "The youth is the hope of our future." => "A. Student (Advocating for youth empowerment and education reform)",
    "He who does not know how to look back at where he came from will never get to his destination." => "B. University Professor (Emphasizing historical education and critical thinking)",
    "To foretell the destiny of a nation, it is necessary to open the book that tells of its past." => "C. Journalist (Reporting on historical events that shape present issues)",
    "There are no tyrants where there are no slaves." => "D. Human Rights Advocate (Fighting for democracy and social justice)",
    "A pen is mightier than the sword." => "E. Writer (Using literature to inspire change and challenge societal norms)",
];

// Shuffle quotes but maintain key-value structure
$shuffledQuotes = array_keys($matches); // Extract keys (quotes)
shuffle($shuffledQuotes); // Shuffle only the keys


// Handle form submission
$correctCount = 0;
$userMatches = isset($_POST['role']) && is_array($_POST['role']) ? $_POST['role'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($userMatches as $quote => $selectedRole) {
        if (isset($matches[$quote]) && $matches[$quote] === $selectedRole) {
            $correctCount++;
        }
    }
}

// Include the layout for displaying the quiz
require_once 'quiz.php';
?>
