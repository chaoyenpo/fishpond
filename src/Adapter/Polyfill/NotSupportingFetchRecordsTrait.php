<?php

namespace Gamesmkt\Fishpond\Adapter\Polyfill;

use Gamesmkt\Fishpond\Exception\NotSupportingException;

trait NotSupportingFetchRecordsTrait
{
    /**
     * 透過時間抓取紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param \DateTime $start
     * @param \DateTime $end
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @throws \Gamesmkt\Fishpond\Exception\NotSupportingException
     */
    public function fetchRecords(TypeInterface $type, DateTime $start, DateTime $end, Config $config)
    {
        throw new NotSupportingException(
            get_class($this) . ' does not support fetch records. Type:' . $type
        );
    }
}
