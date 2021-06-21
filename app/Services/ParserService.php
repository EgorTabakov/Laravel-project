<?php


namespace App\Services;


use App\Contracts\ParserServiceContract;
use Orchestra\Parser\Xml\Facade as XMLParser;

class ParserService implements ParserServiceContract
{
    /**
     * @param string $url
     * @return array
     */
    public function getNews(string $url): array
    {
        $xml = XMLParser::load($url);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guide,description,pubDate]'
            ],



        ]);
    }
}
