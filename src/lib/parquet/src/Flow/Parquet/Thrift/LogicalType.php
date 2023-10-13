<?php declare(strict_types=1);
namespace Flow\Parquet\Thrift;

/**
 * Autogenerated by Thrift Compiler (0.19.0).
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;

/**
 * LogicalType annotations to replace ConvertedType.
 *
 * To maintain compatibility, implementations using LogicalType for a
 * SchemaElement must also set the corresponding ConvertedType (if any)
 * from the following table.
 */
class LogicalType extends TBase
{
    public static $_TSPEC = [
        1 => [
            'var' => 'STRING',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\StringType',
        ],
        2 => [
            'var' => 'MAP',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\MapType',
        ],
        3 => [
            'var' => 'LIST',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\ListType',
        ],
        4 => [
            'var' => 'ENUM',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\EnumType',
        ],
        5 => [
            'var' => 'DECIMAL',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\DecimalType',
        ],
        6 => [
            'var' => 'DATE',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\DateType',
        ],
        7 => [
            'var' => 'TIME',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\TimeType',
        ],
        8 => [
            'var' => 'TIMESTAMP',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\TimestampType',
        ],
        10 => [
            'var' => 'INTEGER',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\IntType',
        ],
        11 => [
            'var' => 'UNKNOWN',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\NullType',
        ],
        12 => [
            'var' => 'JSON',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\JsonType',
        ],
        13 => [
            'var' => 'BSON',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\BsonType',
        ],
        14 => [
            'var' => 'UUID',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Flow\Parquet\Thrift\UUIDType',
        ],
    ];

    public static $isValidate = false;

    /**
     * @var \Flow\Parquet\Thrift\BsonType
     */
    public $BSON;

    /**
     * @var \Flow\Parquet\Thrift\DateType
     */
    public $DATE;

    /**
     * @var \Flow\Parquet\Thrift\DecimalType
     */
    public $DECIMAL;

    /**
     * @var \Flow\Parquet\Thrift\EnumType
     */
    public $ENUM;

    /**
     * @var \Flow\Parquet\Thrift\IntType
     */
    public $INTEGER;

    /**
     * @var \Flow\Parquet\Thrift\JsonType
     */
    public $JSON;

    /**
     * @var \Flow\Parquet\Thrift\ListType
     */
    public $LIST;

    /**
     * @var \Flow\Parquet\Thrift\MapType
     */
    public $MAP;

    /**
     * @var \Flow\Parquet\Thrift\StringType
     */
    public $STRING;

    /**
     * @var \Flow\Parquet\Thrift\TimeType
     */
    public $TIME;

    /**
     * @var \Flow\Parquet\Thrift\TimestampType
     */
    public $TIMESTAMP;

    /**
     * @var \Flow\Parquet\Thrift\NullType
     */
    public $UNKNOWN;

    /**
     * @var \Flow\Parquet\Thrift\UUIDType
     */
    public $UUID;

    public function __construct($vals = null)
    {
        if (\is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'LogicalType';
    }

    public function read($input)
    {
        return $this->_read('LogicalType', self::$_TSPEC, $input);
    }

    public function write($output)
    {
        return $this->_write('LogicalType', self::$_TSPEC, $output);
    }
}