<?php declare(strict_types=1);

namespace Flow\Parquet\Tests\Unit\ParquetFile\Page;

use Flow\Parquet\ParquetFile\Page\ColumnData;
use Flow\Parquet\ParquetFile\Schema\PhysicalType;
use PHPUnit\Framework\TestCase;

final class ColumnDataTest extends TestCase
{
    public function test_split_last_row_for_flat_column() : void
    {
        $repetitions = [];
        $definitions = [1, 0, 1, 0, 1, 0, 1, 0, 1, 0];
        $values = [0, 2, 4, 6, 8, null, null, null, null, null];

        $columnData = new ColumnData(PhysicalType::INT32, null, $repetitions, $definitions, $values);

        $this->assertEquals(
            new ColumnData(
                PhysicalType::INT32,
                null,
                [],
                [1, 0, 1, 0, 1, 0, 1, 0, 1, 0],
                [0, 2, 4, 6, 8, null, null, null, null, null]
            ),
            $columnData->splitLastRow()[0]
        );

        $this->assertEquals(
            new ColumnData(
                PhysicalType::INT32,
                null,
                [],
                [],
                []
            ),
            $columnData->splitLastRow()[1]
        );
    }

    public function test_splitting_last_row() : void
    {
        $repetitions = [0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 1];
        $definitions = [3, 3, 2, 2, 3, 3, 2, 3, 3, 2, 2, 2, 2, 3, 3, 2, 2, 3, 2, 2, 3, 2];
        $values = [10, 7, 9, 8, 9, 4, 6, 3, 10, 8];

        $columnData = new ColumnData(PhysicalType::INT32, null, $repetitions, $definitions, $values);

        $this->assertEquals(
            new ColumnData(
                PhysicalType::INT32,
                null,
                [0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 1],
                [3, 3, 2, 2, 3, 3, 2, 3, 3, 2, 2, 2, 2, 3, 3, 2, 2, 3, 2, 2],
                [10, 7, 9, 8, 9, 4, 6, 3, 10]
            ),
            $columnData->splitLastRow()[0]
        );

        $this->assertEquals(
            new ColumnData(
                PhysicalType::INT32,
                null,
                [0, 1],
                [3, 2],
                [8]
            ),
            $columnData->splitLastRow()[1]
        );
    }

    public function test_splitting_map_rows() : void
    {
        $repetitions = [0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0];
        $definitions = [3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0];
        $values      = [5, 7, 10, 3, 1, 6, 7, 9, 8, 3, 8, 8, 3, 2, 10, 4, 8, 4, 3, 10, 4, 10, 10, 5, 4, 4, 4, 9, 7, 8, 8, 6, 6, 5, 8, 2, 2, 2, 6, 10, 3, 9, 5, 3, 1, 2, 10, 3, 2, 10, 9, 10, 6, 3, 1, 3, 2, 5, 8, 3, 9, 4, 6, 5, 6, 6, 2, 1, 5, 7, 6, 6, 2, 1, 9, 9, 2, 2, 2, 6, 7, 10, 2, 7, 9, 9, 9, 2, 1, 4, 7, 3, 10, 6, 5, 6, 10, 6, 4, 1, 7, 9, 7, 3, 2, 3, 9, 10, 9, 7, 1, 8, 9, 10, 2, 1, 6, 2, 1, 3, 1, 1, 6, 5, 8, 7, 2, 7, 4, 6, 10, 5, 8, 5, 9, 3, 2, 6, 8, 2, 3, 5, 4, 8, 7, 4, 8, 8, 3, 9];

        $columnData = new ColumnData(PhysicalType::INT32, null, $repetitions, $definitions, $values);

        $this->assertEquals(
            new ColumnData(
                PhysicalType::INT32,
                null,
                [0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1],
                [3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3, 0, 3, 3, 3],
                [5, 7, 10, 3, 1, 6, 7, 9, 8, 3, 8, 8, 3, 2, 10, 4, 8, 4, 3, 10, 4, 10, 10, 5, 4, 4, 4, 9, 7, 8, 8, 6, 6, 5, 8, 2, 2, 2, 6, 10, 3, 9, 5, 3, 1, 2, 10, 3, 2, 10, 9, 10, 6, 3, 1, 3, 2, 5, 8, 3, 9, 4, 6, 5, 6, 6, 2, 1, 5, 7, 6, 6, 2, 1, 9, 9, 2, 2, 2, 6, 7, 10, 2, 7, 9, 9, 9, 2, 1, 4, 7, 3, 10, 6, 5, 6, 10, 6, 4, 1, 7, 9, 7, 3, 2, 3, 9, 10, 9, 7, 1, 8, 9, 10, 2, 1, 6, 2, 1, 3, 1, 1, 6, 5, 8, 7, 2, 7, 4, 6, 10, 5, 8, 5, 9, 3, 2, 6, 8, 2, 3, 5, 4, 8, 7, 4, 8, 8, 3, 9]
            ),
            $columnData->splitLastRow()[0]
        );

        $this->assertEquals(
            new ColumnData(
                PhysicalType::INT32,
                null,
                [0],
                [0],
                []
            ),
            $columnData->splitLastRow()[1]
        );
    }
}
