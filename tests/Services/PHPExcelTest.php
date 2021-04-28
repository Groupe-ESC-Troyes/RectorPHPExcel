<?php
namespace Services;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPUnit\Framework\TestCase;

final class PHPExcelTest extends TestCase
{
    //Création d'un fichier Excel ?
    public function testCanBeCreated()
    {
        $objPHPExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    }
}