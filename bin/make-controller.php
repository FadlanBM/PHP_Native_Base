<?php

define('APP_ROOT', __DIR__ . '/../app');
define('SRC_ROOT', APP_ROOT . '/src');

$argvCount = $_SERVER['argc'] ?? 0;

if ($argvCount < 2) {
    echo "Usage: php bin/make-controller.php Name\n";
    exit(1);
}

$rawName = $_SERVER['argv'][1];
$rawName = trim($rawName);

if ($rawName === '') {
    echo "Error: Controller name cannot be empty.\n";
    exit(1);
}

$normalized = preg_replace('/[^a-zA-Z0-9]+/', ' ', $rawName);
$normalized = ucwords(strtolower($normalized));
$normalized = str_replace(' ', '', $normalized);

if (str_ends_with($normalized, 'Controller')) {
    $classBase = substr($normalized, 0, -10);
} else {
    $classBase = $normalized;
}

$className = $classBase . 'Controller';
$fileName = $className . '.php';
$targetDir = SRC_ROOT . '/Controllers';
$targetPath = $targetDir . '/' . $fileName;

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0775, true);
}

if (file_exists($targetPath)) {
    echo "Controller already exists: {$fileName}\n";
    exit(0);
}

$viewName = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $classBase));
$viewPath = $viewName . '/index';

$template = <<<PHP
<?php

namespace App\Controllers;

use App\Core\Controller;

class {$className} extends Controller
{
    public function index()
    {
        return \$this->view('{$viewPath}', [
            'title' => '{$classBase}'
        ]);
    }
}

PHP;

file_put_contents($targetPath, $template);

echo "Controller created: {$fileName}\n";
echo "Location: {$targetPath}\n";

