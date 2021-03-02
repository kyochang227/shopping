'use strict';

//ハンバーガーメニュー
// $('.open').on('click',function(){ //.nurger-btnをクリックすると
//     $('.open').toggleClass('close');//.closeclassを追加/削除
//     $('.overlay').toggleClass('slide-in');//.nav-wrapperがフェードイン、フェードアウト
//     $('body').toggleClass('noscroll');
// });

    const open = document.getElementById('open');
    const overlay = document.querySelector('.overlay');
    const close = document.getElementById('close');

    open.addEventListener('click',() => {
        overlay.classList.add('show');    
        open.classList.add('hide');    
    });
 
    close.addEventListener('click',() => {
        overlay.classList.remove('show');    
        open.classList.remove('hide');    
    });

