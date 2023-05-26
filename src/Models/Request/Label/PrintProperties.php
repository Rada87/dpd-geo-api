<?php

namespace Rada87\DpdGeoApi\Models\Request\Label;

use Rada87\DpdGeoApi\Models\AModelRequest;
class PrintProperties extends AModelRequest {
    /**
     * @var string
     */
    public $pageSize;

    /**
     * @var int
     */
    public $labelsPerPage;
    /**
     * @var int
     */
    public $labelsOffset;
}
