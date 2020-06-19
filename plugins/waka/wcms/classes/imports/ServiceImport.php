<?php

namespace Waka\Wcms\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use System\Models\File;
use Waka\Wcms\Models\Service;

class ServiceImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $service = new Service();
            $service->name = $row['name'];
            $service->slug = $row['slug'];

            $service->description = $row['description'];
            $service->content = json_decode($row['content']);
            // $service->kpi =  $row['kpi'];
            // $service->icone =  $row['icone'];
            $image = new File();
            $image->is_public = true;
            $image->data = plugins_path('waka/wcms/updates/files/pictures/services/' . $row['main_image']);
            $service->main_image = $image;
            $image->save();
            $service->save();
        }
    }
}
