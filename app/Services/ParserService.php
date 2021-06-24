<?php


namespace App\Services;


use App\Contracts\ParserServiceContract;
use App\Models\Category;
use App\Models\News;
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

    public function store($url)
    {
        $rss = ParserService::getNews($url);
        $newsList = $rss['news'];

        $fieldsCategory = [
            'title' => $rss['title'],
            'description' => $rss['description']
        ];

        $newsCategory = Category::create($fieldsCategory);
        $newsCategory->save();


        for ($i = 0; $i < count($newsList); $i++) {

            $fields = [
                'category_id' => $newsCategory->id,
                'title' => $newsList[$i]['title'],
                'image' => $newsList[$i]['link'],
                'description' => $newsList[$i]['description'],
            ];

            $news = News::create($fields);
        }


    }

}
