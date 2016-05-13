<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <base href="<?php echo site_url();?>">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        ul{
            list-style: none;
        }
        body{
            background: #ccc;
        }
        #waterfall{
            width: 1120px;
            margin: 0 auto;
        }
        #waterfall .col{
            width: 350px;
            float: left;
            margin-right: 20px;
        }
        #waterfall .col li{
            background: #fff;
            border: 1px solid #E7E7E7;
            padding: 10px;
            margin-bottom: 20px;
        }
        #waterfall .col img{
            width: 316px;
        }
    </style>
</head>
<body>
    <div id="waterfall">
        <ul class="col">
        </ul>
        <ul class="col">
        </ul>
        <ul class="col">
        </ul>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>

        $(function(){
            var $uls = $('#waterfall ul');
            var bStop = false;//标识位，用来标识当前数据是否加载完毕
            var bEnd = false;//标识位，用来标识数据库中的数据是否全部加载完毕
            var iPage = 1;
            var $minUl2 = null;
            function loadData(){
                    //url, data, callback, type
                    $.get('welcome/get_blogs', {page: iPage++}, function(res){
                        bEnd = res.isEnd;
                        setTimeout(function(){
                            for(var i=0; i<res.data.length; i++){
                                var blog = res.data[i];
                                var html = '<li>'
                                    + '<img src="images/blog-post'+(i+1)+'.jpg" alt="">'
                                    + '<h3>'+blog.title+'</h3>'
                                    +  '<p>'+blog.content+'</p>'
                                    + '</li>';
                                var $minUl = getMinUl();
                                $minUl.append(html);
                            }
                            $minUl2 = getMinUl();
                            bStop = true;
                        }, 2000);
                    }, 'json');
            }

            loadData();

            function getMinUl(){
                var $minUl = $uls.eq(0);
                for(var i=1; i<$uls.length; i++){
                    if(  $uls.eq(i).height() < $minUl.height()  ){
                        $minUl = $uls.eq(i);
                    }
                }
                return $minUl;
            }


            $(window).on('scroll', function(){

                var iScollTop = $(window).scrollTop(),
                    iWinHeight = $(window).height();

                if(iScollTop+iWinHeight+20>=$minUl2.height() && bStop && !bEnd){
                    loadData();
                    bStop = false;
                }
            });

        });


















    </script>
</body>
</html>