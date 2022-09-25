<?php

namespace Quotes;

class FindQuoteService
{
    private string $routePath;
    private array $quotes;

    public function __construct(string $route_path)
    {
        $this->routePath = $route_path;
        $this->quotes = config('quotes')['quotes'] ?? [];
    }

    public function boot(): array
    {
        return $this->findConfigByRoutePath();
    }

    private function findConfigByRoutePath(): array
    {
        $path = $this->textFix($this->routePath);
        foreach ($this->quotes as $quote_name => $quote) {
            if ($this->search($path, $quote_name)) {
                return $quote;
            }
        }

        return [];
    }

    private function search(string $path, string $quote_name): bool
    {
        return str_contains($path, $quote_name);
    }

    private function textFix(string $text): string
    {
        return trim(strtolower($text)) ?? '';
    }
}
