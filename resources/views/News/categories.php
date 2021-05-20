<?php
foreach ($categoriesList as $name => $cat) {


        echo $name . "&nbsp; <a href='" . route('news.categoriesShow', ['id' => $name]) . "'>К категории</a><br>";

}
