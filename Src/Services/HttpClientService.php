<?php
declare(strict_types=1);

namespace Abdullah\Karam\Services;

class HttpClientService
{
    public array $response;
    protected function request(string $method,string $url, array $headers = []): mixed
    {
        return $this->$method($url, $headers);
    }

    public function get(string $url, array $headers = []): mixed
    {
        $curl = $this->connectionOpen($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        return $this->response = json_decode($this->execute($curl), true);
    }

    protected function execute(mixed $curl): string|bool
    {
        $this->connectionClose($curl);
        return curl_exec($curl);
    }

    protected function connectionOpen(string $url): bool|\CurlHandle
    {
        return curl_init($url);
    }

    private function connectionClose(mixed $curl): void
    {
        curl_close($curl);
    }
}