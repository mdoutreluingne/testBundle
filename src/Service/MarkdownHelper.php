<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class MarkdownHelper
{
    private $markdownParser;
    private $cache;
    private $isDebug;
    private $mdLogger;

    public function __construct(MarkdownParserInterface $markdownParser, CacheInterface $cache, bool $isDebug, LoggerInterface $mdLogger)
    {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
        $this->isDebug = $isDebug;
        $this->mdLogger = $mdLogger;
    }
    
    public function parse(string $source): string
    {
        if (stripos($source, 'cat') !== false) {
            $this->mdLogger->info('Meow!');
        }
        if ($this->isDebug) {
            return $this->markdownParser->transformMarkdown($source);
        }
        return $this->cache->get('markdown_' . md5($source), function () use ($source) {
            return  $this->markdownParser->transformMarkdown($source);
        });
    }
}
?>