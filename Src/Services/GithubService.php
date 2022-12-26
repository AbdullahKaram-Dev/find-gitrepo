<?php
declare(strict_types=1);

namespace Abdullah\Karam\Services;

class GithubService extends HttpClientService
{
    private string $url = 'https://api.github.com/search/repositories?q=';
    private static string $created = 'created=>';
    private string $language = '+language:';
    private string $perPage = '&per_page=';
    private int|string $orderBy = '&sort=';
    private int|string $PER_PAGE;
    private string $page = '&page=1';
    private array $headers = [
        'Accept: application/vnd.github.v3+json',
        'User-Agent: AbdullahKaram-Dev',
        'X-GitHub-Api-Version: 2022-11-28'
    ];

    public function __construct()
    {
        $this->tryResolvePage();
    }

    protected function tryResolvePage(): void
    {
        if (isset($_GET['page'])) {
            $this->page = '&page=' . $_GET['page'];
        }
    }

    public function fetch(): self
    {
        $this->request('get',$this->urlWithQuery(),$this->headers);
        return $this;
    }

    public static function whereCreated(string $date): self
    {
        static::$created.= $date;
        return new static;
    }

    public function whereLanguage(string $language): self
    {
        $this->language .= $language;
        return $this;
    }

    public function perPage(int|string $perPage): self
    {
        $this->PER_PAGE = $perPage;
        $this->perPage .= $perPage;
        return $this;
    }

    public function OrderBy(string|int $orderBy): self
    {
        $this->orderBy .= $orderBy;
        return $this;
    }

    private function urlWithQuery(): string
    {
        return $this->url.static::$created.$this->language.$this->perPage.$this->orderBy.$this->page;
    }

    public function toJson(): string
    {
        $this->tryResolvePagesCount();
        $this->setCurrentPage();
        return json_encode($this->response);
    }

    public function tryResolvePagesCount(): void
    {
        $this->response['pages_count'] = (isset($this->response['total_count']) && $this->response['total_count'] > 0)
            ? ceil($this->response['total_count'] / $this->PER_PAGE) : 0;
    }

    public function setCurrentPage(): void
    {
        $this->response['current_page'] = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
    }

}
