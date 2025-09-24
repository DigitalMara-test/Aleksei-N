<?php

namespace App\Http\Controllers;

use App\DTO\UserFilterDTO;
use App\Repositories\UserRepository;
use App\Services\Export\CSVExporter;
use Illuminate\Http\Request;

class UserExportController extends Controller
{
    public function __construct(
        private UserRepository $users,
        private CSVExporter $exporter
    ) {}

    public function __invoke(Request $request)
    {
        $filters = new UserFilterDTO(
            role: $request->get('role'),
            status: $request->get('status')
        );

        $data = $this->users->getFiltered($filters)
            ->map(fn($u) => [$u->id, $u->name, $u->email])
            ->toArray();

        $csv = $this->exporter->export($data);

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="users.csv"');
    }
}
