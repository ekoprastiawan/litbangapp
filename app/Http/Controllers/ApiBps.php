<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Config;
use App\Models\Dataset\Bps\Subject;
use App\Models\Dataset\Bps\Subcat;
use App\Models\Dataset\Bps\DerivedPeriod;
use App\Models\Dataset\Bps\DerivedVariable;
use App\Models\Dataset\Bps\Period;
use App\Models\Dataset\Bps\Unit;

class ApiBps extends Controller
{ 
    public function subject() 
    {   

        // Ambil API key dari file env
        $key = Config::get('apikeys.bps_key');

        // Request API (halaman pertama) ke BPS
        $res0 = Http::get('https://webapi.bps.go.id/v1/api/list/model/subject/domain/0000/page/1/key/'. $key)['data']['0'];

        // Set halaman saat ini dan total halaman 
        $page = $res0['page']; 
        $pages = $res0['pages']; 

        // Request API (seluruh halaman) ke BPS
        $res1 = [];
        for($i = $page; $i<=$pages; $i++) {
            $res2 = Http::get('https://webapi.bps.go.id/v1/api/list/model/subject/domain/0000/page/'. $i .'/key/'. $key)['data']['1'];
            $res1 = array_merge($res1, $res2);
        }

        // Simpan respon API ke database
        foreach($res1 as $insert)
        {
            $dat = Subject::firstOrNew(['sub_id' => $insert['sub_id']]);
            $dat->title = $insert['title'];
            $dat->subcat_id = $insert['subcat_id'];
            $dat->save();
        }
        
        return view('bps.subject', compact('res0','res1','res2','page','pages'));

    }

    public function subcat() 
    {   


        $key = Config::get('apikeys.bps_key');

        $res0 = Http::get('https://webapi.bps.go.id/v1/api/list/model/subcat/domain/0000/key/'. $key)['data']['0'];

        $page = $res0['page']; 
        $pages = $res0['pages']; 

        $res1 = [];
        for($i = $page; $i<=$pages; $i++) {
            $res2 = Http::get('https://webapi.bps.go.id/v1/api/list/model/subcat/domain/0000/page/'. $i .'/key/'. $key)['data']['1'];
            $res1 = array_merge($res1, $res2);
        }

        foreach($res1 as $insert)
        {
            $dat = Subcat::firstOrNew(['subcat_id' => $insert['subcat_id']]);
            $dat->title = $insert['title'];
            $dat->save();
        }
        
        return view('bps.subcat', compact('res0','res1','res2','page','pages'));

    }

    public function turth() 
    {   


        $key = Config::get('apikeys.bps_key');

        $res0 = Http::get('https://webapi.bps.go.id/v1/api/list/model/turth/domain/0000/page/1/key/'. $key)['data']['0'];

        $page = $res0['page']; 
        $pages = $res0['pages']; 

        $res1 = [];
        for($i = $page; $i<=$pages; $i++) {
            $res2 = Http::get('https://webapi.bps.go.id/v1/api/list/model/turth/domain/0000/page/'. $i .'/key/'. $key)['data']['1'];
            $res1 = array_merge($res1, $res2);
        }

        foreach($res1 as $insert)
        {
            $dat = DerivedPeriod::firstOrNew(['turth_id' => $insert['turth_id']]);
            $dat->turth_id = $insert['turth_id'];
            $dat->turth = $insert['turth'];
            $dat->group_turth_id = $insert['group_turth_id'];
            $dat->name_group_turth = $insert['name_group_turth'];
            $dat->save();
        }
        
        return view('bps.turth', compact('res0','res1','res2','page','pages'));

    }

    public function turvar() 
    {   


        $key = Config::get('apikeys.bps_key');

        $res0 = Http::get('https://webapi.bps.go.id/v1/api/list/model/turvar/domain/0000/page/1/key/'. $key)['data']['0'];

        $page = $res0['page']; 
        $pages = $res0['pages']; 

        $res1 = [];
        for($i = $page; $i<=$pages; $i++) {
            $res2 = Http::get('https://webapi.bps.go.id/v1/api/list/model/turvar/domain/0000/page/'. $i .'/key/'. $key)['data']['1'];
            $res1 = array_merge($res1, $res2);
            set_time_limit(60);
        }

        foreach($res1 as $insert)
        {
            $dat = DerivedVariable::firstOrNew(['turvar_id' => $insert['turvar_id']]);
            $dat->turvar_id = $insert['turvar_id'];
            $dat->turvar = $insert['turvar'];
            $dat->group_turvar_id = $insert['group_turvar_id'];
            $dat->name_group_turvar = $insert['name_group_turvar'];
            $dat->save();
        }
        
        return view('bps.turvar', compact('res0','res1','res2','page','pages'));

    }

    public function th() 
    {   


        $key = Config::get('apikeys.bps_key');

        $res0 = Http::get('https://webapi.bps.go.id/v1/api/list/model/th/domain/0000/page/1/key/'. $key)['data']['0'];

        $page = $res0['page']; 
        $pages = $res0['pages']; 

        $res1 = [];
        for($i = $page; $i<=$pages; $i++) {
            $res2 = Http::get('https://webapi.bps.go.id/v1/api/list/model/th/domain/0000/page/'. $i .'/key/'. $key)['data']['1'];
            $res1 = array_merge($res1, $res2);
            set_time_limit(60);
        }

        foreach($res1 as $insert)
        {
            $dat = Period::firstOrNew(['th_id' => $insert['th_id']]);
            $dat->th_id = $insert['th_id'];
            $dat->th = $insert['th'];
            $dat->save();
        }
        
        return view('bps.th', compact('res0','res1','res2','page','pages'));

    }

    public function unit() 
    {   


        $key = Config::get('apikeys.bps_key');

        $res0 = Http::get('https://webapi.bps.go.id/v1/api/list/model/unit/domain/0000/page/1/key/'. $key)['data']['0'];

        $page = $res0['page']; 
        $pages = $res0['pages']; 

        $res1 = [];
        for($i = $page; $i<=$pages; $i++) {
            $res2 = Http::get('https://webapi.bps.go.id/v1/api/list/model/unit/domain/0000/page/'. $i .'/key/'. $key)['data']['1'];
            $res1 = array_merge($res1, $res2);
            set_time_limit(60);
        }

        foreach($res1 as $insert)
        {
            $dat = Unit::firstOrNew(['unit_id' => $insert['unit_id']]);
            $dat->unit_id = $insert['unit_id'];
            $dat->unit = $insert['unit'];
            $dat->save();
        }
        
        return view('bps.unit', compact('res0','res1','res2','page','pages'));

    }
}
