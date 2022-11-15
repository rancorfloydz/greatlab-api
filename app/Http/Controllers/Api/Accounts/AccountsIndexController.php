<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Accounts;

use App\Enums\Version;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AccountsIndexController extends Controller
{
    public function __invoke(Request $request, Version $version)
    {
//        abort_unless(
//            $version->greaterThanOrEqualsTo(Version::v1_0),
//            Response::HTTP_NOT_FOUND
//        );

        return response()->json(['version'=>$version]);
    }
}
