<?php

return function ($page) {

    return [
        'gallery' => $page->images()->filterBy("template", "image")->sortBy("sort")
    ];

};