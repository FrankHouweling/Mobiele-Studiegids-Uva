
		
		<div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" >
                     
                     <?php foreach($programName as $studie): ?>

                    <li><a href="../../ziestudie/studie/<?=$studie['id']?>"><?=$studie['programName']?>  <span class="ui-li-count"><?php echo $studie['degree']?></span></a></li>

                    <?php endforeach; ?>
                    
            </ul>
		
        </div>
