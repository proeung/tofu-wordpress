![alt tag](https://github.com/proeung/tofu/blob/master/screenshot.png?raw=true)

# Tofu - A Starter Theme for WordPress #

Tofu is a Wordpress starter theme designed to keep things simple while providing template suggestion files and useful preprocess functions for your project. This is a theme that is not meant to use as a parent theme, however, feel free to remove or add components to fit your needs. This theme was formed from components pulled from underscores.


## Installation ##

1. Setup the location for your new starter-theme (eg. `/wp-content/themes`).

2. Find and replace the word "Tofu" with the desired name of your new starter theme.

3. Gulp is required to manage assets.

4. First, you will need to install NodeJS.

5. Install gulp with `npm install -g gulp` from the command line. On some setups, sudo may be required.

6. Run `npm install` in your theme directory.

7. Run `gulp` to compiled and watch your JS/CSS changes.

8. Set your website's default theme.

## Helper Functions ##

How to render an image tag:

```php
tofu_img($image_id, $image_size = 'img_style_name');
```

HTML Output:
``` html
<img src="" alt="" title="" width="" height="">
```

How to render an image tag with bLazy markup and `<noscript>` tag:

`<?php tofu_img_lazy($image_id, $image_size = 'img_style_name'); ?>`

HTML Output:
``` html
<img class="b-lazy" src="" alt="" title="" width="" height=""> 
<noscript><img class="b-lazy" src="" alt="" title="" width="" height=""></noscript>
```
