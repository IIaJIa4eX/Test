    <ul class="nospace group">
        <?php 
        
            $isFirst = true;
            $i = 0;
            foreach($MODEL["items"] as $v) : 

            if ($i >= 3) break;
        ?>
            <li class="one_third <?= $isFirst ? "first" : "" ?>">
                <article class="element">
                <figure><img src="images/demo/320x210.png" alt="">
                    <figcaption><a href="#"><i class="fa fa-eye"></i></a></figcaption>
                </figure>
                <div class="excerpt">
                    <h6 class="heading"><?= $v["header"] ?></h6>
                    <time datetime="2045-04-05"><?= $v["create_date"] ?></time>
                    <p>
                        <?= $v["text"] ?>
                    </p>
                    <footer><a href="#">Read More &raquo;</a></footer>
                </div>
                </article>
            </li>
        <?php $isFirst = false; $i++; endforeach; ?>
    </ul>