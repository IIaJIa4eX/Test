<?php


class menu_item extends ActivRecord {

    public $id;
    public $category_id;
    public $name;
    public $url;
    public $description;
    public $parent_id;

    /**
     * @var menu_category
     */
    public $Category;
    /**
     * @var menu_item
     */
    public $Parent;
}

class test  {
    function fff () {
        $db->menu_items()->where(f => f.id = 4);

        $m = new menu_item();
        $m->id = 4;
        $m->save();
    }
}