<?php
    include "plugins.php";
    if(@p('run'))
    {
        $m=p('month');
        $d=p('day');
        $date=$m.$d;
        $put="";
        $put1="";
        $put2="";
        $put3="";
        $put4="";
        $put5="";
        $put6="";
        $time=0;
        $time1=0;
        for($i=1;$i<=11;$i++)
        {
            switch($i)
            {
                case 1:
                    $put="TSA";
                    $put2="A";
                break;
                case 2:
                    $put="RMQ";
                    $put2="B";
                break;
                case 3:
                    $put="CYI";
                    $put2="C";
                break;
                case 4:
                    $put="TNN";
                    $put2="D";
                break;
                case 5:
                    $put="KHH";
                    $put2="E";
                break;
                case 6:
                    $put="HUN";
                    $put2="F";
                break;
                case 7:
                    $put="TTT";
                    $put2="G";
                break;
                case 8:
                    $put="KNH";
                    $put2="H";
                break;
                case 9:
                    $put="MZG";
                    $put2="I";
                break;
                case 10:
                    $put="LZN";
                    $put2="J";
                break;
                case 11:
                    $put="MFK";
                    $put2="K";
                break;      
            }
            for($j=1;$j<=11;$j++)
            {
                switch($j)
                {
                    case 1:
                        $put1="TSA";
                        $put3="1-";
                    break;
                    case 2:
                        $put1="RMQ";
                        $put3="2-";
                    break;
                    case 3:
                        $put1="CYI";
                        $put3="3-";
                    break;
                    case 4:
                        $put1="TNN";
                        $put3="4-";
                    break;
                    case 5:
                        $put1="KHH";
                        $put3="5-";
                    break;
                    case 6:
                        $put1="HUN";
                        $put3="6-";
                    break;
                    case 7:
                        $put1="TTT";
                        $put3="7-";
                    break;
                    case 8:
                        $put1="KNH";
                        $put3="8-";
                    break;
                    case 9:
                        $put1="MZG";
                        $put3="9-";
                    break;
                    case 10:
                        $put1="LZN";
                        $put3="10-";
                    break;
                    case 11:
                        $put1="MFK";
                        $put3="11-";
                    break; 
                } 
                for($k=1;$k<=16;$k++)
                {
                    switch($k)
                    {
                        case 1:
                            $put4="8751";
                        break;
                        case 2:
                            $put4="4551";
                        break;
                        case 3:
                            $put4="2370";
                        break;
                        case 4:
                            $put4="2917";
                        break;
                        case 5:
                            $put4="3934";
                        break;
                        case 6:
                            $put4="7389";
                        break;
                        case 7:
                            $put4="9825";
                        break;
                        case 8:
                            $put4="8448";
                        break;
                        case 9:
                            $put4="6638";
                        break;
                        case 10:
                            $put4="1955";
                        break;
                        case 11:
                            $put4="5468";
                        break; 
                        case 12:
                            $put4="2166";
                        break;
                        case 13:
                            $put4="6456";
                        break;
                        case 14:
                            $put4="3439";
                        break;
                        case 15:
                            $put4="7527";
                        break;
                        case 16:
                            $put4="0895";
                        break; 
                    }   
                    if($i!=$j)
                    {
                        $t=rand(7,9);
                        $time=5+$k;
                        $time1=6+$k;
                        $put5=(String)$time.":00";
                        $put6=(String)$time1.":00";
                        $fid=$put2.$put3.$put4;
                        $mid="AT".$t;
                        squery(['run',"INSERT INTO `flight`
                            (`fdate`,`fid`,`mid`,`ftime`,`dtime`)
                            VALUES ('$date','$fid','$mid','$put5','$put6')"]);
                        /*squery(['run',"INSERT INTO `route`
                            (`fid`,`sair`,`dair`,`rtime`)
                            VALUES('$fid','$put','$put1','60')"]);*/
                    }
                 }
            }
        }
        ref([0,"/airport/data.php"]);
    }
    else
    {
        title2("data");
        echo'
            <div class="message">
            <div class="not"></div>
            <div class="box1">
                <div class="box2">
                    <div class="text">
                        <span>更新資料</span>
                    </div>
                </div>
                <div class="box3">
                    <form action="" method="POST">
                        <div class="box4">
                            <div class="text">
                                <span>月份:</span>
                            </div>
                            <div class="input">
                                <input type="text" name="month">
                            </div>
                        </div>
                        <div class="box4">
                            <div class="text">
                                <span>日:</span>
                            </div>
                            <div class="input">
                                <input type="text" name="day">
                            </div>
                        </div>
                        <div class="box4">
                            <div class="button">
                                <input type="submit" name="run" value="確定">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    </body>
    </html>
        ';
    }
?>