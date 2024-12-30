<?php

namespace Jvdh\ProductExpectedDeliveryDays\Model\Handler;

use Magento\Catalog\Helper\Output as HelperOutput;
use Magento\Framework\Phrase;

/**
 * Handles expected delivery days attribute formatting for products.
 */
class Output
{
    /**
     * Converts numeric days into a human-readable string (days or weeks).
     *
     * @param  int $days Numeric delivery time in days.
     * @return Phrase    Formatted phrase, e.g., "2 weeks" or "3 days".
     */
    public function convertValue(int $days): Phrase
    {
        // Validate input
        if ($days <= 0) {
            return new Phrase(__('Invalid delivery time'));
        }

        // Determine unit and quantity
        $isMultipleOfSeven = $days % 7 === 0;
        $quantity = $isMultipleOfSeven ? $days / 7 : $days;
        $unit = $isMultipleOfSeven
            ? ($quantity > 1 ? __('weeks') : __('week'))
            : ($quantity > 1 ? __('days') : __('day'));

        return new Phrase('%1 %2', [$quantity, $unit]);
    }

    /**
     * Modifies the rendering of the "custom_expected_delivery_days" attribute.
     *
     * @param  HelperOutput $output        Magento catalog output helper.
     * @param  string|null  $attributeHtml Original attribute HTML value.
     * @param  array        $params        Additional params (including attribute name).
     * @return string                      Formatted output or original HTML.
     */
    public function productAttribute(HelperOutput $output, ?string $attributeHtml, array $params): string
    {
        // Check if this is the targeted attribute
        if ($params['attribute'] !== 'custom_expected_delivery_days') {
            return (string) $attributeHtml;
        }

        // If the attribute is empty, return empty string
        if (empty($attributeHtml)) {
            return '';
        }

        // Con
