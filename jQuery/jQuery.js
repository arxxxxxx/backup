$(function(){
    //h1のカラーを赤に変更
    $("h1").css("color","red");
    
    //pをフェードアウト
    $("p").fadeOut();
    
    //h2のテキストを変更
    $("h2").text("おやすみ");
    
    //IDaa,bbのカラーを赤に変更
    $("#aa,#bb").css("color","red");
    
    //aaクラスのbbクラスのみがフェードアウト
    $(".aa .bb").fadeOut();
});