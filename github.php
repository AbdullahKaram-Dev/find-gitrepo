<?php
declare(strict_types=1);

header('Content-Type: application/json');

require_once 'vendor/autoload.php';

use Abdullah\Karam\Services\GithubService;
use Abdullah\Karam\Validation\Validation;

$validator = Validation::make($_GET,[
    'language' => ['required','text','in:php,JavaScript,Python,Java,C++'],
    'order_by' => ['required','text','in:stars,forks,help-wanted-issues,updated'],
    'per_page' => ['required','numeric','between:20,50'],
    'created' => ['required','date'],
]);

if (!empty($validator)) {
    http_response_code(422);
    echo json_encode($validator);
    exit;
}

extract($_GET);

$repositories = GithubService::whereCreated($created)->whereLanguage($language)->perPage($per_page)
                ->OrderBy($order_by)->fetch()->toJson();

echo $repositories;