<?php
include "plugins.php";
$p=0;
if(@s('index'))
{
    switch(@g('p'))
    {
        case 'time':
            if(@p('yes'))
            {
                $s=p('start');
                $d=p('down');
                $s1=substr($s,0,-5);
                $d1=substr($d,0,-5);
                $s2=substr($s,-4,-1);
                $d2=substr($d,-4,-1);
                title2("time");
                echo '
                    <div class="message">
                    <div class="not"></div>
                    <div class="box1">
                        <div class="box2">
                            <div class="text">
                                <span>班機時刻表</span>
                            </div>
                        </div>';
                $month=date("M");
                $day=date("j");
                $week=date("w");
                $weekarray=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                $date=$month.$day;
                echo'
                        <div class="box3">
                            <div class="box4">
                                <div class="box5">
                                    <div class="cspace">
                                        <span>'.$s1.'</span>
                                    </div>
                                    <div class="espace">
                                        <span>'.$s2.'</span>
                                    </div>
                                </div>
                                <div class="box5">
                                </div>
                                <div class="box5">
                                    <div class="cspace">
                                        <span>'.$d1.'</span>
                                    </div>
                                    <div class="espace">
                                        <span>'.$d2.'</span>
                                    </div>
                                </div>';
                $day--;
                if($week==0)
                {
                    $week=5;
                }
                else
                {
                    $week--;
                }
                for($i=0;$i<7;$i++)
                {
                    $day++;
                    if($week>6)
                    {
                        $week-=7;
                    }
                    echo'
                    <div class="box5">
                        <div class="month">
                            <span>'.$month.'</span>
                        </div>
                        <div class="day">
                            <span>'.$day.'</span>
                        </div>
                        <div class="week">
                             <span>'.$weekarray[$week].'</span>
                        </div>
                    </div>';  
                    $week++;
                }
                echo'</div>';
                $b="SELECT * FROM `flight`,`route`
                WHERE `flight`.`fid`=`route`.`fid` 
                AND `flight`.`fdate`="."'".$date."'
                AND `route`.`sair`= '".$s2."'
                AND `route`.`dair`='".$d2."'";
                $a = squery(['list',$b]);
                for($i=1;$i<count($a);$i++)
                {
                    echo'
                    <div class="box6">
                        <div class="box7">
                           <div class="text1">
                                <span>'.$a[$i][2].'</span>
                           </div>
                           <div class="text2">
                                <span>機型:'.$a[$i][3].'</span>
                           </div>
                        </div>
                        <div class="box7">
                            <div class="time">';
                    echo'<span>'.$a[$i][4].'</span>';
                    echo'            </div>
                                </div>
                                <div class="box7">
                                    <div class="time">';
                    echo'<span>'.$a[$i][5].'</span>';
                    echo'                </div>
                                </div>';
                    for($j=0;$j<7;$j++)
                    {
                        echo'
                                <div class="box7">
                                    <div class="img">
                                        <span>✔</span>
                                    </div>
                                </div>';
                    }         
                    echo'</div>';
                }
                if(count($a)>0)
                {
                    echo'
                        <div class="box6">
                            <div class="box8">
                               <div class="text1">
                                    <span>'.$a[count($a)][2].'</span>
                               </div>
                               <div class="text2">
                                    <span>機型:'.$a[count($a)][3].'</span>
                               </div>
                            </div>
                            <div class="box8">
                                <div class="time">';
                        echo'<span>'.$a[count($a)][4].'</span>';
                        echo'            </div>
                                    </div>
                                    <div class="box8">
                                        <div class="time">';
                        echo'<span>'.$a[count($a)][5].'</span>';
                        echo'                </div>
                                    </div>';
                        for($j=0;$j<7;$j++)
                        {
                            echo'
                                    <div class="box8">
                                        <div class="img">
                                            <span>✔</span>
                                        </div>
                                    </div>';
                        }         
                        echo'</div>';
                        echo'</div>';
                        echo'           
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </body>
                    </html>
                    ';
                }
            }
            else
            {
                title2('time');
                echo'
                    <div class="message1">
                        <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>班機表定時刻表</span>
                                    </div>
                                </div>
                                <div class="box3">
                                    <div class="box9">
                                        <form action="" method="POST">
                                        <div class="put">
                                            <select class="select" name="start">
                                                <option selected>啟程地</option>
                                                <option>松山(TSA)</option>
                                                <option>台中(RMQ)</option>
                                                <option>嘉義(CYI)</option>
                                                <option>台南(TNN)</option>
                                                <option>高雄(KHH)</option>
                                                <option>花蓮(HUN)</option>
                                                <option>台東(TTT)</option>
                                                <option>金門(KNH)</option>
                                                <option>澎湖(MZG)</option>
                                                <option>北竿(LZN)</option>
                                                <option>南竿(MFK)</option>
                                            </select>
                                            <select class="select" name="down">
                                                <option selected>目的地</option>
                                                <option>松山(TSA)</option>
                                                <option>台中(RMQ)</option>
                                                <option>嘉義(CYI)</option>
                                                <option>台南(TNN)</option>
                                                <option>高雄(KHH)</option>
                                                <option>花蓮(HUN)</option>
                                                <option>台東(TTT)</option>
                                                <option>金門(KNH)</option>
                                                <option>澎湖(MZG)</option>
                                                <option>北竿(LZN)</option>
                                                <option>南竿(MFK)</option>
                                            </select>
                                           <input type="submit" value="搜尋" name="yes">
                                        </div>
                                    </form>
                                    </div>
                                    <div class="box11"></div>
                                    <div class="box10">
                                        <span>提醒您，使用電子用品可能因不同機型或飛航地區而有不同的限制，請留意空服人員的廣播及機上安全示範影片之說明。</span>
                                        <span>根據中華民國民用航空法規定，任何人不得攜帶足以干擾航機導航及通訊設備之用品，違反規定者，得處5年以下有期徒刑、拘役或新台幣15萬元以下罰</span>
                                        <span>金，情節嚴重者，最高可處無期徒刑。乘客自關閉艙門並經航空器上工作人員宣布限制使用起至開啟艙門止，須遵守下列規定：</span>
                                            <ul>
                                                <li>國內線全程開放使用手機、平板、電子書，或重量在一公斤(含)以下之「小型隨身電子用品」。</li>
                                                <li>航機滑行、起飛及降落階段，乘客須將小型隨身電子用品固定持穩、收妥或置於前方座椅袋內。</li>
                                                <li>當飛行高度高於10,000呎以上時，國內線乘客之筆記型電腦或重量在一公斤以上之電子用品須全程妥善置於規定之隨身行李置放處(座位下方或上方行李置物櫃)。</li>
                                                <li>全程禁用以下電子用品：電子菸、個人無線電收發報機、各類遙控發射器(如電動玩具遙控器等)、其它任何可能干擾航機裝備包含導航、通訊等之電子用品。</li>
                                            </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
                </html>
                ';
            }
        break;
        case 'airplant':
            title2("airplant");
            $a = squery(['list',"SELECT * FROM `class`"]);
            echo'
                        <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>機隊介紹</span>
                                </div>
                            </div>
                            <div class="box3">
                                <div class="text">
                                    <span>'.$a[1][1].'</span>
                                </div>
                                <div class="img">
                                    <img src="../airport/img/airplant1.jpg">
                                </div>
                                <div class="text2">
                                    <span>艙等:'.$a[1][3].'</span><br>
                                    <span>座位數:'.$a[1][2].'</span>
                                </div>
                            </div>
                            <div class="box4">
                                <div class="text">
                                    <span>'.$a[2][1].'</span>
                                </div>
                                <div class="img">
                                    <img src="../airport/img/airplant2.jpg">
                                </div>
                                <div class="text2">
                                    <span>艙等:'.$a[2][3].'</span><br>
                                    <span>座位數:'.$a[2][2].'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </body>
            </html>
            ';
        break;
        case 'line':
            title2("line");
            echo'
                        <div class="message">
                            <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>航線圖</span>
                                    </div>
                                </div>
                                <div class="box3">
                                    <img src="../airport/img/line.jpg">
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
            </html>
            ';
        break;
        case 'news':
            title2("news");
            $a = squery(['list',"SELECT * FROM `air`"]);
            echo'
                <div class="message">
                    <div class="not"></div>
                    <div class="box1">
                        <div class="box2">
                            <div class="text">
                                <span>機場資訊</span>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="box4">
                                <div class="box5">
                                    <span>地區</span>
                                </div>
                                <div class="box5">
                                    <span>地址</span>
                                </div>
                                <div class="box5">
                                    <span>服務電話</span>
                                </div>
                            </div>';
            for($i=1;$i<count($a);$i=$i+2)
            {
                echo'                        
                    <div class="box6">
                        <div class="box7">
                            <span>'.$a[$i][2].'</span>
                        </div>
                        <div class="box7">
                            <span>'.$a[$i][5].'</span>
                        </div>
                        <div class="box7">
                            <span>'.$a[$i][6].'</span>
                        </div>
                    </div>
                    <div class="box8">
                        <div class="box9">
                            <span>'.$a[$i+1][2].'</span>
                        </div>
                        <div class="box9">
                            <span>'.$a[$i+1][5].'</span>
                        </div>
                        <div class="box9">
                            <span>'.$a[$i+1][6].'</span>
                        </div>
                    </div>';
            }
            echo'                         
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
            </html>
            ';
        break;
        case 'luggage':
            title2("luggage");
            echo'
                        <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>行李訊息</span>
                                </div>
                            </div>
                            <div class="box3">
                                <span>隨身行李包含手提行李、個人物品、特殊物品及佔位行李等各項旅客攜入客艙的行李及物品。</span>
                                <span>本公司依據航空器飛航作業管理規則第48條訂定下列隨身行李規範；</span>
                                <span>為確保飛航安全，隨身攜帶上機的行李，必須符合隨身行李規範，並請自行妥善放置於客艙行李箱內或前面座椅下，</span>
                                <span>以避免滑動掉落，並不得阻礙緊急裝備之取用及撤離通道之順暢；</span>
                                <span>若旅客的隨身行李重量或尺寸超出規範時，需請旅客選擇放棄攜帶、另行付費託運或改搭下一班機，敬請見諒。</span>
                                <ul>
                                    <li>手提行李</li>
                                    <li>個人物品</li>
                                    <li>寵物載運</li>
                                    <li>特殊物品</li>
                                    <li>佔位行李</li>
                                    <li>危險物品及違禁物品</li>
                                    <li>搭機乘客攜帶貴重物品應注意事項</li>
                                    <li>行李延遲與損壞</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </body>
            </html>
            ';
        break;
        case 'notice':
            title2("notice");
            echo'
                        <div class="message">
                            <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>注意事項</span>
                                    </div>
                                </div>
                                <div class="box3">
                                    <span>提醒您，使用電子用品可能因不同機型或飛航地區而有不同的限制，請留意空服人員的廣播及機上安全示範影片之說明。</span>
                                    <span>根據中華民國民用航空法規定，任何人不得攜帶足以干擾航機導航及通訊設備之用品，違反規定者，得處5年以下有期徒刑、拘役或新台幣15萬元以下罰</span>
                                    <span>金，情節嚴重者，最高可處無期徒刑。乘客自關閉艙門並經航空器上工作人員宣布限制使用起至開啟艙門止，須遵守下列規定：</span>
                                    <ul>
                                        <li>國內線全程開放使用手機、平板、電子書，或重量在一公斤(含)以下之「小型隨身電子用品」。</li>
                                        <li>航機滑行、起飛及降落階段，乘客須將小型隨身電子用品固定持穩、收妥或置於前方座椅袋內。</li>
                                        <li>當飛行高度高於10,000呎以上時，國內線乘客之筆記型電腦或重量在一公斤以上之電子用品須全程妥善置於規定之隨身行李置放處(座位下方或上方行李置物櫃)。</li>
                                        <li>全程禁用以下電子用品：電子菸、個人無線電收發報機、各類遙控發射器(如電動玩具遙控器等)、其它任何可能干擾航機裝備包含導航、通訊等之電子用品。</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
            </html>
            ';
        break;
        case 'Introduction':
            title2("Introduction");
            echo'
                        <div class="message">
                            <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>公司簡介</span>
                                    </div>
                                </div>
                                <div class="box3">
                                    <span>澎科航空的前身為馬公航空，成立之初以服務澎湖鄉親及加強鄉土發展為主軸。
                                        1966年長航空購買馬公航空之股權後，於1976年正式更名為立榮航空，
                                        以全新的形象再出發，一洗過去國人觀念中的強烈地方色彩。
                                        1988 年響應政府航空資源共享政策，澎科航空正式與大航空及台航空合併，
                                        同時承接長航空之國內航線，成為台灣飛航國內航線最大的航空公司。</span><br><br>
                                    <span>澎科航空堅信「沒有安全就沒有品牌」、「服務是永無止境的」。展望未來，
                                        澎科航空不僅會持續深耕臺灣，也會與長航空更加緊密合作，
                                        朝向小而美的國際級航空公司邁進，為全球旅客提供安全、便捷的飛航服務。</span><br><br>
                                    <span>澎科航空的各項作業比照國際級航空公司的嚴格標準，
                                        在作業安全方面通過國際航空運輸協會(IATA)
                                        的作業安全查核IOSA(IATA Operational Safety Audit)的認證，
                                        IOSA標準更是美國聯邦航空總署及全球主要民航主管機關均認可的標準。
                                        「安全」與「服務」是澎科航空對旅客永遠堅持與不變的保障與承諾。</span>    
                            </div>  
                        </div>
                    </div> 
                </body>
            </html>
            ';
        break;
        case 'book':
            if(@p('next'))
            {
                $t=rand(100001,999999);
                $s=p('start');
                $do=p('down');
                $da=p('date');
                $p=p('people');
                squery(['run',
                "INSERT INTO `book`(`did`,`sair`,`dair`,`fdate`,`people`,`time`)
                VALUES ('$t','$s','$do','$da','$p','$time')
                "]);  
                ref([0,"/airport/index.php?p=ticket"]);
            }
            else
            {
                title2("book");
                echo'
                            <div class="message">
                            <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>訂位購票</span>
                                    </div>
                                </div>
                                <div class="box3">
                                    <form action="" method="POST">
                                        <div class="put">
                                            <select class="select" name="start">
                                                <option selected>啟程地</option>
                                                <option>松山(TSA)</option>
                                                <option>台中(RMQ)</option>
                                                <option>嘉義(CYI)</option>
                                                <option>台南(TNN)</option>
                                                <option>高雄(KHH)</option>
                                                <option>花蓮(HUN)</option>
                                                <option>台東(TTT)</option>
                                                <option>金門(KNH)</option>
                                                <option>澎湖(MZG)</option>
                                                <option>北竿(LZN)</option>
                                                <option>南竿(MFK)</option>
                                            </select>
                                            <select class="select" name="down">
                                                <option selected>目的地</option>
                                                <option>松山(TSA)</option>
                                                <option>台中(RMQ)</option>
                                                <option>嘉義(CYI)</option>
                                                <option>台南(TNN)</option>
                                                <option>高雄(KHH)</option>
                                                <option>花蓮(HUN)</option>
                                                <option>台東(TTT)</option>
                                                <option>金門(KNH)</option>
                                                <option>澎湖(MZG)</option>
                                                <option>北竿(LZN)</option>
                                                <option>南竿(MFK)</option>
                                            </select>
                                            <input type="date" name="date">
                                            <select class="select" name="people">
                                                <option selected>人數</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="button">
                                           <input type="submit" value="搜尋" name="next">
                                        </div>
                                    </form>
                                    <div class="important">
                                        <span style="font-size:150%;">注意事項</span>
                                        <ul>
                                            <li>本系統一次最多僅能受理四人完成訂位購票交易（含兒童），若您欲訂購的人數超過四人，請分次交易。</li>
                                            <li>愛心陪同票必須與愛心票同時訂購。持有身心障礙手冊之中華民國國民，可訂購愛心票；其一名必要同行陪伴者，則可訂購愛心陪同票。</li>
                                            <li>本系統不接受孩童或愛心陪同的單獨訂位服務。若您有前述訂位需求，請洽客服中心。</li>
                                            <li>兒童係指出發當日為年滿2歲而未滿12歲之孩童。嬰兒為未滿2歲之孩童。</li>
                                            <li>居民係設籍離島、花東之居民，且搭乘往返戶籍地的航線。</li>
                                            <li>本公司機隊詳細資訊，請點參閱 。</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
                </html>
                ';
            }
        break;
        case 'ticket':
            if(@p('yes'))
            {
                $c=p('class');
                $a=p('start');
                $d=p('down');
                $catch=squery(['list',"SELECT * FROM `book`"]);
                $ccc=$catch[count($catch)][5];
                for($i=0;$i<$ccc;$i++)
                {
                    $t=rand(100001,999999);
                    $s=rand(100001,999999);
                    squery(['run',"INSERT INTO `ticket`(`tid`,`serial`,`fid`,`stime`,`dtime`)
                    VALUES('$t','$s','$c','$a','$d')"]);
                }
                ref([0,"/airport/index.php?p=client"]);
            }    
            else
            {

                title2("ticket");
                $month=date("M");
                $day=date("j");
                $week=date("w");
                $weekarray=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                /*$date=$month.$day;*/
                $c=squery(['list',"SELECT * FROM `book`"]);
                $s1=$c[count($c)][2];
                $d1=$c[count($c)][3];
                $s2=substr($s1,0,-5);
                $d2=substr($d1,0,-5);
                $s3=substr($s1,-4,-1);
                $d3=substr($d1,-4,-1);
                $m=substr($c[count($c)][4],5,2);
                $m1="";
                switch($m)
                {
                    case "01":
                        $m1="Jan";
                    break;
                    case "02":
                        $m1="Feb";
                    break;
                    case "03":
                        $m1="Mar";
                    break;
                    case "04":
                        $m1="Apr";
                    break;
                    case "05":
                        $m1="May";
                    break;
                    case "06":
                        $m1="Jun";
                    break;
                    case "07":
                        $m1="Jul";
                    break;
                    case "08":
                        $m1="Aug";
                    break;
                    case "09":
                        $m1="Sep";
                    break;
                    case "10":
                        $m1="Oct";
                    break;
                    case "11":
                        $m1="Nov";
                    break;
                    case "12":
                        $m1="Dec";
                    break;
                }
                $d=substr($c[count($c)][4],8,2);
                $date=$m1.$d;
                $b="SELECT * FROM `flight`,`route`
                WHERE `flight`.`fid`=`route`.`fid` 
                AND `flight`.`fdate`="."'".$date."'
                AND `route`.`sair`='".$s3."'
                AND `route`.`dair`='".$d3."'
                ";
                $a=squery(['list',$b]);
                echo'
                            <div class="message">
                            <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>票種選擇</span>
                                    </div>
                                </div>
                                <div class="box3">
                                    <div class="box4">
                                        <div class="box5">
                                            <div class="cspace">
                                                <span>'.$s2.'</span>
                                            </div>
                                            <div class="espace">
                                                <span>'.$s3.'</span>
                                            </div>
                                        </div>
                                        <div class="box5">

                                        </div>
                                        <div class="box5">
                                            <div class="cspace">
                                                <span>'.$d2.'</span>
                                            </div>
                                            <div class="espace">
                                                <span>'.$d3.'</span>
                                            </div>
                                        </div>';
                if($week==0)
                {
                    $week=6;
                }
                else
                {
                    $week--;   
                }                    
                for($i=0;$i<7;$i++)
                {
                    if($week>=7)
                    {
                        $week-=7;
                    }
                    echo'    
                        <div class="box5">
                            <div class="month">
                                <span>'.$month.'</span>
                            </div>
                            <div class="day">
                                <span>'.$day.'</span>
                            </div>
                            <div class="week">
                                <span>'.$weekarray[$week].'</span>
                            </div>
                        </div>';
                    $day++;
                    $week++;
                }                  
                echo'</div>';
                $hour = date("G");
                if($d==date("j")&&$hour>6)
                {
                    $hour-=4;
                }
                else
                {
                    $hour=1;
                }
                for($j=$hour;$j<=count($a);$j++)
                {
                    echo'
                    <form action="" method="POST">
                        <div class="box6">
                            <div class="box7" style="border-right:solid rgb(173, 172, 172) 1px;">
                                <span>'.$a[$j][2].'</span>
                            </div>
                            <div class="box7">
                                <span>'.$a[$j][4].'</span>
                            </div>
                            <div class="box7">
                                <span>></span>
                            </div>
                            <div class="box7" style="border-right:solid rgb(173, 172, 172) 1px;">
                                <span>'.$a[$j][5].'</span>
                            </div>
                            <div class="box7">
                                <input type="hidden" name="class" value="'.$a[$j][2].'">
                                <input type="hidden" name="start" value="'.$a[$j][4].'">
                                <input type="hidden" name="down" value="'.$a[$j][5].'">
                                <input type="submit" value="確定" name="yes">
                            </div>
                        </div>
                    </form>';
                }
                echo'      
                        </div>          
                            </div>
                        </div>
                    </div> 
                </body>
                </html>
                ';
            }
        break;
        case 'client':
            if(@p('sure'))
            {
                $f=p('max');
                $ci=array("","","","");
                $na=array("","","","");
                $ph=array("","","","");
                $pa=array("","","","");
                $co=array("","","","");
                $bi=array("","","","");
                $a=squery(['list',"SELECT * FROM `ticket`"]);
                $c=squery(['list',"SELECT * FROM `book`"]);
                $di=$c[count($c)][1];
                $fd=$c[count($c)][4];
                for($i=0;$i<(int)$f;$i++)
                {
                    $c1="cid".$i;
                    $ci[$i]=p($c1);
                    $na1="name".$i;
                    $na[$i]=p($na1);
                    $ph1="phone".$i;
                    $ph[$i]=p($ph1);
                    $pa1="pay".$i;
                    $pa[$i]=p($pa1);
                    $co1="country".$i;
                    $co[$i]=p($co1);
                    $bi1="birthday".$i;
                    $bi[$i]=p($bi1);
                    $cc=p($c1);
                    $se=$a[count($a)-$f+$i+1][2];
                    squery(['run',"INSERT INTO `client`
                        (`cid`,`name`,`phone`,`pay`,`country`,`birthday`)
                        VALUES('$ci[$i]','$na[$i]','$ph[$i]','$pa[$i]','$co[$i]','$bi[$i]')
                    "]);
                     squery(['run',"INSERT INTO `detail`(`serial`,`cid`,`did`,`fdate`)
                         VALUES ('$se','$cc','$di','$fd')"]);
                }
                ref([0,"/airport/index.php?p=show"]);
            }
            else
            {
                title2("client");
                echo'
                            <div class="message">
                            <div class="not"></div>
                            <div class="box1">
                                <div class="box2">
                                    <div class="text">
                                        <span>個人資料</span>
                                    </div>
                                </div>';
                $carray=array("客戶一","客戶二","客戶三","客戶四");  
                $a=squery(['list',"SELECT * FROM `book`"]); 
                $final=$a[count($a)][5];
                echo'<form action="" method="POST">';             
                for($i=0;$i<(int)$final;$i++)
                {
                    echo'
                        <div class="box5">
                            <div class="text">
                                <span>'.$carray[$i].'</span>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="text">
                                <span>身分證號</span>
                            </div>
                            <div class="input">
                                <input type="text" name="cid'.$i.'">
                            </div>
                        </div>
                        <div class="box3">
                            <div class="text">
                                <span>姓名</span>
                            </div>
                            <div class="input">
                                <input type="text" name="name'.$i.'">
                            </div>
                        </div>
                        <div class="box3">
                            <div class="text">
                                <span>電話</span>
                            </div>
                            <div class="input">
                                <input type="text" name="phone'.$i.'">
                            </div>
                        </div>
                        <div class="box3">
                            <div class="text">
                                <span>信用卡號</span>
                            </div>
                            <div class="input">
                                <input type="text" name="pay'.$i.'">
                            </div>
                        </div>
                        <div class="box3">
                            <div class="text">
                                <span>國籍</span>
                            </div>
                            <div class="input">
                                <input type="text" name="country'.$i.'">
                            </div>
                        </div>
                        <div class="box3">
                            <div class="text">
                                <span>生日</span>
                            </div>
                            <div class="input">
                                <input type="text" name="birthday'.$i.'">
                            </div>
                        </div>
                        <div class="box4"></div>';
                }                
                echo'    
                                <div class="button">
                                    <input type="hidden" value="'.$final.'" name="max">
                                    <input type="submit" value="確定" name="sure">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </body>
                </html>
                ';
            }
        break;
        case 'thank':
            title2("thank");
            echo'
                        <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>購買成功</span>
                                </div>
                            </div>
                            <div class="box3">
                                <span>感謝購買</span>
                            </div>
                        </div>
                    </div>
                </div> 
            </body>
            </html>
            ';
            ref([1,"/airport/index.php"]);
        break;
        case 'update':
            if(@p('sure'))
            {
                $c=p('cid');
                $t=p('tid');
                $s="1";
                $b="UPDATE `detail`,`ticket`,`client`
                    SET `detail`.`serial`='1',`ticket`.`serial`='1'
                    WHERE`ticket`.`tid`='$t'
                    AND `client`.`cid`='$c'
                    AND `detail`.`serial`=`ticket`.`serial`
                    AND `detail`.`cid`=`client`.`cid`
                    ";
                squery(['run',$b]);
                ref([0,"/airport/index.php?p=update1"]);
            }
            else
            {
                title2("update");
                echo'
                    <div class="message">
                    <div class="not"></div>
                    <div class="box1">
                        <div class="box2">
                            <div class="text">
                                <span>更改行程</span>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="box4">
                                <form action="" method="POST">
                                    <div class="put">
                                        <div class="text">
                                            <span>票號:</span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="tid">
                                        </div>
                                    </div>
                                    <div class="put">
                                        <div class="text">
                                            <span>身分證號:</span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="cid">
                                        </div>
                                    </div>
                                    <div class="put">
                                        <div class="button">
                                            <input type="submit" name="sure">
                                        </div>
                                    </div>
                                    <div class="box6"></div>
                                    <div class="box5">
                                        <span>保護您個人資料的隱私是澎科航空的責任</span><br>
                                        <span>期望您能知道有關您的權利</span><br>
                                        <span>進而安心的使用澎科航空股份有限公司為您量身訂做之各項服務</span><br>
                                        <span>謹依中華民國個人資料保護法第8條</span><br>
                                        <span>歐盟一般資料保護規則第7條規定告知以下事項</span><br>
                                        <span>並特向您說明本公司之隱私權保護承諾</span><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </body>
        </html>
                ';
            }
        break;
        case 'update1':
            if(@p('yes'))
            {
                $s=p('start');
                $d=p('down');
                $date=p('date');
                $a=squery(['list',"SELECT * FROM `detail` WHERE `serial`='1'"]);
                $put=$a[count($a)][3];
                squery(['run',"INSERT INTO `book`
                    (`did`,`sair`,`dair`,`fdate`,`people`,`time`)
                    VALUES ('$put','$s','$d','$date','1','$time')"]);
                ref([0,"/airport/index.php?p=update2"]);
            }
            else
            {
                title2("update1");
                echo'
                    <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>選擇時間</span>
                                </div>
                            </div>
                            <div class="box3">
                            <form action="" method="POST">
                                <div class="put">
                                    <select class="select" name="start">
                                        <option selected>啟程地</option>
                                        <option>松山(TSA)</option>
                                        <option>台中(RMQ)</option>
                                        <option>嘉義(CYI)</option>
                                        <option>台南(TNN)</option>
                                        <option>高雄(KHH)</option>
                                        <option>花蓮(HUN)</option>
                                        <option>台東(TTT)</option>
                                        <option>金門(KNH)</option>
                                        <option>澎湖(MZG)</option>
                                        <option>北竿(LZN)</option>
                                        <option>南竿(MFK)</option>
                                    </select>
                                    <select class="select" name="down">
                                        <option selected>目的地</option>
                                        <option>松山(TSA)</option>
                                        <option>台中(RMQ)</option>
                                        <option>嘉義(CYI)</option>
                                        <option>台南(TNN)</option>
                                        <option>高雄(KHH)</option>
                                        <option>花蓮(HUN)</option>
                                        <option>台東(TTT)</option>
                                        <option>金門(KNH)</option>
                                        <option>澎湖(MZG)</option>
                                        <option>北竿(LZN)</option>
                                        <option>南竿(MFK)</option>
                                    </select>
                                    <input type="date" name="date">
                                </div>
                                <div class="button">
                                   <input type="submit" value="搜尋" name="yes">
                                </div>
                                <div class="important">
                                    <span style="font-size:150%;">注意事項</span>
                                    <ul>
                                        <li>愛心陪同票必須與愛心票同時訂購。持有身心障礙手冊之中華民國國民，可訂購愛心票；其一名必要同行陪伴者，則可訂購愛心陪同票。</li>
                                        <li>本系統不接受孩童或愛心陪同的單獨訂位服務。若您有前述訂位需求，請洽客服中心。</li>
                                        <li>兒童係指出發當日為年滿2歲而未滿12歲之孩童。嬰兒為未滿2歲之孩童。</li>
                                        <li>居民係設籍離島、花東之居民，且搭乘往返戶籍地的航線。</li>
                                        <li>本公司機隊詳細資訊，請點參閱 。</li>
                                    </ul>
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
        break;
        case 'update2':
            if(@p('sure'))
            {
                $fid=p('fid');
                $sair=p('sair');
                $dair=p('dair');
                $rand=rand(100001,999999);
                squery(['run',"UPDATE `ticket`,`detail`,`client`
                    SET `ticket`.`serial`='$rand',
                    `detail`.`serial`='$rand',
                    `ticket`.`fid`='$fid',
                    `ticket`.`stime`='$sair',
                    `ticket`.`dtime`='$dair'
                    WHERE `detail`.`cid`=`client`.`cid`
                    AND `detail`.`serial`=`ticket`.`serial`
                    AND `detail`.`serial`='1'
                    AND `ticket`.`serial`='1'"]);
                ref([0,"/airport/index.php?p=thank1"]);
            }
            else
            {
                $data=squery(['list',"SELECT * FROM book"]);
                $s=$data[count($data)][2];
                $d=$data[count($data)][3];
                $fdate=$data[count($data)][4];
                $s1=substr($s,0,-5);
                $d1=substr($d,0,-5);
                $s2=substr($s,-4,-1);
                $d2=substr($d,-4,-1);
                $month=date("M");
                $day=date("j");
                $week=date("w");
                $weekarray=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                /*$date=$month.$day;*/
                title2("update2");
                echo'
                    <div class="message">
                    <div class="not"></div>
                    <div class="box1">
                        <div class="box2">
                            <div class="text">
                                <span>班機表定時刻表</span>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="box4">
                                <div class="box5">
                                    <div class="cspace">
                                        <span>'.$s1.'</span>
                                    </div>
                                    <div class="espace">
                                        <span>'.$s2.'</span>
                                    </div>
                                </div>
                                <div class="box5">

                                </div>
                                <div class="box5">
                                    <div class="cspace">
                                        <span>'.$d1.'</span>
                                    </div>
                                    <div class="espace">
                                        <span>'.$d2.'</span>
                                    </div>
                                </div>';
                if($week==0)
                {
                    $week=6;
                }
                else
                {
                    $week--;
                }
                for($i=0;$i<7;$i++)
                {
                    if($week>6)
                    {
                        $week=0;
                    }
                    $d=(int)$day+$i;
                    echo'
                    <div class="box5">
                        <div class="month">
                            <span>'.$month.'</span>
                        </div>
                        <div class="day">
                            <span>'.$d.'</span>
                        </div>
                        <div class="week">
                             <span>'.$weekarray[$week].'</span>
                        </div>
                    </div>';
                    $week++;
                }           
                $m=substr($fdate,-5,-3);
                $y=substr($fdate,8,2);
                switch($m)
                {
                    case "01":
                        $m1="Jan";
                    break;
                    case "02":
                        $m1="Feb";
                    break;
                    case "03":
                        $m1="Mar";
                    break;
                    case "04":
                        $m1="Apr";
                    break;
                    case "05":
                        $m1="May";
                    break;
                    case "06":
                        $m1="Jun";
                    break;
                    case "07":
                        $m1="Jul";
                    break;
                    case "08":
                        $m1="Aug";
                    break;
                    case "09":
                        $m1="Sep";
                    break;
                    case "10":
                        $m1="Oct";
                    break;
                    case "11":
                        $m1="Nov";
                    break;
                    case "12":
                        $m1="Dec";
                    break;
                }
                $ff=$m1.$y;
                echo'</div>';
                $in=squery(['list',"SELECT * FROM `flight`,`route` 
                WHERE `flight`.`fdate`='$ff'
                AND `flight`.`fid`=`route`.`fid`
                AND `route`.`sair`='$s2'
                AND `route`.`dair` ='$d2'
                "]);
                $hour = date("G");
                if($y==date("j")&&$hour>6)
                {
                    $hour-=4;
                }
                else
                {
                    $hour=1;
                }
                for($i=$hour;$i<=count($in);$i++)
                {
                    echo'
                        <form action="" method="POST">
                            <div class="box6">
                                <div class="box7" style="border-right:solid rgb(173, 172, 172) 1px;">
                                    <span>'.$in[$i][2].'</span>
                                </div>
                                <div class="box7">
                                    <span>'.$in[$i][4].'</span>
                                </div>
                                <div class="box7">
                                    <span>></span>
                                </div>
                                <div class="box7" style="border-right:solid rgb(173, 172, 172) 1px;">
                                    <span>'.$in[$i][5].'</span>
                                </div>
                                <div class="box7">
                                    <input type="hidden" value="'.$in[$i][2].'" name="fid">
                                    <input type="hidden" value="'.$in[$i][4].'" name="sair">
                                    <input type="hidden" value="'.$in[$i][5].'" name="dair">
                                    <input type="submit" value="確定" name="sure">
                                </div>
                            </div>
                        </form>';
                }
                echo'
                                </div>
                            </div>
                        </div>
                    </div> 
                </body>
                </html>
                ';
            }
        break;
        case 'thank1':
            title2("thank");
            echo'
                        <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>更新成功</span>
                                </div>
                            </div>
                            <div class="box3">
                                <span>感謝使用本系統</span>
                            </div>
                        </div>
                    </div>
                </div> 
            </body>
            </html>
            ';
            ref([1,"/airport/index.php"]);
        break;
        case 'no':
            if(@p('sure'))
            {
                $c=p('cid');
                $t=p('tid');
                $b1="DELETE FROM `detail` WHERE `cid`='$c'";
                $b2="DELETE FROM `ticket` WHERE `tid`='$t'";
                squery(['run',$b1]);
                squery(['run',$b2]);
                ref([0,"/airport/index.php?p=thank2"]);
            }
            else
            {
                title2("update");
                echo'
                    <div class="message">
                    <div class="not"></div>
                    <div class="box1">
                        <div class="box2">
                            <div class="text">
                                <span>退票</span>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="box4">
                                <form action="" method="POST">
                                    <div class="put">
                                        <div class="text">
                                            <span>票號:</span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="tid">
                                        </div>
                                    </div>
                                    <div class="put">
                                        <div class="text">
                                            <span>身分證號:</span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="cid">
                                        </div>
                                    </div>
                                    <div class="put">
                                        <div class="button">
                                            <input type="submit" name="sure">
                                        </div>
                                    </div>
                                    <div class="box6"></div>
                                    <div class="box5">
                                        <span>保護您個人資料的隱私是澎科航空的責任</span><br>
                                        <span>期望您能知道有關您的權利</span><br>
                                        <span>進而安心的使用澎科航空股份有限公司為您量身訂做之各項服務</span><br>
                                        <span>謹依中華民國個人資料保護法第8條</span><br>
                                        <span>歐盟一般資料保護規則第7條規定告知以下事項</span><br>
                                        <span>並特向您說明本公司之隱私權保護承諾</span><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </body>
        </html>
                ';
            }
        break;
        case 'thank2':
            title2("thank");
            echo'
                        <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>刪除成功</span>
                                </div>
                            </div>
                            <div class="box3">
                                <span>感謝使用本系統</span>
                            </div>
                        </div>
                    </div>
                </div> 
            </body>
            </html>
            ';
            ref([1,"/airport/index.php"]);
        break;
        case 'seat':
            if(@p('sure'))
            {
                $c=p('cid');
                $t=p('tid');
                $rand1=rand(1,6);
                $rand2=rand(1,50);
                switch($rand1)
                {
                    case "1":
                        $rank="A";
                    break;
                    case "2":
                        $rank="B";
                    break;
                    case "3":
                        $rank="C";
                    break;
                    case "4":
                        $rank="J";
                    break;
                    case "5":
                        $rank="H";
                    break;
                    case "6":
                        $rank="K";
                    break;
                }
                $put=$rank.$rand2;
                squery(['run',"INSERT INTO `seat`
                    (`tid`,`cid`,`fit`,`time`)
                    VALUES('$t','$c','$put','$time')"]);
                ref([0,"/airport/index.php?p=thank3"]);
            }
            else
            {
                title2("update");
                echo'
                    <div class="message">
                    <div class="not"></div>
                    <div class="box1">
                        <div class="box2">
                            <div class="text">
                                <span>線上畫位</span>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="box4">
                                <form action="" method="POST">
                                    <div class="put">
                                        <div class="text">
                                            <span>票號:</span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="tid">
                                        </div>
                                    </div>
                                    <div class="put">
                                        <div class="text">
                                            <span>身分證號:</span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="cid">
                                        </div>
                                    </div>
                                    <div class="put">
                                        <div class="button">
                                            <input type="submit" name="sure">
                                        </div>
                                    </div>
                                    <div class="box6"></div>
                                    <div class="box5">
                                        <span>保護您個人資料的隱私是澎科航空的責任</span><br>
                                        <span>期望您能知道有關您的權利</span><br>
                                        <span>進而安心的使用澎科航空股份有限公司為您量身訂做之各項服務</span><br>
                                        <span>謹依中華民國個人資料保護法第8條</span><br>
                                        <span>歐盟一般資料保護規則第7條規定告知以下事項</span><br>
                                        <span>並特向您說明本公司之隱私權保護承諾</span><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </body>
        </html>
                ';
            }
        break;
        case 'thank3':
            title2("thank");
            $a=squery(['list',"SELECT * FROM `seat`"]);
            echo'
                        <div class="message">
                        <div class="not"></div>
                        <div class="box1">
                            <div class="box2">
                                <div class="text">
                                    <span>畫位成功</span>
                                </div>
                            </div>
                            <div class="box3">
                                <span>您的座位為:'.$a[count($a)][3].'</span><br>
                                <span>感謝使用本系統</span>
                            </div>
                        </div>
                    </div>
                </div> 
            </body>
            </html>
            ';
            ref([1,"/airport/index.php"]);
        break;
        case 'show':
            title2("show");
            $a=squery(['list',"SELECT * FROM `ticket`,`book`,`detail`,`client` 
                WHERE `detail`.`cid`=`client`.`cid`
                AND `detail`.`serial`=`ticket`.`serial`
                AND`detail`.`did`=`book`.`did`"]);
            echo'
                <div class="message">
                <div class="not"></div>
                <div class="box1">
                    <div class="box2">
                        <div class="text">
                            <span>購買成功</span>
                        </div>
                    </div>';
            $math=(int)$a[count($a)][11]-1;  
            for($i=$math;$i>=0;$i--)
            {      
             echo'  <div class="box3">
                        <div class="box4">
                            <div class="text1">
                                <span>'.$a[count($a)-$i][8].'</span>
                            </div>
                            <div class="text">
                                <span> > </span>
                            </div>
                            <div class="text1">
                                <span>'.$a[count($a)-$i][9].'</span>
                            </div>
                        </div>
                        <div class="box5">
                            <div class="text2">
                                <span>票號:</span>
                            </div>
                            <div class="text3">
                                <span>'.$a[count($a)-$i][1].'</span>
                            </div>
                        </div>
                        <div class="box5">
                            <div class="text2">
                                <span>班次:</span>
                            </div>
                            <div class="text3">
                                <span>'.$a[count($a)-$i][3].'</span>
                            </div>
                        </div>
                        <div class="box5">
                            <div class="text2">
                                <span>日期:</span>
                            </div>
                            <div class="text3">
                                <span>'.$a[count($a)-$i][10].'</span>
                            </div>
                        </div>
                        <div class="box5">
                            <div class="text2">
                                <span>姓名:</span>
                            </div>
                            <div class="text3">
                                <span>'.$a[count($a)-$i][20].'</span>
                            </div>
                        </div>
                        <div class="box5">
                            <div class="text2">
                                <span>身分證:</span>
                            </div>
                            <div class="text3">
                                <span>'.$a[count($a)-$i][19].'</span>
                            </div>
                        </div>
                    </div>';
            }
                echo'
                </div>
            </div>
        </div> 
    </body>
    </html>
            ';
        break;
        default:
            if(@p('next'))
            {
                $t=rand(100001,999999);
                $s=p('start');
                $do=p('down');
                $da=p('date');
                $p=p('people');
                squery(['run',
                "INSERT INTO `book`(`did`,`sair`,`dair`,`fdate`,`people`,`time`)
                VALUES ('$t','$s','$do','$da','$p','$time')
                "]);  
                ref([0,"/airport/index.php?p=ticket"]);
            }
            else
            {
                title1();
                $a=squery(['list',"SELECT * FROM `special`"]);
                echo'
                    <div class="slider_container">
                    <div class="pic">
                        <img src="../airport/img/1.jpg">
                    </div>
                    <div class="pic">
                        <img src="../airport/img/2.jpg">
                    </div>
                    <div class="pic">
                        <img src="../airport/img/3.jpg">
                    </div>
                    <div class="pic">
                        <img src="../airport/img/1.jpg">
                    </div>
                    <div class="pic">
                        <img src="../airport/img/2.jpg">
                    </div>
                    </div>
                    <div class="input">
                        <div class="text">
                            <span>訂位購票</span>
                        </div>
                        <div class="put">
                        <form action="" method="POST">
                            <select class="select" name="start">
                                <option selected>啟程地</option>
                                <option>松山(TSA)</option>
                                <option>台中(RMQ)</option>
                                <option>嘉義(CYI)</option>
                                <option>台南(TNN)</option>
                                <option>高雄(KHH)</option>
                                <option>花蓮(HUN)</option>
                                <option>台東(TTT)</option>
                                <option>金門(KNH)</option>
                                <option>澎湖(MZG)</option>
                                <option>北竿(LZN)</option>
                                <option>南竿(MFK)</option>
                            </select>
                            <select class="select" name="down">
                                <option selected>目的地</option>
                                <option>松山(TSA)</option>
                                <option>台中(RMQ)</option>
                                <option>嘉義(CYI)</option>
                                <option>台南(TNN)</option>
                                <option>高雄(KHH)</option>
                                <option>花蓮(HUN)</option>
                                <option>台東(TTT)</option>
                                <option>金門(KNH)</option>
                                <option>澎湖(MZG)</option>
                                <option>北竿(LZN)</option>
                                <option>南竿(MFK)</option>
                            </select>
                            <input type="date" name="date">
                            <select class="select" name="people">
                                <option selected>人數</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="button">
                           <input type="submit" value="搜尋" name="next">
                        </div>
                        </form>
                    </div>
                    <div class="special">
                        <div class="box1">
                            <div class="text">
                                <span>NPU 特選</span>
                            </div>
                            <div class="pic">
                                <img src="../airport/img/1.jpg">
                            </div>
                        </div>
                        <div class="box2">
                            <div class="text">
                                <span>超級優惠</span>
                            </div>
                            <div class="put">
                                <div class="square1">
                                    <div class="box3">
                                        <div class="text1">
                                            <span>'.$a[1][1].'-'.$a[1][2].'</span>
                                        </div>
                                        <div class="text2">
                                            <span style="font-size:160%; color:#aeb162;">'.$a[1][3].'</span>
                                            <span>元起</span>
                                        </div>
                                        <div class="put1">
                                            <input type="submit" value="立刻訂票" onclick="location.href=\'/airport/index.php?p=book\'">
                                        </div>
                                    </div>
                                    <div class="box4">
                                        <div class="text1">
                                            <span>'.$a[2][1].'-'.$a[2][2].'</span>
                                        </div>
                                        <div class="text2">
                                            <span style="font-size:160%; color:#aeb162;">'.$a[2][3].'</span>
                                            <span>元起</span>
                                        </div>
                                        <div class="put1">
                                            <input type="submit" value="立刻訂票" onclick="location.href=\'/airport/index.php?p=book\'">
                                        </div>            
                                    </div>
                                </div>
                                <div class="square2">
                                    <div class="box3">
                                        <div class="text1">
                                            <span>'.$a[3][1].'-'.$a[3][2].'</span>
                                        </div>
                                        <div class="text2">
                                            <span style="font-size:160%; color:#aeb162;">'.$a[3][3].'</span>
                                            <span>元起</span>
                                        </div>
                                        <div class="put1">
                                            <input type="submit" value="立刻訂票" onclick="location.href=\'/airport/index.php?p=book\'">
                                        </div>
                                    </div>
                                    <div class="box4">
                                        <div class="text1">
                                            <span>'.$a[4][1].'-'.$a[4][2].'</span>
                                        </div>
                                        <div class="text2">
                                            <span style="font-size:160%; color:#aeb162;">'.$a[4][3].'</span>
                                            <span>元起</span>
                                        </div>
                                        <div class="put1">
                                            <input type="submit" value="立刻訂票" onclick="location.href=\'/airport/index.php?p=book\'">
                                        </div>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new">
                        <div class="test">
                            <span>最新消息</span>
                        </div>
                        <div class="put">
                            <span>想知道的一切 都在這裡</span>
                        </div>
                        <div class="box1">
                            <div class="text1">
                                <span>本公司定於每年1、4、7、10月</span><br>
                                <span>自前季符合資格之問卷名單中</span><br>
                                <span>透過電腦系統進行抽獎作業</span><br>
                            </div>
                            <div class="text2">
                                <span>澎科航空統一於</span>
                                <span>2022年4月11日(一)上午 9 點整</span><br>
                                <span>開放端午假期2022年6月2日至</span><br>
                                <span>2022年6月6日之訂位購票服務</span><br>
                            </div>
                        </div>
                    </div>
                    <div class="buttom">
                        <div class="not"></div>
                        <div class="text">
                            <span>澎科假期</span>
                        </div>
                        <div class="text1">
                            <span>有個美好的假期</span>
                        </div>
                    </div>
                </div> 
                </body>
                </html>
                ';
            }
        break;
    }
}
else
{
    /*if(@p('submit'))
    {
		$a = p('us');
		$b = p('ps');
		if($a==="admin"&&$b==="1234")
        {
			set_s(['admin',true]);
			txt('登入成功');
			ref([1,'admin.php']);
            
		}
        else
        {
			txt('登入失敗');
			ref([1,'admin.php']);
		}
	}
    else
    {
		echo 
        '
		<form action="" method="POST">
			<input type="text" name="us" placeholder="">
			<input type="password" name="ps" placeholder="密碼">
			<input type="submit" name="submit" value="送出">
		</form>
		';

	}*/
    set_s(['index',true]);
    ref([0,'index.php']);
}

?>