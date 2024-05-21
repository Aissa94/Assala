<?php 

function numtoarb ($total)
{
$total=explode(".",$total);
$j= strlen($total[0]);
$je=$j;
$je--;
$de=1;
for($i=1;$i<$j;$i++)
$de=$de*10;

$t=$total[0];

for($i=0;$i<$j;$i++)
{
$te[$je]=$t/$de;
$t=$t%$de;
$de=$de/10;
$temp=explode(".",$te[$je]);
$te[$je]=$temp[0];
$je--;

}

$arb[6] = "";
$arb[5] = "";
$arb[3] = "";
$arb[4] = "";
$arb[2] = "";
$arb[0] = "";
$arb[1] = "";

for($i=0;$i<$j;$i++)
{
if ($i == 0)
{
if ($j<3)
switch($te[$i])
{
case "0" : $arb[0]=" ";
break;
case "1" :  $arb[0]= " واحد"  ;
break;
case "2" : if($te[1]=="1") $arb[0]=" اثنا "; else $arb[0]=" اثنان" ;
break;
case "3" : $arb[0]=" ثلاثة";
break;
case "4" : $arb[0]=" اربعة" ;
break;
case "5" : $arb[0]=" خمسة"   ;
break;
case "6" : $arb[0]=" ستة"     ;
break;
case "7" : $arb[0]=" سبعة"     ;
break;
case "8" : $arb[0]=" ثمانية"    ;
break;
case "9" : $arb[0]=" تسعة"       ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[0]=" ";
break;
case "1" :  $arb[0]=" وواحد"  ;
break;
case "2" : if($te[1]=="1") $arb[0]=" واثنا "; else $arb[0]=" واثنان" ;
break;
case "3" : $arb[0]=" وثلاثة";
break;
case "4" : $arb[0]=" واربعة" ;
break;
case "5" : $arb[0]=" وخمسة"   ;
break;
case "6" : $arb[0]=" وستة"     ;
break;
case "7" : $arb[0]=" وسبعة"     ;
break;
case "8" : $arb[0]=" وثمانية"    ;
break;
case "9" : $arb[0]=" وتسعة"       ;
break;
}
}



if ($i == 1)
{
if ($j==2 )
{
if($te[$i]==1){if($te[0]=="1") {$arb[0]=" " ;$arb[1]=" أحد عشر";}  elseif($te[0]=="0")$arb[1]=" عشرة"; else $arb[1]=" عشر"    ; }
if ( $te[0]=="0")
switch($te[$i])
{
case "0" : $arb[1]=" "      ;
break;
case "1" : if($te[0]=="1") {$arb[0]=" " ;$arb[1]=" أحد عشر";} elseif($te[0]=="0")$arb[1]=" عشرة"; else $arb[1]="عشر"    ;
break;
case "2" : $arb[1]=" عشرون"    ;
break;
case "3" : $arb[1]=" ثلاثون"    ;
break;
case "4" : $arb[1]=" اربعون"     ;
break;
case "5" : $arb[1]=" خمسون"       ;
break;
case "6" : $arb[1]=" ستون"         ;
break;
case "7" : $arb[1]=" سبعون"         ;
break;
case "8" : $arb[1]=" ثمانون"         ;
break;
case "9" : $arb[1]=" تسعون"           ;
break;
}

}
else
switch($te[$i])
{
case "0" : $arb[1]=" "      ;
break;
case "1" : if($te[0]=="1") {$arb[0]=" " ;$arb[1]=" وأحد عشر";}elseif($te[0]=="0")$arb[1]=" وعشرة"; else $arb[1]=" عشر"  ;
break;
case "2" : $arb[1]=" وعشرون"    ;
break;
case "3" : $arb[1]=" وثلاثون"    ;
break;
case "4" : $arb[1]=" واربعون"     ;
break;
case "5" : $arb[1]=" وخمسون"       ;
break;
case "6" : $arb[1]=" وستون"         ;
break;
case "7" : $arb[1]=" وسبعون"         ;
break;
case "8" : $arb[1]=" وثمانون"         ;
break;
case "9" : $arb[1]=" وتسعون"           ;
break;
}
}


if ($i == 2)
{
if ($j==3)
switch($te[$i])
{
case "0" : $arb[2]=" "      ;
break;
case "1" : $arb[2]=" مائة"    ;
break;
case "2" : $arb[2]=" مائتان"    ;
break;
case "3" : $arb[2]=" ثلاثمائة"    ;
break;
case "4" : $arb[2]=" اربعمائة"     ;
break;
case "5" : $arb[2]=" خمسمائة"       ;
break;
case "6" : $arb[2]=" ستمائة"         ;
break;
case "7" : $arb[2]=" سبعمائة"         ;
break;
case "8" : $arb[2]=" ثمانمائة"         ;
break;
case "9" : $arb[2]=" تسعمائة"           ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[2]=" "      ;
break;
case "1" : $arb[2]=" ومائة"    ;
break;
case "2" : $arb[2]=" ومائتان"    ;
break;
case "3" : $arb[2]=" وثلاثمائة"    ;
break;
case "4" : $arb[2]=" واربعمائة"     ;
break;
case "5" : $arb[2]=" وخمسمائة"       ;
break;
case "6" : $arb[2]=" وستمائة"         ;
break;
case "7" : $arb[2]=" وسبعمائة"         ;
break;
case "8" : $arb[2]=" وثمانمائة"         ;
break;
case "9" : $arb[2]=" وتسعمائة"           ;
break;
}
}

if ($i == 3)
{
if($j==4)
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" ألف"    ;
break;
case "2" : $arb[$i]=" ألفان"    ;
break;
case "3" : $arb[$i]=" ثلاثة آلاف"    ;
break;
case "4" : $arb[$i]=" اربعة آلاف"     ;
break;
case "5" : $arb[$i]=" خمسة آلاف"       ;
break;
case "6" : $arb[$i]=" ستة آلاف"         ;
break;
case "7" : $arb[$i]=" سبعة آلاف"         ;
break;
case "8" : $arb[$i]=" ثمانية آلاف "         ;
break;
case "9" : $arb[$i]=" تسعة آلاف "           ;
break;
}
elseif ($j==5)

switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" واحد "    ;
break;
case "2" : if($te[6]=="1") $arb[$i]=" اثنا "; else $arb[$i]=" اثنان" ;
break;
case "3" : $arb[$i]=" ثلاثة "    ;
break;
case "4" : $arb[$i]=" اربعة "     ;
break;
case "5" : $arb[$i]=" خمسة "       ;
break;
case "6" : $arb[$i]=" ستة "         ;
break;
case "7" : $arb[$i]=" سبعة "         ;
break;
case "8" : $arb[$i]=" ثمانية "         ;
break;
case "9" : $arb[$i]=" تسعة "           ;
}

else
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" وواحد "    ;
break;
case "2" : if($te[4]=="1") $arb[$i]=" واثنا "; else $arb[$i]=" واثنان" ;
break;
case "3" : $arb[$i]=" وثلاثة "    ;
break;
case "4" : $arb[$i]=" واربعة "      ;
break;
case "5" : $arb[$i]=" وخمسة "       ;
break;
case "6" : $arb[$i]=" وستة "         ;
break;
case "7" : $arb[$i]=" وسبعة "         ;
break;
case "8" : $arb[$i]=" وثمانية "         ;
break;
case "9" : $arb[$i]=" وتسعة "           ;
}
}
if ($i == 4)
{
if($j==5 )
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : if($te[3]=="1") {$arb[3]=" " ;$arb[4]=" أحد عشر ألفا";} elseif($te[3]=="0")$arb[4]=" عشرة آلاف";else$arb[$i]=" عشر ألفا"    ;
break;
case "2" : $arb[$i]=" عشرون "    ;
break;
case "3" : $arb[$i]=" ثلاثون "    ;
break;
case "4" : $arb[$i]=" اربعون "     ;
break;
case "5" : $arb[$i]=" خمسون "       ;
break;
case "6" : $arb[$i]=" ستون "         ;
break;
case "7" : $arb[$i]=" سبعون "         ;
break;
case "8" : $arb[$i]=" ثمانون "         ;
break;
case "9" : $arb[$i]=" تسعون "           ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : if($te[3]=="1") {$arb[3]=" " ;$arb[4]=" وأحد عشر ألفا";} elseif($te[3]=="0")$arb[4]=" وعشرة آلاف";else$arb[$i]=" عشر ألفا"    ;
break;
case "2" : $arb[$i]=" وعشرون "     ;
break;
case "3" : $arb[$i]=" وثلاثون "    ;
break;
case "4" : $arb[$i]=" واربعون "     ;
break;
case "5" : $arb[$i]=" وخمسون "       ;
break;
case "6" : $arb[$i]=" وستون "         ;
break;
case "7" : $arb[$i]=" وسبعون "         ;
break;
case "8" : $arb[$i]=" وثمانون "         ;
break;
case "9" : $arb[$i]=" وتسعون "           ;
break;
}
}
if ($i == 5)
{
if ($j==6)
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" مائة "    ;
break;
case "2" : $arb[$i]=" مائتان "    ;
break;
case "3" : $arb[$i]=" ثلاثمائة "    ;
break;
case "4" : $arb[$i]=" اربعمائة "     ;
break;
case "5" : $arb[$i]=" خمسمائة "       ;
break;
case "6" : $arb[$i]=" ستمائة "         ;
break;
case "7" : $arb[$i]=" سبعمائة "           ;
break;
case "8" : $arb[$i]=" ثمانمائة "         ;
break;
case "9" : $arb[$i]=" تسعمائة "           ;
break;
}
else
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" ومائة "    ;
break;
case "2" : $arb[$i]=" ومائتان "    ;
break;
case "3" : $arb[$i]=" وثلاثمائة "    ;
break;
case "4" : $arb[$i]=" واربعمائة "     ;
break;
case "5" : $arb[$i]=" وخمسمائة "       ;
break;
case "6" : $arb[$i]=" وستمائة "         ;
break;
case "7" : $arb[$i]=" وسبعمائة "           ;
break;
case "8" : $arb[$i]=" وثمانمائة "         ;
break;
case "9" : $arb[$i]=" وتسعمائة "           ;
break;
}
}

if ($i == 6)
switch($te[$i])
{
case "0" : $arb[$i]=" "      ;
break;
case "1" : $arb[$i]=" مليون "    ;
break;
case "2" : $arb[$i]=" مليونان "    ;
break;
case "3" : $arb[$i]=" ثلاثة ملايين "    ;
break;
case "4" : $arb[$i]=" اربعة ملايين "     ;
break;
case "5" : $arb[$i]=" خمسة ملايين "       ;
break;
case "6" : $arb[$i]=" تة ملايين "         ;
break;
case "7" : $arb[$i]=" سبعة ملايين "           ;
break;
case "8" : $arb[$i]=" ثمانية ملايين "         ;
break;
case "9" : $arb[$i]=" تسعة ملايين "           ;
break;
}
}




if($j>4 && $te[4]!="1")
$arb[4]=$arb[4]." ألف ";


$strarb=$arb[6].$arb[5].$arb[3].$arb[4].$arb[2].$arb[0].$arb[1];
return $strarb;
} 

/*function printFloatWithLeadingZeros($num, $precision = 2, $leadingZeros = 0){
    $decimalSeperator = ".";
    $adjustedLeadingZeros = $leadingZeros + mb_strlen($decimalSeperator) + $precision;
    $pattern = "%0{$adjustedLeadingZeros}{$decimalSeperator}{$precision}f";
    return sprintf($pattern,$num);
}

function NumberToWords($TheNo, $MyCur, $MySubCur) 
{
    $MyArry1 = array();
    $MyArry2 = array();
    $MyArry3 = array();
    $MyNo = '';
    $GetNo = '';
    $RdNo = '';
    $My100 = '';
    $My10 = '';
    $My1 = '';
    $My11 = '';
    $My12 = '';
    $GetTxt = '';
    $Mybillion = '';
    $MyMillion = '';
    $MyThou = '';
    $MyHun = '';
    $MyFraction = '';
    $MyAnd = '';
    $i = 0;
    $Result = '';

    if ($TheNo > 999999999999.999) exit;
    if ($TheNo = 0) {
        $Result = 'صفر';
        exit;
    }

    $MyAnd = ' و';
    $MyArry1[0] ='';
    $MyArry1[1] ='مائة';
    $MyArry1[2] ='مائتان';
    $MyArry1[3] ='ثلاثمائة';
    $MyArry1[4] ='أربعمائة';
    $MyArry1[5] ='خمسمائة';
    $MyArry1[6] ='ستمائة';
    $MyArry1[7] ='سبعمائة';
    $MyArry1[8] ='ثمانمائة';
    $MyArry1[9] ='تسعمائة';

    $MyArry2[0]='';
    $MyArry2[1]=' عشر';
    $MyArry2[2]='عشرون';
    $MyArry2[3]='ثلاثون';
    $MyArry2[4]='أربعون';
    $MyArry2[5]='خمسون';
    $MyArry2[6]='ستون';
    $MyArry2[7]='سبعون';
    $MyArry2[8]='ثمانون';
    $MyArry2[9]='تسعون';

    $MyArry3[0]='';
    $MyArry3[1]='واحد';
    $MyArry3[2]='اثنان';
    $MyArry3[3]='ثلاثة';
    $MyArry3[4]='أربعة';
    $MyArry3[5]='خمسة';
    $MyArry3[6]='ستة';
    $MyArry3[7]='سبعة';
    $MyArry3[8]='ثمانية';
    $MyArry3[9]='تسعة';
    //======================

    $GetNo = printFloatWithLeadingZeros($TheNo, 2, 12);
    $i = 0;
    while ($i < 15) {
    if ($i < 12) $MyNo = substr($GetNo,($i+1),3);
    else $MyNo = '0' . substr($GetNo,($i+2),2);

     if (intval(substr($MyNo,1,3)) > 0) {

     $RdNo = substr($MyNo,1,1);
     $My100 = $MyArry1[intval($RdNo)] ;
     $RdNo = substr($MyNo,3,1);
     $My1 = $MyArry3[intval($RdNo)] ;
     $RdNo = substr($MyNo,2,1);
     $My10 = $MyArry2[intval($RdNo)] ;
     if (intval(substr($MyNo,2,2)) == 11) $My11 =  'إحدى عشر';
     if (intval(substr($MyNo,2,2)) == 12) $My12 ='إثنى عشر' ;
     if (intval(substr($MyNo,2,2)) == 10) $My10 ='عشرة' ;

     if  ((intval(substr($MyNo,1,1)) > 0) && (intval(substr($MyNo,2,2)) > 0)) $My100 = $My100 . $MyAnd;

     if  ((intval(substr($MyNo,3,1)) > 0) && (intval(substr(MyNo,2,1)) > 1)) $My1 = $My1 . $MyAnd;

      $GetTxt = $My100 . $My1 . $My10;

      if ((intval(substr($MyNo,3,1)) == 1) && (intval(substr($MyNo,2,1)) == 1)) {
          $GetTxt = $My100 . $My11;
          if (intval(substr($MyNo,1,1)) == 0) $GetTxt = $My11 ;
      }

      if ((intval(substr($MyNo,3,1)) == 2) && (intval(substr($MyNo,2,1)) == 1)) {
           $GetTxt = $My100 . $My12 ;
           if (intval(substr($MyNo,1,1)) == 0) $GetTxt = $My12 ;
      }

    if (($i == 0) && ($GetTxt != '')) {
        if ((intval(substr($MyNo,1,3)) == 1) || (intval(substr($MyNo,1,3)) > 10 )) $Mybillion = $GetTxt . ' مليار';
        else
        {
        $Mybillion = $GetTxt . ' مليارات';
        if (intval(substr($MyNo,1,3)) == 2) $Mybillion =  ' ملياران';
        }
    }

    if (($i == 3) && ($GetTxt != '')) {
        if ((intval(substr($MyNo,1,3)) == 1) || (intval(substr($MyNo,1,3)) > 10 )) $MyMillion = $GetTxt . ' مليون';
        else {
            $MyMillion = $GetTxt . ' ملايين';
            if (intval(substr($MyNo,1,3)) == 2) $MyMillion =  ' مليونان';
        }
    }

    if (($i == 6) && ($GetTxt != '')) {
        if (intval(substr($MyNo,1,3)) > 10 ) $MyThou = $GetTxt . ' ألف';
        else {
        $MyThou = $GetTxt . ' آلاف';
        if (intval(substr($MyNo,3,1)) == 2) $MyThou =  ' ألفان';
        if (intval(substr($MyNo,3,1)) == 1) $MyThou =  ' ألف';
        }
    }

    if ((i == 9) && ($GetTxt != '')) $MyHun = $GetTxt;
    if ((i == 12) && ($GetTxt != '')) $MyFraction = $GetTxt;
}
    $i = $i + 3;
}

    if ($MyBillion != '') {
     if (($MyMillion != '') || ($MyThou != '') || ($MyHun != '')) $MyBillion = $MyBillion . $MyAnd;
    }

    if ($MyMillion != '') {
     if (($MyThou != '') || ($MyHun != '')) $MyMillion = $MyMillion . $MyAnd;
    }

    if ($MyThou != '') {
     if ($MyHun != '') $MyThou = $MyThou . $MyAnd;
    }

    if ($MyFraction != '') {
      if (($Mybillion != '') || ($MyMillion != '') || ($MyThou != '') || ($MyHun !='')) $Result = $Mybillion . $MyMillion . $MyThou . $MyHun . ' ' . $MyCur . $MyAnd .$MyFraction . ' ' . $MySubCur ;
      else $Result =  $MyFraction . ' ' . $MySubCur;

    } else {
        $Result = $Mybillion .  $MyMillion . $MyThou . $MyHun . ' ' . $MyCur ;
    }
    
}*/
 

?>