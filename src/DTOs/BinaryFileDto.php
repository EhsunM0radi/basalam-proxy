<?php

namespace Unisa\BasalamProxy\DTOs;

use BasalamSDK\Model\UserUploadFileTypeEnum;
use SplFileObject;

class BinaryFileDto
{
    public function __construct(
        public readonly SplFileObject $file,
        public readonly string $file_type,
    ) {}
}
