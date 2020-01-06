<?php

namespace Gamesmkt\Fishpond;

interface TransactionInterface
{
    const METHOD_DEPOSIT = 1;

    const METHOD_WITHDRAW = 2;

    const STATUS_PENDDING = 1;

    const STATUS_COMPLETE = 2;

    const STATUS_FAILED = 3;

    const STATUS_ERROR = 4;

    public function getMethod();

    public function getUser();

    public function getId();

    public function getAmount();

    public function getStatus();

    public function withStatus($status);
}
