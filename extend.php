<?php

use Michaelbelgium\Discussionviews\Listeners;
use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Extend\Locales;
use Flarum\Extend\Frontend;

return [
    (new Frontend('forum'))
        ->css(__DIR__ . '/less/extension.less')
        ->js(__DIR__. '/js/dist/forum.js'),

    (new Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js'),

    new Locales(__DIR__ . '/locale'),

    function (Dispatcher $events) {
        $events->subscribe(Listeners\AddRelationship::class);
        $events->subscribe(Listeners\AddDiscussionViewHandler::class);
        $events->subscribe(Listeners\AddPopularSort::class);
        $events->subscribe(Listeners\SaveDiscussionFromModal::class);
        $events->subscribe(Listeners\SettingsToForum::class);
    }
]; 
