<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Exercise Practice 2</title>
  </head>
  <body>
    <h3>PHP Exercise 2</h3>
    <p>$var = 'PHP Tutorial'. Put this variable into the title section, h3 tag and as an anchor text within an HTML document.</p>
    <p>Output:<br>
    PHP Tutorial<br>
    PHP, an acronym for Hypertext Preprocessor, is a widely-used open source general-purpose scripting language.  It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.<br>
    Go to the PHP Tutorial.</p>

    <?php
      $firstWord = "PHP";
      $var = $firstWord . " Tutorial";

      echo "<h3>". $var ."</h3>\n".
          "$var\n".
          "$firstWord, an acronym for Hypertext Preprocessor, is a widely-used open source general-purpose scripting language.  It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.<br>
          Go to the $var."
     ?>
  </body>
</html>
