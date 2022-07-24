<?php

declare(strict_types=1);

namespace Flow\ETL\DSL;

use Flow\ETL\Adapter\Text\TextExtractor;
use Flow\ETL\Adapter\Text\TextLoader;
use Flow\ETL\Extractor;
use Flow\ETL\Filesystem\Path;
use Flow\ETL\Loader;

class Text
{
    /**
     * @param array<Path|string>|Path|string $path
     * @param int $rows_in_batch
     * @param string $row_entry_name
     *
     * @return Extractor
     */
    final public static function from(
        string|Path|array $path,
        int $rows_in_batch = 1000,
        string $row_entry_name = 'row'
    ) : Extractor {
        if (\is_array($path)) {
            $extractors = [];

            foreach ($path as $file_path) {
                $extractors[] = new TextExtractor(
                    \is_string($file_path) ? Path::realpath($file_path) : $file_path,
                    $rows_in_batch,
                    $row_entry_name,
                );
            }

            return new Extractor\ChainExtractor(...$extractors);
        }

        return new TextExtractor(
            \is_string($path) ? Path::realpath($path) : $path,
            $rows_in_batch,
            $row_entry_name,
        );
    }

    /**
     * @param Path|string $path
     * @param bool $safe_mode - when set to true, stream or destination path will be used as a directory and output is going to be written into randomly generated file name
     * @param string $new_line_separator
     *
     * @return Loader
     */
    final public static function to(
        string|Path $path,
        bool $safe_mode = false,
        string $new_line_separator = PHP_EOL
    ) : Loader {
        return new TextLoader(
            \is_string($path) ? Path::realpath($path) : $path,
            $safe_mode,
            $new_line_separator
        );
    }
}
