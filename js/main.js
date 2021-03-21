'use strict';

//ハンバーガーメニュー
    const open = document.getElementById('open'); //開くボタン
    const overlay = document.querySelector('.overlay');　//ハンバーガーメニュー
    const close = document.getElementById('close'); //閉じるボタン

    open.addEventListener('click',() => {
        overlay.classList.add('show'); //ハンバーガーメニュー表示  
        open.classList.add('hide');     //開くボタンを非表示
    });
 
    close.addEventListener('click',() => {
        overlay.classList.remove('show'); //ハンバーガーメニュー非表示     
        open.classList.remove('hide');     //開くボタンを表示    
    });
//ハンバーガーメニューここまで


// スライドショー
    let slide; //#slide
    let image;  //li...画像
    let TimeID; //setTimeout(slider,stop_time)
    let timeID; //setTimeout(disp,stop_time)
    let cnt=0;
    let cnt2=1;
    let posi1;
    let posi2;
    let flag=true;
    let max_width;
    let max_height;
    let controll;
    let btn;
    let stop_time=2000;
    let idou_time=10;
    let idou__kyori=5;
    let keika_time;


    function disp(){
        cnt2=cnt+1;

        if(cnt2===image.length){ //写真を枚数分回したら
            cnt2=0; //最初に戻す
        }

        image[cnt2].style.display="list-item";
        posi1=0;
        posi2=max_width;
        slider();
        timeID=setTimeout(disp,keika_time+stop_time); //stop_time=2000
    }


    function slider(){
        TimeID=setTimeout(slider,idou_time); //idou_time=10
        posi1-=idou__kyori; //idou__kyori=5 5pxずつ減少
        posi2-=idou__kyori; //idou__kyori=5 5pxずつ減少
        image[cnt].style.left=posi1+"px"; //[cnt]は1枚目の写真
        image[cnt2].style.left=posi2+"px"; //[1]は2枚目以降の写真

        if(posi2<=5){

            image[cnt2].style.left="0px";
            btn[cnt].style.opacity="1.0";
            btn[cnt2].style.opacity="0.5";
            image[cnt].style.display="none";
            cnt++;
            //写真の枚数と一致したら
            if(cnt===image.length){
                cnt=0; //0に戻す
            }
            //slider関数を解除
            clearTimeout(TimeID);
        }
    }

    window.onload=function(){

        //スライド画像の下に<ul><li>タグでスライドコントロールボタンを生成
        let con="<ul id='controll'>";

        max_width=0;
        max_height=0;

        slide=document.getElementById("slide");
        image=slide.getElementsByTagName("li");

        for(let i=0;i<image.length;i++){
            let width=image[i].getElementsByTagName("img")[0].naturalWidth;
            let height=image[i].getElementsByTagName("img")[0].naturalHeight;
            
            if(max_width<width){
                max_width=width;

            }

            if(max_height<height){
                max_height=height;
            }

            con+="<li onclick='idou("+i+")'>●</li>";
        }

        con+="</ul>";

        slide.insertAdjacentHTML ("afterend",con);
        controll=document.getElementById("controll"); //生成した#controllを取得
        btn=controll.getElementsByTagName("li"); //生成したliを取得
        controll.style.width=max_width+"px";
        slide.style.width=max_width+"px";
        slide.style.height=max_height+"px";
        image[1].style.left=max_width+"px";
        let clientRect=slide.getBoundingClientRect() ;
        let slide_x=window.pageXOffset+clientRect.left ;
        let slide_y=window.pageYOffset+clientRect.top ;
        keika_time=(Math.floor(max_width/idou__kyori))*(idou_time+5);
        timeID=setTimeout(disp,stop_time); //stop_time=2000
    }

    //コントロールボタンを押した際に任意のスライド画像に移動する処理
    function idou(x){
        //上記の関数を止める
        clearTimeout(TimeID);
        clearTimeout(timeID);

        if(x<0){
            x=image.length-1;
        }

        if(x>=image.length){
            x=0;
        }

        //image[x]はクリックしたコントロールボタンの画像
        image[x].style.left="0px";
        image[cnt].style.display="none";
        image[cnt2].style.display="none";
        image[x].style.display="list-item";
        btn[cnt].style.opacity="1";
        btn[x].style.opacity="0.5";

        let y=x+1;

        if(y==image.length){
            y=0;
        }

        image[y].style.left=max_width+"px";
        image[y].style.display="list-item";
        cnt=x;
        timeID=setTimeout(disp,stop_time); //stop_time=2000

    }   
    //スライドショーここまで 