$().ready(function(){
  $('button').on('click', changeDice);
});

// ボタンを押した時の待機員
changeDice = function(){
    // 3つのサイコロの目を決定
    var diceNumber1 = rand(1,6);
    var diceNumber2 = rand(1,6);
    var diceNumber3 = rand(1,6);
    
    // 3つのサイコロの目からファイル名を作る
    var filename1 = 'dice' + diceNumber1 + '.png';
    var filename2 = 'dice' + diceNumber2 + '.png';
    var filename3 = 'dice' + diceNumber3 + '.png';
    
    // 3つのimgタグのsrcを変える
    $('#dice1').attr('src',filename1);
    $('#dice2').attr('src',filename2);
    $('#dice3').attr('src',filename3);
    
    // 合計値を計算
    var result = diceNumber1 + diceNumber2 + diceNumber3;
    
    // メッセージを合計値に変える
    $('#dice_message').html('合計値は'+result+'です');
    
    // 音声ファイルを再生する
    var aud = new Audio('diceroll.wav');
    aud.play();
};

// min〜maxの整数をランダムに返す
rand = function(min,max){
    return Math.floor(Math.random() * (max - min + 1)) + min;
};