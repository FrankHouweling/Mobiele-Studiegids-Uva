<div class="datalist">
			<ul data-role="listview" data-inset="true" data-filter="true" >
                     <?php foreach($faculty_name as $faculteit): ?>

                    <li><a href="#"><?=$faculteit['faculty_name']?></a></li>

                    <?php endforeach; ?>
            </ul>
		
        </div>
