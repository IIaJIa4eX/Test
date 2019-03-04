this is block article
<ul class="nospace group">
        <?php 
        
            $isFirst = true;
            $i = 0;
            foreach($MODEL["articles"] as $v) : 

            if ($i >= 6) break;
        ?>
            <li class="one_third <?= $isFirst ? "first" : "" ?>">
                <article class="element">
                <figure><img src="images/demo/320x210.png" alt="">
                    <figcaption><a href="#"><i class="fa fa-eye"></i></a></figcaption>
                </figure>
                <div class="excerpt">
                    <h6 class="heading"><?= $v["name"] ?></h6>
                    <time datetime="2045-04-05"><?= $v["create_date"] ?></time>
                    <p>
                        <?= $v["short_text"] ?>
                    </p>
                    <footer><a href="/article/one/<?= $v["id"] ?>">Read More &raquo;</a></footer>
                </div>
                </article>
            </li>
        <?php $isFirst = false; $i++; endforeach; ?>
    </ul>