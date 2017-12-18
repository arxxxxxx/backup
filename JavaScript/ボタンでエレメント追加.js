main = function(){
    // ボタンを押したら、サイコロ追加
    $('#btn').on('click',appendDice1);
};

// サイコロ追加関数
appendDice1 = function(){
    
    // サイコロの目をランダムに指定
    var diceNumber1 = rand(1,6);
    
    // 指定された目のファイル名を作る
    var filename1 = 'dice' + diceNumber1 + '.png';
    
    // 音声ファイルを再生する
    var aud = new Audio('diceroll.wav');
    aud.play();
    
    // サイコロのimgを作成
    var dice = $('<img>').attr('src',filename1);
    
    // dice_spaceに追加
    $('#dice_space').append(dice);
    
    // id:totalから値を取得し新たに出た数値を加える
    var result = Number($('#total').html());
    result += diceNumber1;

    // id:totalにresultを表示
    $('#total').html(result);
};

// min〜maxの整数をランダムに返す
rand = function(min,max){
    return Math.floor(Math.random() * (max - min + 1)) + min;
};



$().ready(main);