<?
//�ҡ�ա�����¡������µç
if (eregi("config.in.php",$PHP_SELF)) {
    Header("Location: ../index.php");
    die();
}

$DAY_FULL_TEXT = array(
"Sunday" => "�ҷԵ��",
"Monday" => "�ѹ���",
"Tuesday" => "�ѧ���",
"Wednesday" => "�ظ",
"Thursday" => "����ʺ��",
"Friday" => "�ء��",
"Saturday" => "�����"
);

$DAY_SHORT_TEXT = array(
"Sunday" => "��.",
"Monday" => "�.",
"Tuesday" => "�.",
"Wednesday" => "�.",
"Thursday" => "��.",
"Friday" => "�.",
"Saturday" => "�."
);

$FULL_MONTH = array(
"1" => "Jan",
"2" => "Feb",
"3" => "Mar",
"4" => "Apr",
"5" => "May",
"6" => "Jun",
"7" => "Jul",
"8" => "Aug",
"9" => "Sep",
"10" => "Oct",
"11" => "Nov",
"12" => "Dec"
);

$FULL_MONTH_OLD = array(
"1" => "January",
"2" => "February",
"3" => "March",
"4" => "April",
"5" => "May",
"6" => "June",
"7" => "July",
"8" => "August",
"9" => "September",
"10" => "October",
"11" => "November",
"12" => "December"
);

$FULL_MONTH55= array(
"1" => "���Ҥ�",
"2" => "����Ҿѹ��",
"3" => "�չҤ�",
"4" => "����¹",
"5" => "����Ҥ�",
"6" => "�Զع�¹",
"7" => "�á�Ҥ�",
"8" => "�ԧ�Ҥ�",
"9" => "�ѹ��¹",
"10" => "���Ҥ�",
"11" => "��Ȩԡ�¹",
"12" => "�ѹ�Ҥ�"
);

$FULL_MONTH2 = array(
"01" => "���Ҥ�",
"02" => "����Ҿѹ��",
"03" => "�չҤ�",
"04" => "����¹",
"05" => "����Ҥ�",
"06" => "�Զع�¹",
"07" => "�á�Ҥ�",
"08" => "�ԧ�Ҥ�",
"09" => "�ѹ��¹",
"10" => "���Ҥ�",
"11" => "��Ȩԡ�¹",
"12" => "�ѹ�Ҥ�"
);

?>