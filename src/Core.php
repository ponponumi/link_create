<?php

namespace Ponponumi\LinkCreate;

use Ponponumi\EmailSearch\EmailSearch;
use Ponponumi\UrlSearch\UrlSearch;

class Core{
  public static function esc(string $text){
    // 特殊文字、スペース、改行を置き換える
    $text = htmlspecialchars($text,ENT_QUOTES,"UTF-8");
    $text = str_replace([" ","\n"],["&nbsp;","<br>"],$text);
    return $text;
  }

  public static function get(string $text,array $type=["email","url"]){
    // データを取得する
    $email_list = [];
    $url_list = [];

    if(in_array("email",$type)){
      // メールアドレスを取得するなら
      $email_list = EmailSearch::searchPos($text);
    }

    if(in_array("url",$type)){
      // URLを取得するなら
      $url_list = UrlSearch::searchPos($text);
    }

    $merge_list = array_merge($email_list,$url_list);

    if($merge_list != []){
      usort($merge_list, function($a,$b){
        return $a["pos"] <=> $b["pos"];
      });
    }

    return $merge_list;
  }

  public static function arrangement(string $text,array $type=["email","url"]){
    // データを整理する
    $result = [];

    $list = self::get($text,$type);

    if($list !== []){
      // リンクがあれば
    }else{
      // リンクがなければ
      $result[] = [
        "text" => $text,
        "link" => null,
      ];
    }

    return $result;
  }
}
