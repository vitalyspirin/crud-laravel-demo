<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    /**
     * Show system info.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $info = $this->getInfo();

        return view('system', compact('info'));
    }

    protected function getInfo(): array
    {
        $info = [
            'OS' => $this->getOSPrettyName(),
            'php' => [
                'phpversion()' => phpversion(),
                'php_uname()' => php_uname('s').' '.php_uname('r').' '.php_uname('m'),
            ],
            'MySql version' => collect(DB::select('SELECT VERSION()'))->first()->{'VERSION()'},
            'Laravel' => app()::VERSION,
        ];

        return $info;
    }

    protected function getOSPrettyName()
    {
        $os_release = (string) file_get_contents('/etc/os-release');

        $propertyList = parse_ini_string($os_release);

        return $propertyList['PRETTY_NAME'];
    }
}
