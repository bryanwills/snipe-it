<?php

namespace App\Models\Labels\Tapes\Dymo;


use App\Helpers\Helper;

class LabelWriter_11354 extends LabelWriter
{
    private const BARCODE1D_HEIGHT =   3.00;
    private const BARCODE_MARGIN   =   1.80;
    private const TAG_SIZE         =   2.80;
    private const TITLE_SIZE       =   2.80;
    private const TITLE_MARGIN     =   0.50;
    private const FIELD_SIZE       =   2.80;
    private const FIELD_MARGIN     =   0.15;
    private const LABEL_SIZE       = 2.8;
    private const LABEL_MARGIN     = 0.6;

    public function getUnit()
    {
        return 'mm'; 
    }
    public function getWidth()
    {
        return 57; 
    }
    public function getHeight()
    {
        return 32; 
    }
    public function getSupportAssetTag()
    {
        return true; 
    }
    public function getSupport1DBarcode()
    {
        return true; 
    }
    public function getSupport2DBarcode()
    {
        return true; 
    }
    public function getSupportFields()
    {
        return 5; 
    }
    public function getSupportLogo()
    {
        return false; 
    }
    public function getSupportTitle()
    {
        return true; 
    }
    public function preparePDF($pdf)
    {
    }
	
    public function write($pdf, $record)
    {
        $pa = $this->getPrintableArea();

        $currentX = $pa->x1;
        $currentY = $pa->y1;
        $usableWidth = $pa->w;
        $usableHeight = $pa->h;
        
        // Wide 1D barcode on top
        if ($record->has('barcode1d')) {
            static::write1DBarcode(
                $pdf, $record->get('barcode1d')->content, $record->get('barcode1d')->type,
                $currentX, $currentY, $usableWidth, self::BARCODE1D_HEIGHT
            );
            $currentY += self::BARCODE1D_HEIGHT + self::BARCODE_MARGIN;
            $usableHeight -= self::BARCODE1D_HEIGHT + self::BARCODE_MARGIN;
        }

        // 2D Barcode in left column
        if ($record->has('barcode2d')) {
            $barcodeSize = $usableHeight - self::TAG_SIZE;
            
            static::writeText(
                $pdf, $record->get('tag'),
                $currentX, $pa->y2 - self::TAG_SIZE,
                'freesans', 'b', self::TAG_SIZE, 'C',
                $barcodeSize, self::TAG_SIZE, true, 0
            );
            static::write2DBarcode(
                $pdf, $record->get('barcode2d')->content, $record->get('barcode2d')->type,
                $currentX, $currentY,
                $barcodeSize, $barcodeSize
            );
            $currentX += $barcodeSize + self::BARCODE_MARGIN;
            $usableWidth -= $barcodeSize + self::BARCODE_MARGIN;
        }

        // Right column
        if ($record->has('title')) {
            static::writeText(
                $pdf, $record->get('title'),
                $currentX, $currentY,
                'freesans', 'b', self::TITLE_SIZE, 'L',
                $usableWidth, self::TITLE_SIZE, true, 0
            );
            $currentY += self::TITLE_SIZE + self::TITLE_MARGIN;
        }

        $fields = $record->get('fields');

        $field_layout = Helper::labelFieldLayoutScaling(
            pdf: $pdf,
            fields: $fields,
            currentX: $currentX,
            usableWidth: $usableWidth,
            usableHeight: $usableHeight,
            baseLabelSize: self::LABEL_SIZE,
            baseFieldSize: self::FIELD_SIZE,
            baseFieldMargin: self::FIELD_MARGIN,
            baseLabelPadding: 1.5,
            baseGap: 1.5,
            maxScale: 1.8,
            labelFont: 'freesans',
        );

        foreach ($fields as $field) {
            static::writeText(
                $pdf, $field['label'],
                $currentX, $currentY,
                'freesans', '', $field_layout['labelSize'], 'L',
                $field_layout['labelWidth'], $field_layout['rowAdvance'], true, 0
            );

            static::writeText(
                $pdf, $field['value'],
                $field_layout['valueX'], $currentY,
                'freemono', 'B', $field_layout['fieldSize'], 'L',
                $field_layout['valueWidth'], $field_layout['rowAdvance'], true, 0, 0.01
            );
            $currentY += $field_layout['rowAdvance'];
        }
    }

}