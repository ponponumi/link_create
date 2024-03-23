<?php

namespace Ponponumi\LinkCreate;

use Ponponumi\UrlSearch\UrlSearch;
use Ponponumi\EmailSearch\EmailSearch;
use Ponponumi\UrlTool\Domain;

class Web{
  public static function esc(string $text){
    // 特殊文字、スペース、改行を置き換える
    $text = htmlspecialchars($text,ENT_QUOTES,"UTF-8");
    $text = str_replace([" ","\n"],["&nbsp;","<br>"],$text);
    return $text;
  }

  public static function hashtagUrlCreate(string $hashtag,string $url,$hash_delete,$hash_encode){
    // ハッシュタグのURLを置き換える
    if($hash_delete){
      // ハッシュタグの#を削除するなら
      $hashtag = str_replace("#","",$hashtag);
    }

    if($hash_encode){
      // URLエンコードするなら
      $hashtag = urlencode($hashtag);
    }

    return str_replace("{hashtag}",$hashtag,$url);
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

    // URLのblankモードを設定
    // 0は常に無効(非推奨)
    // 1は外部リンクの場合のみ有効
    // 2は常に有効
    $url_blank_mode = self::optionGet("blankMode",$option,1);

    // ハッシュの記号を消すかどうか
    $hash_delete = self::optionGet("hashDelete",$option,true);

    // ハッシュタグをURLエンコードするかどうか
    $hash_encode = self::optionGet("hashEncode",$option,true);

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
          }elseif(mb_strpos($item["link"],"#") === 0){
            // ハッシュタグなら
            $item["link"] = self::hashtagUrlCreate($item["link"],$hashtag_url,$hash_delete,$hash_encode);
            $html .= '<a href="' . self::esc($item["link"]) . '">' . self::esc($item["text"]) . '</a>';
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
