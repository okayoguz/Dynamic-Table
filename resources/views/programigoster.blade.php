<?php

for($i=0;$i<5; $i++){
    for($j=0;$j<5; $j++){
        $hafta[$i][$j]['title']=' ';
        $hafta[$i][$j]['rdescription']=' ';

    }
}
foreach ($a as $row){
    $hafta[$row->hourOfDay-1][$row->dayOfWeek-1] = array('title'=>$a->title,'rdescription'=>$a->rdescription);
//echo "<pre>"; print_r($hafta); echo "</pre>";

}

echo "<table> <thead> <th>Saat</th> <th>Pzt</th> <th>Salı</th> <th>Çarş</th> <th>Perş</th> <th>Cuma</th>	</thead>
<tbody>";
$i=9;
foreach($hafta as $saat){
    echo "<tr> <th>$i</th>
			<td>{$saat[0]['title']}-{$saat[0]['rdescription']}</td>
			<td>{$saat[1]['title']}-{$saat[1]['rdescription']}</td>
			<td>{$saat[2]['title']}-{$saat[2]['rdescription']}</td>
			<td>{$saat[3]['title']}-{$saat[3]['rdescription']}</td>
			<td>{$saat[4]['title']}-{$saat[4]['rdescription']}</td>
			</tr>";
    $i++;
}
echo "</tbody></table>";