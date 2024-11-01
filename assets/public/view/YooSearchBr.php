<?php

if ($yoobar_serach_boxdesign == 'Three')
{
    if ($yoobar_serach_btndesign == 'Icon')
    {
        $yooicclass = 'iconclassyooothree';
    }
    else
    {
        $yooicclass = 'iconclasstextthree';
    }
    $yoowrapper = 'yoowrapperthree';
}
else
{
    $yooicclass = '';
    $yoowrapper = '';
}

if ($yoobar_serach_boxdesign == 'Two')
{
    if ($yoobar_serach_btndesign == 'Icon')
    {
        $yooicclass = 'iconclassyoootwo';
    }
    else
    {
        $yooicclass = 'iconclasstexttwo';
    }

    $yoowrapper = 'yoowrappertwo';
}

if ($yoobar_serach_boxdesign == 'One')
{
    if ($yoobar_serach_btndesign == 'Icon')
    {
        $yooicclass = 'iconclassyooo';
    }
    else
    {
        $yooicclass = 'iconclasstext';
    }
    $yoowrapper = 'yoowrapperone';
}
$yoosrachbuttonicon = '<svg fill="none" height="24" stroke="' . $yoobar_serach_btncolor . '" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="10.5" cy="10.5" r="7.5"/><line x1="21" x2="15.8" y1="21" y2="15.8"/></svg>';

if ($yoobar_serach_btndesign == 'Icon')
{
    $yoosrachbutton = $yoosrachbuttonicon;

}
else
{
    $yoosrachbutton = $yoobar_serach_btntext;

}

$yoo_Search_bar = '<form role="search" method="get" id="' . $yoowrapper . '" action="' . home_url('/') . '" class="yoobarSrachbar">
<div>
<input type="text" value="' . get_search_query() . '" name="s" id="' . $yooicclass . '" class="ybarSarchinput" placeholder="' . $yoobar_serach_placehol . '" style="color:' . $yoobar_serach_color . '"/>

<button type="submit" class="ybarSarchsubmit ' . $yooicclass . '" id="searchsubmit" style="color:' . $yoobar_serach_btncolor . ';background:' . $yoobar_serach_btnbg . '">' . $yoosrachbutton . '</button>

</div>
       </form><style>form#yoowrappertwo input.ybarSarchinput,form#yoowrapperthree input.ybarSarchinput {  border: 2px solid ' . $yoobar_serach_color . ';}form#yoowrapperone input.ybarSarchinput, form#yoowrapperone .yoobarSrachbar input[type=text] {
   border-bottom: 1.5px solid ' . $yoobar_serach_color . '!important;
       } input.ybarSarchinput::-webkit-input-placeholder{
         color:' . $yoobar_serach_color . '}input.ybarSarchinput::-moz-placeholder{
         color:' . $yoobar_serach_color . '}input.ybarSarchinput:-ms-input-placeholder{
         color:' . $yoobar_serach_color . '}input.ybarSarchinput::placeholder{
         color:' . $yoobar_serach_color . '}div#Searchbox{background: #dffbbf;}</style>';
