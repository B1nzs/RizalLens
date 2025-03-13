<?php include 'script.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RizalLens</title>
    <link rel="icon" type="image/png" href="images/icon.png"> <!-- Logo -->
    <link rel="stylesheet" href="style/quiz-layout.css"> <!-- style sheet (quiz)-->
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .quote, .role { margin: 10px 0; }
        .button { padding: 10px 20px; margin: 5px; cursor: pointer; }
        .result { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rizal’s Words in Today’s World (Matching Game)</h1>
        <h2>Match famous quotes to the version of Rizal that is most appropriate.</h2>

        <form method="post">
        <div class="game-container">
            <div class="header-container">
                <div class="header-quote">Quotes</div>
                <div class="header-role">Select Roles</div>
            </div>
            <?php foreach ($quotes as $quote): ?>
                <div class="quote-role-pair">
                    <div class="quote"><?php echo htmlspecialchars($quote, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="role-wrapper">
                        <select class="role-select" name="role[<?php echo htmlspecialchars($quote, ENT_QUOTES, 'UTF-8'); ?>]">
                            <option value="">Select Role</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


            <br>
            
            <input type="submit" class="button" value="Check Matches">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role'])) {
            $userMatches = $_POST['role'];
            $correctCount = 0;

            foreach ($userMatches as $quote => $selectedRole) {
                if (isset($matches[$quote]) && $matches[$quote] === $selectedRole) {
                    $correctCount++;
                }
            }

            echo "<div class='result'>You got $correctCount out of " . count($quotes) . " matches correct!</div>";
        }
        ?>
        <div class="quiz-button-container">
            <a href="index.php" class="quiz-button">Go Back</a>
        </div>
    </div>
</body>
</html>