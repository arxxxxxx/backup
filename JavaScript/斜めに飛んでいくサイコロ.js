main = function(){
  $('#dice').css('top', '0px');
  $('#dice').css('left', '0px');

  // 0.1秒ごとにdiceGoAwayを実行
  setInterval(diceGoAway, 10);
};


diceGoAway = function(){
  // (取得)ダイスの位置を取得    
  var top  = getTop($('#dice'));
  var left = getLeft($('#dice'));

  // (処理)ダイスの位置に10を加える
  top  += 1;
  left += 1;

  // (反映)10を加えたダイスの位置を反映させる
  $('#dice').css('top',  ''+top+'px'); // 文字列同士の結合の場合は文字列であることを表すために先頭に+をつける
  $('#dice').css('left', ''+left+'px');
};


// topを数値で取得する
getTop = function(jQueryElement) {
  return Number($(jQueryElement).css('top').replace('px', ''));
};

// leftを数値で取得する
getLeft = function(jQueryElement) {
  return Number($(jQueryElement).css('left').replace('px', ''));
};


$().ready(main);