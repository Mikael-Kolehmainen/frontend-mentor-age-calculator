<?php

use public_site\controller\ErrorController;
use public_site\controller\HomeController;
use api\manager\ServerRequestManager;

require __DIR__ . "/src/inc/bootstrap.php";

session_start();

$directoriesFromRoot = 0;

$baseUrl = ServerRequestManager::getBaseUrl($directoriesFromRoot);
$uri = ServerRequestManager::getUriParts();
$uri = array_splice($uri, $directoriesFromRoot);

if ($uri[2] != "ajax") {
  echo "
    <!DOCTYPE html>
    <html>
      <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Age Calculator</title>
        <link rel='icon' type='image/x-icon' href='./src/public_site/media/icons/favicon-32x32.png'>
        <link href='./src/public_site/styles/css/main.css' rel='stylesheet' type='text/css'>
        <script src='./src/public_site/js/ageCalculator.js' defer></script>
  ";
}

switch ($uri[2]) {
  case "":
    showHome();
    break;
  case "error":
    showError("Error title", "This is the error page.", "$baseUrl/index.php");
    break;
  default:
    showError(
      "404 Not Found",
      "The page you're looking for doesn't exist.",
      "$baseUrl/index.php"
    );
    exit();
}

if ($uri[2] != "ajax") {
  echo "
      </body>
    </html>
  ";
}

function showHome(): void
{
  $homeController = new HomeController();
  $homeController->showHomePage();
}

/**
 * @param string $title
 * @param string $message
 * @param string $link
 */
function showError($title, $message, $link): void
{
  $errorController = new ErrorController($title, $message, $link);
  $errorController->showErrorPage();
}
