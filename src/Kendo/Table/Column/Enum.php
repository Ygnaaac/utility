<?php
/**
 * This file is part of riesenia/utility package.
 *
 * Licensed under the MIT License
 * (c) RIESENIA.com
 */

declare(strict_types=1);

namespace Riesenia\Utility\Kendo\Table\Column;

/**
 * Enumeration column.
 *
 * @author Tomas Saghy <segy@riesenia.com>
 */
class Enum extends Base
{
    /**
     * Construct the column.
     *
     * @param array  $options
     * @param string $tableId
     */
    public function __construct(array $options, string $tableId)
    {
        $this->_template = '<td class="%class%" style="%style%">';

        if (isset($options['options'])) {
            foreach ($options['options'] as $key => $value) {
                $this->_template .= '# if (%field%.toString() == ' . \json_encode($key) . ') { # ' . \htmlspecialchars($value) . ' # } #';
            }
            unset($options['options']);
        }

        $this->_template .= '</td>';

        parent::__construct($options, $tableId);
    }
}
