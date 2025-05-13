<?php

namespace Unisa\BasalamProxy\Constants;
use BenSampo\Enum\Enum;

class BasalamCancelOrderReasonEnums extends Enum
{
    const OUT_OF_STOCK = 3474;
    const PERSONAL_PROBLEMS = 3481;
    const CHANGE_PRICE = 3473;
    const SHIPPING_COST = 3573;
    const POST_LIMIT = 3479;
}
