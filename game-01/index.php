<?php
$errors = [];

if (!empty($_POST)) {
    include_once './ConjunctNumbers.php';

    $validators = ['numbers', 'sumNumber'];

    $valid = true;

    //Validate for all fields required
    foreach ($validators as $validator) {
        if (empty($_POST[$validator])) {
            $errors[$validator] = true;
            $valid = false;
        }
    }

    //Validate if sumNumber is a numeric.
    if(!is_numeric($_POST['sumNumber']))
    {
        $valid = false;
        $errors['sumNumber'] = true;
    }

    if ($valid) {
        $conjunctNumbers = new ConjunctNumbers($_POST['numbers'], $_POST['sumNumber']);
        $result = $conjunctNumbers->getSum();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game 01</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="col-sm-6  offset-sm-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Game 01</h4>
            </div>
            <div class="card-body">
                <?php if (isset($valid) && $valid) : ?>
                    <?php if (empty($result)): ?>
                        <h1>No se pudo obtener un resultado valido.</h1>
                    <?php else: ?>
                        <p>
                            [
                                <?= implode(',', $result) ?>
                            ]
                        </p>
                    <?php endif; ?>
                <?php else: ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="numbers-input">Numbers</label>
                            <input type="text" class="form-control" id="numbers-input" name="numbers"
                                   placeholder="Enter a list of numbers (1,2,3,4,5)"
                                   value="<?= $_POST['numbers'] ?? '' ?>">
                            <?php if (isset($errors['numbers']) && $errors['numbers']) : ?>
                                <small class="form-text text-danger">The numbers field is required</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="result">Sum result</label>
                            <input type="text" class="form-control" id="result" name="sumNumber"
                                   placeholder="Enter a integer number (Ex. 10)"
                                   value="<?= $_POST['sumNumber'] ?? '' ?>">
                            <?php if (isset($errors['sumNumber']) && $errors['sumNumber']) : ?>
                                <small class="form-text text-danger">The result field is required or is not a number.</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>