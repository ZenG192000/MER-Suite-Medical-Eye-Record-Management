<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Spreadsheet
{
    protected $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
    }

    public function setProperties($creator, $lastModifiedBy, $title, $subject, $description)
    {
        $this->spreadsheet->getProperties()
            ->setCreator($creator)
            ->setLastModifiedBy($lastModifiedBy)
            ->setTitle($title)
            ->setSubject($subject)
            ->setDescription($description);
    }

    public function setCellValue($cell, $value)
    {
        $this->spreadsheet->getActiveSheet()->setCellValue($cell, $value);
    }

    public function fromArray($array, $nullValue, $startCell)
    {
        $this->spreadsheet->getActiveSheet()->fromArray($array, $nullValue, $startCell);
    }

    public function save($filename)
    {
        $writer = new Xlsx($this->spreadsheet);
        $writer->save($filename);
    }
}
