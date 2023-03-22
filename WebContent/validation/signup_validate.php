<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define validation rules for form fields
    $validation_rules = array(
        "First name" => "required|alpha",
        "Last name" => "required|alpha",
        "Username" => "required|alpha",
        "Password" => "required"
    );

    // Define error messages for validation rules
    $validation_messages = array(
        "required" => "This field is required",
        "alpha" => "This field must contain only letters"
    );

    // Validate form data using a validation library or function
    // Here, we're using the Valitron library (https://github.com/vlucas/valitron)
    require_once "vendor/autoload.php";
    $v = new Valitron\Validator($_POST);
    $v->mapFieldsRules($validation_rules, $validation_messages);
    if ($v->validate()) {
        // If form data is valid, insert it into database
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, username, password) VALUES (:first_name, :last_name, :username, :password)");
        $stmt->bindParam(":first_name", $_POST["First name"]);
        $stmt->bindParam(":last_name", $_POST["Last name"]);
        $stmt->bindParam(":username", $_POST["Username"]);
        $stmt->bindParam(":password", password_hash($_POST["Password"], PASSWORD_DEFAULT));
        $stmt->execute();

        // Redirect user to a success page
        header("Location: index.php");
        die();
    } else {
        // If form data is invalid, display error messages to user
        $errors = $v->errors();
        // Display error messages to user
    }
}
?>