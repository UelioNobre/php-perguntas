<?php

interface IPergunta
{
  public function show();
  public function addAlternativa($alternativa);
  public function waitAwswer();
  public function verify();
}
