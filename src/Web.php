<?php

namespace Ponponumi\LinkCreate;

class Web{
  public static function esc(string $text){
    // 特殊文字、スペース、改行を置き換える
    $text = htmlspecialchars($text,ENT_QUOTES,"UTF-8");
    $text = str_replace([" ","\n"],["&nbsp;","<br>"],$text);
    return $text;
  }
}
