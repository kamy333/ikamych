<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once dirname(__DIR__) . "/api/init.php";

$message = "";
$name="";
$username="";
$password="";
$errors=[];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

    $minLen = 3;

    if(!has_presence($name)){
        $errors[]=  "<strong>Name:</strong> cannot be empty.";
    }
    if (!has_presence($username)) {
        $errors[]= "<strong>Username:</strong> cannot be empty.";
    }elseif (strlen($username) < $minLen){
        $errors[]= "<strong>Username:</strong> must have at least {$minLen} characters.";
    }

    if (!has_presence($password)) {
        $errors[]=  "<strong>Password:</strong> cannot be empty.";
    } elseif (strlen($password) < $minLen ){
        $errors[]=  "<strong>Password:</strong> must have at least {$minLen} characters.";
    }



    if (empty($errors)) {

        $database = new Database(DB_SERVER, DB_NAME_API, DB_USER, DB_PASS);
        $conn = $database->getConnection();

        $sql = "INSERT INTO user (name, username, password_hash, api_key)
            VALUES (:name, :username, :password_hash, :api_key)";

        $stmt = $conn->prepare($sql);

        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $api_key = bin2hex(random_bytes(16));

        $stmt->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
        $stmt->bindValue(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->bindValue(":password_hash", $password_hash, PDO::PARAM_STR);
        $stmt->bindValue(":api_key", $api_key, PDO::PARAM_STR);

        $stmt->execute();

        echo "<div style='background-color: #D5F5E3;padding: 15px;margin: 50px'>
 Thank you for registering. Your API key is ", $api_key."</div>";
        unset($_POST);
        //header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <style>
        .errors{
            background-color: #FADBD8;padding: 15px
        }
        .success{
            background-color: #D5F5E3;padding: 15px
        }


    </style>
</head>
<body>

<main class="container">

      <nav>
        <ul>
          <li>
            <details role="list">
              <summary aria-haspopup="listbox" role="button" class="secondary">Menu</summary>
              <ul role="listbox">
                <li><a href="https://www.ikamy.ch/api_web/login.php" data-theme-switcher="auto">Login</a></li>
                <li><a href="https://www.ikamy.ch/api_web/register.php#" data-theme-switcher="light">Register</a></li>
                <li><a href="#" data-theme-switcher="dark">Dark</a></li>
              </ul>
            </details>
          </li>
          <li>
            <details role="list">
              <summary aria-haspopup="listbox">Examples</summary>
              <ul role="listbox">
                <li><a href="../preview/">Preview</a></li>
                <li><a href="../preview-rtl/">Right-to-left</a></li>
                <li><a href="../classless/">Class-less</a></li>
                <li><a href="../basic-template/">Basic template</a></li>
                <li><a href="../company/">Company</a></li>
                <li><a href="../google-amp/">Google Amp</a></li>
                <li><a href="../sign-in/">Sign in</a></li>
                <li><a href="../bootstrap-grid/">Bootstrap grid</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </nav>

    <h1>Register</h1>

    <?php
    echo display_errors($errors);
    ?>

    <form method="post" autocomplete="off">

        <label for="name">
            Name
            <input name="name" id="name" value="<?php echo h($name); ?>">
        </label>

        <label for="username">
            Username
            <input name="username" id="username" autocomplete="off" value="<?php echo h($username); ?>"">
        </label>

        <label for="password">
            Password
            <input type="password" name="password" id="password" autocomplete="new-password">
        </label>

        <button>Register</button>
    </form>

</main>

</body>
</html>
        
        
        
        
        
        
        
        
        
        
        
        
        