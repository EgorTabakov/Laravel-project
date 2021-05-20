<?php

foreach ($categoriesList[$id] as $key => $news) {

    echo $news . "&nbsp; <a href='" . route('news.show', ['id' => $key]) . "'>К новости</a><br>";

}
