<?php
/*!
 * Media Query Test Page
 *
 * Author: Attila Kerekes (@keriati)
 */

    define("WIDTH_FROM", 240);
    define("WIDTH_TO", 1440);
    define("WIDTH_STEP", 20);

    function widthLoop($sting) {
        $width = WIDTH_FROM;

        $ret = "";
        do {
            $ret .= str_replace("@@WIDTH@@",$width,$sting);
            $width += WIDTH_STEP;
        } while ($width <= WIDTH_TO);

        return $ret;
    }


?><!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Media Query Test Page</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <style type="text/css">

        <?php

            $ret = <<<HTML

            @media all and (min-width: @@WIDTH@@px) {
                .media-min-@@WIDTH@@:after {
                    content: "@media all and (min-width: @@WIDTH@@) Visible!"
                }
            }

            @media all and (max-width: @@WIDTH@@px) {
                .media-max-@@WIDTH@@:after {
                    content: "@media all and (max-width: @@WIDTH@@) Visible!"
                }
            }

HTML;
            echo widthLoop($ret);
        ?>

    </style>

</head>
<body>
<h1>Media Query Test Page</h1>

<p>
    Visit this page from any mobile device... <br />
    Check <a href="https://github.com/keriati/media-query-test">https://github.com/keriati/media-query-test</a>
</p>

<h2>Min Widths</h2>

<?php
    $ret = <<<HTML
<div class="media-min-@@WIDTH@@"></div>

HTML;

    echo widthLoop($ret);
?>

<h2>Max Widths</h2>

<?php

    $ret = <<<HTML
<div class="media-max-@@WIDTH@@"></div>

HTML;

    echo widthLoop($ret);
?>

<p>Author: Attila Kerekes (@keriati)</p>

</body>
</html>