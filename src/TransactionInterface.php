<?php

namespace Gamesmkt\Fishpond;

interface TransactionInterface
{
    const METHOD_DEPOSIT = 1;

    const METHOD_WITHDRAW = 2;

    /**
     * 1. 認 `COMPLETE` 跟 `FAILD` 的狀態
     * 2. 把網路異常當 `PENDING`
     * 3. 其他不認得的狀態是 `ERROR` 狀態？
     */
    const STATUS_PENDING = 1;

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
