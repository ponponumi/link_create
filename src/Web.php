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

  private static function optionGet(string $key,array $option,$default=false){
    // オプションを取得
    $result = $default;

    if(array_key_exists($key,$option)){
      $result = $option[$key];
    }

    return $result;
  }

  public static function create(string $text,array $option=[]){
    // aタグを作る
    $get = [];

    $hashtag_not = self::optionGet("hashtagNotGet",$option);
    $hashtag_url = "";

    if(!$hashtag_not){
      // ハッシュタグを取得するなら
      $hashtag_url = self::optionGet("hashtagUrl",$option,"");

      if($hashtag_url !== ""){
        // URLがあれば
        $get[] = "hashtag";
      }
    }

    $email_not = self::optionGet("emailNotGet",$option);

    if(!$email_not){
      // メールアドレスを取得するなら
      $get[] = "email";
    }

    $url_not = self::optionGet("urlNotGet",$option);

    if(!$url_not){
      // URLを取得するなら
      $get[] = "url";
    }

    // ハッシュの記号を消すかどうか
    $hash_delete = self::optionGet("hashDelete",$option,true);

    $list = Core::arrangement($text,$get);

    $html = "";

    if($list !== []){
      foreach ($list as $item) {
        if($item["link"] !== null){
          // リンクがあれば
          if(UrlSearch::check($item["link"])){
            // URLなら
            $html .= '<a href="' . self::esc($item["link"]) . '">' . self::esc($item["text"]) . '</a>';
          }elseif(EmailSearch::check($item["link"])){
            $html .= '<a href="mailto:' . self::esc($item["link"]) . '">' . self::esc($item["text"]) . '</a>';
          }
        }else{
          // リンクがなければ
          $html .= self::esc($item["text"]);
        }
      }
    }

    return $html;
  }
}
