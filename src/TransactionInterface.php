<?php

namespace Gamesmkt\Fishpond;

interface TransactionInterface
{
    public function getMethod();

    public function getName();

    public function getId();

    public function getAmount();

    public function getStatus();

    public function withStatus($status);
}
