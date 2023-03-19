<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Cast;

use Flow\ETL\Transformer\Cast\EntryCaster\AnyToFloatEntryCaster;

final class CastToFloat extends CastEntries
{
    /**
     * @param array<string> $entryNames
     */
    public function __construct(array $entryNames, bool $nullable = false)
    {
        parent::__construct($entryNames, new AnyToFloatEntryCaster(), $nullable);
    }

    /**
     * @param array<string> $entryNames
     */
    public static function nullable(array $entryNames) : self
    {
        return new self($entryNames, true);
    }
}
