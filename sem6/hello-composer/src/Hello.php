<?php

namespace Uph\Hello;

class Hello {
    private string $nama;

    public function __construct(string $nama) {
        $this->nama = $nama;
    }

    public function sayHello() {
        echo $this->nama . ": Hello";
    }
}