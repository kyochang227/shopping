'use strict';

//ハンバーガーメニュー
$('.burger-btn').on('click',function(){ //.nurger-btnをクリックすると
    $('.burger-btn').toggleClass('close');//.closeclassを追加/削除
    $('.nav-wrapper').toggleClass('slide-in');//.nav-wrapperがフェードイン、フェードアウト
    $('body').toggleClass('noscroll');
});