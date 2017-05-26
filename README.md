# kirby-json-feed

Kirby Plugin to serve a JSON Feed. This plugin implements some of the structure fields of the [JSON Feed Spec Version 1](https://jsonfeed.org/version/1).

## Installation

Put the `json-feed.php` File in the `/site/plugins/json-feed` folder.

### Advanced: Git Submodules

```shell
git submodule add https://github.com/stefanzweifel/kirby-json-feed.git site/plugins/json-feed
```

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

4. Visit `/feed` on your site and you should see your new JSON RSS Feed.

## List of Supported RSS Readers

A short ongoing list of RSS Readers which already support the JSON Format.

- [Feedbin](https://feedbin.com) - [Blogpost](https://feedbin.com/blog/2017/05/22/feedbin-supports-json-feed/)
- [Newsblur](http://newsblur.com) - [Blogpost](http://blog.newsblur.com/post/160982162270/newsblur-now-supports-the-new-json-feed-spec)

Feel free to open an Issue or Pull request if you know more readers which support this new standard (Or if there's another list of supported readers).

## License

MIT