<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>//TODO</title>


    <HEADERCSS/>
    <HEADERJS/>
    

</head>
<body id="top">







<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> <?= $this->drawRoute("statictext", "block", ["conf" => "static", "sec" => "top_phone"]) ?></li>
        <li><i class="fa fa-envelope-o"></i> <?= $this->drawRoute("statictext", "block", ["conf" => "static", "sec" => "top_email"]) ?></li>
      </ul>
    </div>
    <div class="fl_right">



    <?= $this->drawRoute("login", "displayButton") ?>


    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="/">Pleeness</a></h1>
    </div>
    <div id="search" class="fl_right">
      <form class="clear" method="post" action="/article/SearchArticle">
        <fieldset>
          <legend>Search:</legend>
          <input type="search" name="text" value="" placeholder="Search Here&hellip;">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->

    <?= $this->drawRoute("menu", "byName", ["name" => "Top_menu"]) ?>

    <!-- ################################################################################################ -->
  </nav>
</div>
