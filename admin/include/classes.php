<?php

class Body
{
    public $name;

    function ShowName($name)
    {
        $this->name = $name;
    }
    function setName()
    {
        return $this->name;
    }
}
$shower = new Body();
$secShow = new Body();
$showname = $shower->ShowName('Youtube Friends');
$secShoName = $secShow->ShowName('Youtube Second Name');

echo $shower->setName();
echo '<br>';
echo $secShow->setName();
