<?php

/**
 * JSON Feed Plugin.
 *
 * @author Stefan Zweifel <hello@stefanzweifel.io>
 *
 * @url https://github.com/stefanzweifel/kirby-json-feed
 *
 * @version 1.3.0
 */
Pages::$methods['jsonfeed'] = function ($pages, $params = []) {

    // set all default values
    $defaults = [
        'title'       => 'Feed',
        'feed'        => url(),
        'datefield'   => 'date',
        'textfield'   => 'text',
    ];

    // merge them with the user input
    $options = array_merge($defaults, $params);

    $items = [];

    foreach ($pages as $item) {
        $items[] = [
            'id'             => $item->url(),
            'url'            => $item->url(),
            'title'          => $item->title()->value(),
            'content_html'   => $item->{$options['textfield']}()->kirbytext()->value,
            'date_published' => $item->date('c', $options['datefield']),
            'date_modified'  => $item->modified('Y-m-d\TH:i:sP'),
        ];
    }

    // Set the Header
    header::type('application/json');

    // Build the response
    $feed = [
        'version'       => 'https://jsonfeed.org/version/1',
        'title'         => $options['title'],
        'home_page_url' => url(),
        'feed_url'      => $options['feed'],
        'items'         => $items,
    ];

    return json_encode($feed);
};
