# kirby-json-feed

Kirby Plugin to serve a JSON Feed

## Installation

Put the `json-feed.php` File in the `/site/plugins/json-feed` folder.

## Usage

1. Create a new page. For example "feed" (Create folder `feed` in `content` folder. Create an empty file `feed.txt` in it)
2. Create a new template `feed.php` in `/site/template/`
3. Use the following snippet to build your feed:

```php
<?php

    echo page('posts')->children()->visible()->flip()->limit(10)->jsonfeed(array(
      'title' => 'My Blog JSON Feed',
      'feed' => url('feed')
    ));

?>
```

## License

MIT