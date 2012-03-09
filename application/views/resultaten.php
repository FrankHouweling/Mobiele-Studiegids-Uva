
        <div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" >
			
			
                     <?php foreach($programName as $studie): ?>

                    <li><a href="../../../ziestudie/studie/<?=$studie['id']?>"><?=$studie['programName']?></a></li>

                    <?php endforeach; ?>
            </ul>
		
        </div>
