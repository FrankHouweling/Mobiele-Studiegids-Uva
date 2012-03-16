
        <div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" >
			
			
                     <?php foreach($programName as $studie): ?>

                    <li><a href="../../../ziestudie/studie/<?php echo $studie['id']?>"><?php echo $studie['programName']?> (<?php echo $studie['degree']?>)</a></li>

                    <?php endforeach; ?>
            </ul>
		
        </div>
