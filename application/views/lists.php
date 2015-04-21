<meta charset="utf-8">
<html>
	<head>
		<title>Codeigniter test</title>
	</head>
	<body>
		<table>
			<tr>
				<td>번호</td>
				<td>내용</td>
			</tr>
			<?php foreach($list as $listitem): ?>
				<tr>
					<td><?=$listitem['no']?></td>
					<td><?=anchor('dbtest/view/'.$listitem['no'],$listitem['content'])?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>