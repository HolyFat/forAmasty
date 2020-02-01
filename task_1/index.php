<?php


class First
{
    public function getClassname(){
        echo get_class($this) , "\n";
    }

    function MyProtected() {
        echo "A\n";
    }

}

class Second extends First
{
    function MyProtected() {
        echo "B\n";
    }

}