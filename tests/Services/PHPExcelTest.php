<?php
namespace Services;

use PHPExcel;
use PHPUnit\Framework\TestCase;

final class PHPExcelTest extends TestCase
{
    //Création d'un fichier Excel ?
    public function testCanBeCreated()
    {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
    }
}