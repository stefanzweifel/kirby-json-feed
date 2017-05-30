<?php

/**
* JSON Feed Plugin
*
* @author Stefan Zweifel <hello@stefanzweifel.io>
* @version 1.2.0
*/
Pages::$methods['jsonfeed'] = function($pages, $params = array()) {

    // set all default values
    $defaults = array(
        'title'       => 'Feed',
        'feed'        => url(),
        'datefield'   => 'date',
        'textfield'   => 'text',
    );

    // merge them with the user input
    $options = array_merge($defaults, $params);

    $items = array();

    foreach($pages as $item) {
        $items[] = array(
            'id' => $item->url(),
            'url' => $item->url(),
            'title' => $item->title()->value(),
            'content_html' => $item->{$options['textfield']}()->kirbytext()->value,
            'date_published' => $item->date('c', $options['datefield']),
            'date_modified' => $item->date('c', $options['datefield'])
        );
    }

    // Set the Header
    header::type('application/json');

    // Build the response
    $feed = array(
        'version' => 'https://jsonfeed.org/version/1',
        'title' => $options['title'],
        'home_page_url' => url(),
        'feed_url' => $options['feed'],
        'items' => $items
    );

    return json_encode($feed);

};
