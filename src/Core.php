<?php

namespace Ponponumi\LinkCreate;

use Ponponumi\EmailSearch\EmailSearch;
use Ponponumi\UrlSearch\UrlSearch;

class Core{
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
      $end = 0;

      foreach ($list as $item) {
        $pos = $item["pos"];
        $len = mb_strlen($item["value"]);

        if($end <= $pos){
          // 二重取得になっていなければ
          if($end !== $pos){
            // 途中にテキストがあれば
            $result[] = [
              "text" => mb_substr($text,$end,$pos - $end),
              "link" => null,
            ];
          }

          $result[] = [
            "text" => $item["value"],
            "link" => $item["value"],
          ];

          $end = $pos + $len;
        }

      }

      $text_len = mb_strlen($text);

      if($text_len > $end){
        $result[] = [
          "text" => mb_substr($text,$end),
          "link" => null,
        ];
      }
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
