window.onload=function(){
         var obtn=document.getElementById('btn');
            var timer =null;
            var isTop=true;
            //滚动条滚动时触发
            window.onscroll = function(){
               if (!isTop) {
                  clearInterval(timer);
                  
               }
               isTop=false;
               
            } 
  
         obtn.onclick=function(){
            //设置定时器
            timer =setInterval(function(){
               //获取滚动条距离顶部的高度
               var osTop=document.documentElement.scrollTop ||document.body.scrollTop;
               var ispeed = Math.floor(-osTop/10);
               document.documentElement.scrollTop=document.body.scrollTop=osTop+ispeed;

               isTop = true;
               
               if (osTop == 0) {
                  clearInterval(timer);
               }

            },30);
            
            

         }
      }