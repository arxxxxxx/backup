main = function(){
  // 5秒後にdiceMove関数を実行    
  setTimeout(diceMove,5000);
};

diceMove = function(){
    $('#dice').css('top','100px');
    $('#dice').css('left','100px');
}

$().ready(main);
