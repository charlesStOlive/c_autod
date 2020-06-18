<?php

namespace Waka\Crsm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Waka\Cloudis\Models\CloudiFile;
use Waka\Crsm\Models\Lot;
use Waka\Crsm\Models\Project;
use Waka\Crsm\Models\TypeLot;

class LotImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $TypeLotLists = TypeLot::get();
        $ProjectLists = Project::get();
        //
        foreach ($rows as $row) {
            if (!$row['name'] ?? false) {
                return;
            }
            if (!$row['project'] ?? false) {
                return;
            }
            trace_log("ok name and project = " . $row['project']);
            $project = $ProjectLists->where('slug', $row['project'])->first();
            trace_log("project id = " . $project->id);
            if (!$project) {
                return;
            }

            $lot = new Lot();
            $lot->name = $row['name'];
            $lot->project = $project;
            $lot->description = $row['description'];
            $lot->price = $row['price'];
            $lot->surface = $row['surface'];
            $lot->level = $row['level'];

            if ($row['type_lot']) {
                $lot->type_lot = $TypeLotLists->where('slug', $row['type_lot'])->first();
            }

            if ($row['url_plan_1'] ?? false) {
                $image = new CloudiFile();
                $image->is_public = true;
                $image->fromUrl($row['url_plan_1']);
                $lot->plan_1 = $image;
                $image->save();
            }
            $lot->save();
        }
    }
}
