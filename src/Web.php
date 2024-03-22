<?php

namespace Ponponumi\LinkCreate;

use Ponponumi\UrlSearch\UrlSearch;
use Ponponumi\EmailSearch\EmailSearch;

class Web{
  public static function esc(string $text){
    // 特殊文字、スペース、改行を置き換える
    $text = htmlspecialchars($text,ENT_QUOTES,"UTF-8");
    $text = str_replace([" ","\n"],["&nbsp;","<br>"],$text);
    return $text;
  }

  public static function create(string $text,array $get=["email","url"]){
    // aタグを作る
    $list = Core::arrangement($text,$get);

    $html = "";

    if($list !== []){
      foreach ($list as $item) {
        if($item["link"] !== null){
          // リンクがあれば
          if(UrlSearch::check($item["link"])){
            // URLなら
            $html .= '<a href="' . self:::esc($item["link"]) . '">' . self:::esc($item["text"]) . '</a>';
          }elseif(EmailSearch::check($item["link"])){
            $html .= '<a href="mailto:' . self:::esc($item["link"]) . '">' . self:::esc($item["text"]) . '</a>';
          }
        }else{
          // リンクがなければ
          $html .= self:::esc($item["text"]);
        }
      }
    }
  }
}
