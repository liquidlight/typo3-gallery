<?php

namespace LiquidLight\MediaGallery\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class AssetProcessor implements DataProcessorInterface
{
	public function process(
		ContentObjectRenderer $cObj,
		array $contentObjectConfiguration,
		array $processorConfiguration,
		array $processedData
	): array {
		$engine = $processedData['flexform']['engine'] ?? false;
		$config = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['media_gallery']['engines'][$engine] ?? false;

		if (!$engine || !$config) {
			return $processedData;
		}

		$config['identifier'] = $engine;

		$processedData['engine'] = $config;

		return $processedData;
	}
}
