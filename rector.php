<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\PHPOffice\Rector\StaticCall\AddRemovedDefaultValuesRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [__DIR__ . '/tests']);
    $services = $containerConfigurator->services();

    // this rule is causing troubles
    $services->set(AddRemovedDefaultValuesRector::class);

    $services->set(RenameClassRector::class)
        ->call('configure', [[
            RenameClassRector::OLD_TO_NEW_CLASSES => [
                'PHPExcel' => 'PhpOffice\PhpSpreadsheet\Spreadsheet',
            ]
        ]]);
};
