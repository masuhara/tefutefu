<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TefuTefu連鎖</title>
<meta name="description" content="Tefu君の名言をMeCabによる形態素解析→マルコフ連鎖テスト">
<meta property="og:title" content="TefuTefu連鎖" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://vps1.liverty.biz/hbkr/tefu" />
<meta property="og:image" content="http://vps1.liverty.biz/hbkr/tefu/ogp.png" />
<meta property="og:site_name" content="TefuTefu連鎖" />
<meta property="og:locale" content="ja_JP" />
<meta property="og:description" content="Tefu君の名言をMeCabによる形態素解析→マルコフ連鎖テスト" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Tefu君の名言をMeCabによる形態素解析→マルコフ連鎖テスト" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<style type="text/css">
body { margin:10px; font-size:16px; background-color: #D8F3F0; }
#chat-frame {
  min-width: 320px;
  max-width: 800px;
  margin: auto;
  padding: 1em 0em;
}
.chat-talk {
  overflow: hidden;
  margin: 0 0 1em 0;
  padding: 0;
}
.chat-talk span {
  display: block;
  margin: 0;
  padding: 0;
}
.chat-talk .talk-icon {
  float: left;
  width: auto;
}
.chat-talk .talk-content {
  position: relative;
  box-sizing: border-box;
  width: auto;
  min-height: 50px;
  border-radius: 10px;
  background-color: #fff;
  margin: 0 auto 0 70px;
  padding: 1em;
}
.chat-talk .talk-icon img {
  max-width: 100%;
  height: auto;
  vertical-align: bottom;
  border: 2px solid #fff;
  border-radius: 50%;
}
.chat-talk .talk-content:before {
  position: absolute;
  top: 15px;
  left: -20px;
  display: block;
  width: 0;
  height: 0;
  content: '';
  border: 10px solid transparent;
  border-right-color: #FFFFFF;
}
.chat-talk.mytalk .talk-icon {
  float: right;
}
.chat-talk.mytalk .talk-content {
  margin: 0 70px 0 auto;
  color: #000;
  background: #78FF6C;
}
.chat-talk.mytalk .talk-content:before {
  right: -20px;
  left: auto;
  border-color: transparent;
  border-left-color: #78FF6C;
}
</style>
</head>

<body>
<h1>TefuTefu連鎖</h1>
<?php
require_once('markov.php');
require('mecabp.php');

$string='
MOSA副会長さんから連絡が来た。どうやらセッションに参加してもらいたいそうな。もちろん、行くと返信しておいた。
帰宅った！某有名企業からメールきてる。「この件については、内密に」だって。
芸能人とか3人しか知り合いいないよ。芸人1名、モデル1名、タレント1名。もうちょっと飯食いながら語れる有名人とかいたらうれしいよねw。実業家の方々なら結構いるんだけれども。こうやって有名人云々言ってる時点でまだまだ子供だなぁと反省。
Appleの知り合いは2人、MSの知り合いは1人、ライブドアの知り合いは元社長含めて3人、楽天の知り合いは2人、そしてGoogleの知り合いは7人w Google先生流石です。
IT企業社長・IT企業副社長・東大教授・東大生と灘高2人でケータリング頂きながら喋ってる。
赤坂のテレビ局の制作担当者さまへ。はやめにデータ送った方がいいのは分かってるのですが眠いので一眠りします！すいません！
2年前ぐらいに東京駅歩いてたらTwitterで「Tehuいた(笑)」と書かれた。あの時始めて自分の名前の広がりを感じた。昨日のテレビ出演は結構評判が良い。某知人女性からは「これで女性ファン増えるね」と言われたが、どうやら同じアイドル好きの同志ばかりが増えたようだ。
（考えてみると、健康計算機なんていう(笑)なアプリを作ったとき、まさか自分が3年半後にアイドルグループのプロデューサになって東京ドーム本気で目指してるなんて絶対思わないわなぁ。proactiveすぎたか笑）
情報を整理しておきますが、①Tehuは縁があって先月からある地方の若い女性アイドルグループのプロデューサを務めています。　②彼女たちのラジオの冠番組のプロデューサも務めています。　③夢を聞いたら東京ドームと言われて腰抜けましたが、言ったからには行ってもらうしかないでしょってことです。
（なんか、灘高保護者ネットワークではすでにアイドルグループの名前とかじゃんじゃん流れてるらしい。同級生10人程度しか知らないはずなのに。。。こわいこわい。）
FBフレンドの方（某企業CEO）が、僕の憧れの人たちと会食した写真アップされてて、近いけど手が届かないこの感じを楽しみながら人生を生きています。
明日、放課後某企業の会長と会食のようです... つい先日決まったことでまだ心の整理はついていないが... あなおそろし。
高校生クイズ、出場側は灘は知り合いだし司会進行のアナウンサーも知り合いの方みたい。
いやぁアイドルフェスすごすぎた！2Fの関係者席がアイドルの控え室兼用で、いろんな娘と話した。みんななだクロ知ってくれてたし、僕をフォローしてくれてるなんて方もいたよ。なんか、今電車で渋谷に向かってるんだけど、ニヤニヤが止まらないよw つぎはあの人とお茶！
今日は、昼過ぎから、最近面白いなーと思っているある人(同い年)を連れまわす。まずは、キングコング西野さんが誘ってくださった舞台「ドーナツ博士とGO!GO!ピクニック」@新宿。そのあといろいろあってから、某ゴルフ好きの元自由報道協会会長と夕食。建設的な話、したいな！
誰とは言わないが、政治家の先生と1対1で会食していました。いろいろざっくばらんに話しました。僕らがもっと噛みつけられるような社会になればいいな。さて、デザートを食して、次へ！次は、ゴルフ好きで最近ジャーナリストに復帰てTwitterを休止したあの人ですw
知り合い、18人見つけた。みんなおつかれさま！
某女子アナが破壊的なスタンプばかり送ってくる。
ってか今週末のミーティング×5は、日本人なら知らない人はいない人だったり、知らない人はいない会社の社長だったり、業界トップの人だったり、、全員各界の大物だ。。。普段緊張しないけどさすがに。。。ｸﾞﾌｩ
なぜかYahooのM社長たちと食事してる。
言い方悪いけど、やる気のない人とわざわざ話したり付き合ったりしていられるほど人生時間残ってないからなぁ。よろしくねとか今度遊ぼうとか言われてもな〜。
だって、くだらないんだもん。ファッション感覚で起業しているのが丸見えな人たちが、慶応受かった直後からアプローチの嵐だぜ。何が世界変えようだよ、ウェブサイト見たら事業計画ガタガタじゃねーか。結局先輩後輩関係で俺の人脈と経験使いたいだけだろ。。。
某編集長様と某ディレクター様に呼び出されて、この時間からシモキーへ... 雨の中タクシーを見つけるのに10分かかって、ずぶ濡れ。
ほほう、リクルート内定者の女子大生（何人かは知り合い）たちが作ったMINMOOという動画共有アプリが面白そう。
昨日の夜は、KBC武内アナウンサー・渡辺ディレクターと初めてのお食事。1軒目・警固にある「焼とりの八兵衛」は、これまでに食べた何処の焼き鳥・焼きトンよりも美味かった...大将もめっちゃかっこよかった...。
今朝はセルリアンタワーで、VOYAGE GROUPの宇佐美社長・渡辺氏と朝食会。楽しい話聞けた。今晩は小売業界のレジェンドと会食らしいし楽しみ。いい日だ！
今晩は灘→東大の非常に優秀な同級生たちが、僕に中国語を勉強しにくるらしい。東大が慶應にひれ伏す瞬間、ツイキャスしたいぐらいだ。
アメリカ大使館の知り合いが、「車列長いです〜。まちでみかけたらよろしくおねしゃーす」とかFBに書いててワロタ。
知人がFacebookの副社長に就任したのがFacebookで流れてきた。
僕は、「素敵な生き方してるなぁ」と第一印象で思った人と優先的に友達になる。素敵かどうかは絶対的な一次元の評価軸では到底判断できないもので、自己との比較の中で相対的多元空間(?)のなかに人をマッピングして行く感じ。素敵な生き方してる人たちは大好き。そういう女性を好きになる傾向もある。
大学生大学生しててチャラい感じの男大っ嫌いだわもう。話しかけんなクソが。
数年会わないうちに知り合いが某省の事務次官になってたことが判明、、、これで事務次官は3人目か、、、。偉いさん経験者の知り合いが増えることはいいことだ。
はい、ミヤネ屋制作してる大阪のNNN系列読売テレビのプロデューサー何人か知り合いいますが敢えて言ってます笑
ビジュアルのいい女の子がくだらない男達から嫌がらせを受ける構図この1週間で5回ぐらいみてるし3人ぐらい相談受けてる。そういうのを気軽に相談できるようなイメージの男子でいたい。
まあ身の回りでも、凄く普通っぽくて僕も馴れ馴れしくさせていただいている方が資産100億OVERだったり、すっげー金持ってそうな恰幅の人がマンションを30年ローンで買ってたりしてるので、世の中分からないです。
ミスiDのセミファイナリストに知り合い4人も居て笑うことしかできない。
Evernote日本法人会長とSFCの教授に虐められています。
なんかここ1週間ほど、毎日のようにいろんな人たちとご飯させていただいているのだが、クリエイターだったりプランナーだったり経営者だったり編集者だったり投資家だったりコンサルだったりして、みんな言っていること違うし、僕の進路に関する助言も違うし、すごく面白い、。。。
最近、ミュージシャンとか作曲家とかアートディレクターとか、たくさんの方とご一緒する中で、まじ自分の無才さに驚いている。。。
昨日慶應女子高で僕が身長150cm台の女子学生に袖を引っ張られながら連行される姿を複数のフォロワーが目撃していたようですが、我ながら恥ずかしい姿だったと自覚してます。
経済犯罪に関する授業。「村上ファンドの実質的経営者であったXは、ライブドア代表取締役Aらにニッポン放送の株式を買い集めて経営権を取得することを働きかけ、その後Aらが同社株式の...」当時はニュースでしかない話だったけど、いまいろいろと近い世界になったなぁ。
当時小学生だったけど、Xさんは中高の先輩だし、Aさんにはお世話になっているし、ニッポン放送はいろいろとやらせてもらってるし...。
アイドルさんとお仕事とかすると、フォローしてくれるアイドルさんが結構いらっしゃるんだけど、たまにリムられるんだよね。そもそもオフィシャルアカウントで、1回絡んだぐらいの人をフォローする必要はないとおもうのでいいんですけど、じゃあ最初からフォローすんなしwっていうのはある。笑
大企業のエグゼクティブたちとの懇親会。。。非常に面白かったです。いやー言いたいことが伝わったみたいで良かった‼︎
最近渋谷や恵比寿で歩いていたりご飯を食べているときに声をかけられる率が高すぎるから、山手線の西半分にはいかないようにしよう（違）
日本橋なう。今日は外資系某G社の方々と会食。。。わくわく。
友達がFacebookにチャラそうな集団写真を上げてるのを見るだけで嫌悪感で画面閉じる程度にはそういうの嫌い。
これで事務次官は3人目か、、、。偉いさん経験者の知り合いが増えることはいいことだ。
「はじめて彼氏できたー！」とか言ってる人みんなに聞きたくて仕方ないことは「で？ヤったの？」
同世代の男たちの精神年齢の低さに辟易としています。
女子の方がお互い話が合う事が多いし心が通じ合いやすいなあと感じるTehuですが女の恋心だけはわからんわ。怖いなぁ。
芸能人とか3人しか知り合いいないよ。芸人1名、モデル1名、タレント1名。 もうちょっと飯食いながら語れる有名人とかいたらうれしいよねw実業家の方々なら結構いるんだけれども。こうやって有名人云々言ってる時点でまだまだ子供だなぁと反省。
ビジュアルのいい女の子がくだらない男達から嫌がらせを受ける構図。この1週間で5回ぐらいみてるし3人ぐらい相談受けてる。そういうのを気軽に相談できるようなイメージの男子でいたい。
'.PHP_EOL;

$summarizer = new Markov;
$words = array();

$stary = explode("\n", $string);
$stary = array_map('trim', $stary);
$stary = array_filter($stary, 'strlen');
shuffle($stary);
$string = implode("", $stary);

$mecab = new Mecabp;

$ary = $mecab->parse($string);

for ($i = 0; $i < count($ary); $i++) {
    $str = $ary[$i]["word"];
    array_push($words, $str);
}
array_push($words, "EOS");
?>

<div id="chat-frame">
<p class="chat-talk">
    <span class="talk-icon">
        <img src="tefuimg.jpg" alt="tartgeticon" width="50" height="50"/>
    </span>
    <span class="talk-content">

<?php echo $summarizer->summarize($words, 3); ?>

    </span></div>

<div style="margin-top:20px">※ <a href=".">リロード</a>する度に文章は変わります</div>
<hr />
<a href="https://github.com/hbkr/tefutefu">github</a> / <a href="http://twitter.com/hbkr">twitter</a>
</body>
</html>
